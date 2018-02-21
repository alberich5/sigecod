<?php



require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
//se especifica que tipo de documnto se va a usar del phpword
use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('formato1.docx');


$dia=date('d');
$mes=date('m');
$ano=date('y');



$templateWord->setValue('dia',$dia);
$templateWord->setValue('mes',$mes);
$templateWord->setValue('ano',$ano);

// --- Guardamos el documento
$templateWord->saveAs('mante/descarga.docx');

header("Content-Disposition: attachment; filename=descarga".$tim.".docx; charset=iso-8859-1");

echo file_get_contents('mante/descarga.docx');



?>
