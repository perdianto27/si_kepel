<?php

error_reporting(0);
include "../config.php";
require_once("assets/lib/fpdf17/fpdf.php");
//require_once("assets/lib/fpdf_multicell/fpdf.php");
class FPDF_AutoWrapTable extends FPDF {
      private $data = array();
      private $options = array(
          'filename' => '',
          'destinationfile' => '',
          'paper_size'=>'F4',
          'orientation'=>'P'
      );

    function __construct($data = array(), $options = array()) {
        parent::__construct();
        $this->data = $data;
        $this->options = $options;
    }

    public function rptDetailData () {
        $border = 0;
        $this->AddPage();
        $this->SetAutoPageBreak(true,60);
        $this->AliasNbPages();
        $left = 25;

        //header
        
        $this->SetTitle('DATA KELUHAN PELANGGAN');
        $this->SetFont("", "B", 15);
        $this->SetX($left); $this->Cell(0, 20, 'PT. PANDU ANUGERAH ANALITIKA', 0, 1,'C');
        $this->SetFont("", "", 9);
        $this->SetX($left); $this->Cell(0, 20, 'Alamat: Jl. Pondok Gede Raya No.30 , Jakarta Timur', 0, 1,'C');
        $this->SetFont("", "", 15);
        $this->SetX($left); $this->Cell(0, 1, '________________________________________________________________', 0, 1,'C');
        $this->SetX($left); $this->Cell(0, 2, '________________________________________________________________', 0, 1,'C');
        $this->Ln(10);
        $this->Ln(10);
        $this->SetFont("", "B", 12);
        $this->SetX($left); $this->Cell(0, 20, 'LAPORAN DATA KELUHAN', 0, 1,'C');
        $this->Ln(10);

        $h = 18;
        $left = 40;
        $top = 80;

        #tableheader
        $this->SetFillColor(200,200,200);    
        $left = $this->GetX();
        $this->SetFont("", "B", 10);
        $this->Cell(25,$h,'NO',1,0,'L',true);
        $this->SetX($left += 20); $this->Cell(30, $h, 'ID', 1, 0, 'C',true);
        $this->SetX($left += 30); $this->Cell(60, $h, 'Pelanggan', 1, 0, 'C',true);
        $this->SetX($left += 60); $this->Cell(80, $h, 'Keluhan', 1, 0, 'C',true);
        $this->SetX($left += 80); $this->Cell(80, $h, 'Penyebab', 1, 0, 'C',true);
        $this->SetX($left += 80); $this->Cell(80, $h, 'Tindakan', 1, 0, 'C',true);
        $this->SetX($left += 80); $this->Cell(65, $h, 'Tgl keluhan', 1, 0, 'C',true);
        $this->SetX($left += 65); $this->Cell(68, $h, 'Tgl Perbaikan', 1, 0, 'C',true);
        $this->SetX($left += 68); $this->Cell(65, $h, 'Teknisi', 1, 1, 'C',true);
        //$this->Ln(20);

        #data dari database
        $this->SetFont('Arial','',10);
        $this->SetWidths(array(20,30,60,80,80,80,65,68,65));
        $this->SetAligns(array('C','L','L','L','L','L'));
        $no = 1; $this->SetFillColor(255);
        foreach ($this->data as $baris) {
            $this->Row(
                array($no++, 
                $baris['idkeluhan'], 
                $baris['nama_pelanggan'], 
                $baris['keluhan'], 
                $baris['penyebab'], 
                $baris['tindakan'],
                $baris['tgl_keluhan'],
                $baris['tgl_perbaikan'],
                $baris['nama_teknisi']
            ));
        }

        #tabel footer
        $this->Ln(20);
        $this->SetFont("", "", 9);
        $this->SetX(400); $this->Cell(0, 15, 'Jakarta Timur, '.date('d').' '.$bln[date('m')].' '.date('Y').'', 0, 1,'C');
        $this->SetX(400); $this->Cell(0, 15, 'Direktur', 0, 1,'C');
        $this->Ln(40);
        $this->SetX(400); $this->Cell(0, 20, 'Fazar Reza Budiman', 0, 1,'C');
    }

    public function printPDF () {
        if ($this->options['paper_size'] == "F4") {
            $a = 8.3 * 72; //1 inch = 72 pt
            $b = 13.0 * 72;
            $this->FPDF($this->options['orientation'], "pt", array($a,$b));
        } else {
            $this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
        }

        $this->SetAutoPageBreak(false);
        $this->AliasNbPages();
        $this->SetFont("helvetica", "B", 10);
        //$this->AddPage();

        $this->rptDetailData();
        $this->Output($this->options['filename'],$this->options['destinationfile']);
      }

    private $widths;
    private $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=15*$nb;

        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();

            //Draw the border
            $this->Rect($x,$y,$w,$h);

            //Print the text
            $this->MultiCell($w,15,$data[$i],0,$a);

            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }

        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;

        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
} //end of class

#ambil data dari DB dan masukkan ke array
$data = array();
$query=mysqli_query($conn, "SELECT * FROM keluhan INNER JOIN pelanggan ON keluhan.idpelanggan = pelanggan.idpelanggan
                            INNER JOIN teknisi ON keluhan.idteknisi = teknisi.idteknisi ");
        while($row=mysqli_fetch_array($query)){
        array_push($data, $row);
}

//pilihan
$options = array(
    'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
    'destinationfile' => '', //I=inline browser (default), F=local file, D=download
    'paper_size'=>'F4',    //paper size: F4, A3, A4, A5, Letter, Legal
    'orientation'=>'P' //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
?>