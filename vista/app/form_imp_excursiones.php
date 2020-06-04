<?php


require_once('../vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf([

]);



require 'cn.php';
$v1=$_GET['id_excursion'];
$consulta="SELECT * from tbl_sortida INNER JOIN tbl_activitat ON tbl_sortida.id_sortida=tbl_activitat.id_sortida INNER JOIN tbl_clase ON tbl_sortida.id_clase=tbl_clase.id_clase WHERE tbl_sortida.id_sortida=$v1";
$resultado = $mysqli->query($consulta);

while ($row = $resultado->fetch_assoc()) {
	$mpdf->writeHtml("<p>ID SORTIDA</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(40, 10, $row['codi_sortida'], 1, 1, 'C', 0);
	$mpdf->writeHtml("<br><p>NOM ACTIVITAT</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(40, 10, $row['nom_activitat'], 1, 1, 'C', 0);
	$mpdf->writeHtml("<br><p>INICI SORTIDA</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(40, 10, $row['inici_sortida'], 1, 1, 'C', 0);
	$mpdf->writeHtml("<br><p>FINAL SORTIDA</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(40, 10, $row['final_sortida'], 1, 1, 'C', 0);
	$mpdf->writeHtml("<br><p>NOM CLASSE</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(40, 10, $row['nom_classe'], 1, 1, 'C', 0);
	$mpdf->writeHtml("<br><p>JORNADA</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(40, 10, $row['jornada_activitat'], 1, 1, 'C', 0);
	$mpdf->writeHtml("<br><p>LLOC</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(40, 10, $row['lloc_activitat'], 1, 1, 'C', 0);
	$mpdf->writeHtml("<br><p>OBJECTIU</p>", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Cell(100, 10, $row['objectiu_activitat'], 1, 1, 'C', 0);
}

$mpdf->Output();

?>