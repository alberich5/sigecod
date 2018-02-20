<?php



require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
//se especifica que tipo de documnto se va a usar del phpword
use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('formato1.docx');
//variables captadas desde el formulario de index
/*
$total = $_GET['total'];

//for para imprimir todos los articulos cantidad y unidad en el template
for ($i=0; $i <$total ; $i++) {
	$templateWord->setValue('articulo'.$i.'',$_GET['nom'.$i.'']);
	$templateWord->setValue('unidad'.$i.'',$_GET['unidad'.$i.'']);
	$templateWord->setValue('cant'.$i.'',$_GET['cantidad'.$i.'']);
	$templateWord->setValue('n'.$i.'',$i+1);
}
//for para ocultar los elemetos restantes
for ($i=$total-1; $i <=12 ; $i++) {
	$templateWord->setValue('articulo'.$i.'',"");
	$templateWord->setValue('unidad'.$i.'',"");
	$templateWord->setValue('cant'.$i.'',"");
	$templateWord->setValue('n'.$i.'',"");
}

$dia=date('d');
$mes=date('m');
$ano=date('y');


$templateWord->setValue('area',$_GET['cli0']);
$templateWord->setValue('dia',$dia);
$templateWord->setValue('mes',$mes);
$templateWord->setValue('ano',$ano);
*/
$tim =time();
// --- Guardamos el documento
$templateWord->saveAs('mante/descarga'.$tim.'.docx');

header("Content-Disposition: attachment; filename=descarga".$tim.".docx; charset=iso-8859-1");

echo file_get_contents('mante/descarga'.$tim.'.docx');



?>
