<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
function Header()
{
    // Logo
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");
    // Arial bold 15
    $this->SetFont('Arial','B',30);
    // Move to the right
    $this->Cell(65);
    // Title
    $this->SetTextColor(220,50,50);
    $this->Cell(60,25,'NowTravel',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');
}
}
define('EURO',chr(128));
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);
$TrueTotal = 0;


$pdf->Cell(130 ,5,'NowTravel.com',0,0);
$pdf->Cell(59 ,5,'Fatura',0,1);

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Rua Ramiro Ferrao]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[Almada, Portugal, 2800-]',0,0);

 include "Conexao.php";
 $TotalPreco = 0;
 session_start();
     $i=0;
    if(isset($_POST['submit'])){

      foreach($_SESSION["carrinho"] as $values)
      {
        $IDUtilizador = $values["ID_Utilizador"];
        $ID_Reserva = $values['ID_Reserva'];
        $IDAlojamento = $values['IDAlojamento'];
       $NQuarto = $values['NQuarto'];
        $DataInicio=$values['DataInicio'];
        $DataFim=$values['DataFim'];
        $Hospedes=$values['Hospedes'];
       $Total=$values['Total'];

if (isset($values["Horario"])) {
$Horario = $values["Horario"];
$Atividade = 1;
}else {
  $Atividade = 0;
}

if ($i == 0) {


$digits = 7;

$FaturaRandom = rand(pow(10, $digits-1), pow(10, $digits)-1);
  $pdf->Cell(25 ,5,'Data',0,0);
  $pdf->Cell(34 ,5,'['.date("Y/m/d").']',0,1);//end of line
  $pdf->Cell(130 ,5,'Telefone [+910863020]',0,0);
  $pdf->Cell(25 ,5,'Fatura',0,0);
  $pdf->Cell(34 ,5,'['.$FaturaRandom.']',0,1);//end of line
  $pdf->Cell(130,5,"",0,0);
  $pdf->Cell(25 ,5,'ID Do Cliente',0,0);
  $pdf->Cell(34 ,5,'['.$IDUtilizador.']',0,1);//end of line

  $pdf->Cell(189 ,10,'',0,1);//end of line

  $sql4 ="SELECT Nome,Username,Email FROM utilizador WHERE ID=$IDUtilizador LIMIT 1";
  $result4= $conn->query($sql4);
  $row4=$result4->fetch_assoc();
  $pdf->Cell(100 ,5,'Cobranca para',0,1);//end of line
$Nome = $row4['Nome'];
$Username = $row4['Username'];
$Email = $row4['Email'];
  //add dummy cell at beginning of each line for indentation
  $pdf->Cell(10 ,5,'',0,0);
  $pdf->Cell(90 ,5,'['.$Nome.']',0,1);

  $pdf->Cell(10 ,5,'',0,0);
  $pdf->Cell(90 ,5,'['.$Username.']',0,1);

  $pdf->Cell(10 ,5,'',0,0);
  $pdf->Cell(90 ,5,'['.$Email.']',0,1);

  //make a dummy empty cell as a vertical spacer
  $pdf->Cell(189 ,10,'',0,1);
  $pdf->SetFont('Arial','B',12);

  $pdf->Cell(45 ,5,'Alojamento/Atividade ',1,0);
  $pdf->Cell(35 ,5,'Data Check-In',1,0);
  $pdf->Cell(35 ,5,'Data Check-Out',1,0);
  $pdf->Cell(22 ,5,'Hospedes',1,0);
    $pdf->Cell(34,5,'Quarto/Horario',1,0);
  $pdf->Cell(20 ,5,'Preco',1,1);//end of line

  $pdf->SetFont('Arial','',12);
}


       $sql2 ="SELECT Nome FROM alojamento WHERE ID= $IDAlojamento";
      $result2= $conn->query($sql2);

if ($row2=$result2->fetch_assoc()) {
  $pdf->Cell(45 ,5,''.$row2['Nome'].'',1,0);
  $pdf->Cell(35 ,5,''.$DataInicio.'',1,0);
  $pdf->Cell(35 ,5,''.$DataFim.'',1,0);
  $pdf->Cell(22 ,5,''.$Hospedes.'',1,0);
  $pdf->Cell(34 ,5,''.$NQuarto.'',1,0);
  $pdf->Cell(20 ,5,''.$Total.'',1,1,'R');//end of line
}else {
  $sql5 ="SELECT Nome FROM atividade WHERE ID= $IDAlojamento";
 $result5= $conn->query($sql5);
 $row5=$result5->fetch_assoc();
 $pdf->Cell(45 ,5,''.$row5['Nome'].'',1,0);
 $pdf->Cell(35 ,5,''.$DataInicio.'',1,0);
 $pdf->Cell(35 ,5,''.$DataFim.'',1,0);
 $pdf->Cell(22 ,5,''.$Hospedes.'',1,0);
 $pdf->Cell(34 ,5,''.$Horario.'',1,0);
 $pdf->Cell(20 ,5,''.$Total.'',1,1,'R');//end of line
}






$TrueTotal = $TrueTotal + $Total;
$i++;
     }

     }




$pdf->Cell(154 ,5,'',0,0);
$pdf->Cell(13 ,5,'Total',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(20 ,5,''.$TrueTotal.'',1,1,'R');//end of line


$Utilizador = $_SESSION['username'];

$sql4 = "SELECT Email,Username FROM utilizador where Username = '".$Utilizador."' LIMIT 1";
$res_data4 = mysqli_query($conn,$sql4);
while($row4 = mysqli_fetch_array($res_data4)){
$Email = $row4['Email'];
}

$to = $Email;
$subject = "Obrigado por Reservar com a NowTravel!";
$from = "nowtraveloficial@gmail.com";
$message = "<p>Obrigado por ter reservado com a NowTravel, aqui está a fatura da sua reserva.</p>";

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "test.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "This is a MIME encoded message.".$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

// send message

  mail($to, $subject, $body, $headers);

$pdf->Output();
unset($_SESSION["carrinho"]);
$conn->close();
?>
