<?php 

$id=$_POST['x'];

$conn = mysqli_connect('localhost','pabicoax_sipab','*7Mtgzpd*M2T','pabicoax_mante');
$sql = "DELETE FROM mantenimientos WHERE id = '".$id."'";
$result = mysqli_query($conn,$sql);


header('Location: /mante/public/noe');
?>