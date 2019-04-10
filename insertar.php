<?php 
date_default_timezone_set("Europe/Madrid");
include 'connexioBD.php';
$usuari = mysqli_real_escape_string($con,$_POST['usuari']);
$text = mysqli_real_escape_string($con,$_POST['text']);
$date = date('H:i:s');
$sql = "INSERT INTO missatges (usuari, text, hora)
VALUES ('$usuari', '$text', '$date')";
if (empty($usuari) or empty($text)){
	header("Location: index.php?Error=CampoVacio");
	exit();
}
if (mysqli_query($con, $sql)) {
    echo "Missatge enviat amb exit.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
header("Location:index.php");
?>