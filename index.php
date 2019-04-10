<!DOCTYPE html>
<?php
include 'connexioBD.php';
$sql = "select hora, usuari, text from missatges order by id";
$result = mysqli_query($con, $sql);
?>
<html lang="ca">
<head>
	<meta charset="UTF-8" />
	<title>xateja-ho!</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<section id="titol">
		<h1>xateja-ho!</h1></br>
	</section>
	<section id="missatges">
		<?php 
		while ($row = mysqli_fetch_assoc($result)) {  
			echo '<p><span>'.$row['hora'].' - '.$row['usuari'].': </span>'.$row['text'].'<p>';
		}
		?>
	</section>
	<section id="formulari"></br>
		<form method="post" action="insertar.php">
			<p><input type="text" name="usuari" size="40" placeholder="NOM"></p>
			<p><input type="text" name="text" size="40" placeholder="MISSATGE"></p>
			<p><input type="submit" value="Enviar">
				<input type="reset" value="Borrar"></p>
			</form>
		</section>
		<section id="errors">
			<?php
			if(isset($_GET['Error'])){
				if($_GET['Error']=='CampoVacio'){
					echo "<p>Error: Campo vacio</p>";
				}	
			}
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			mysqli_free_result($result);
			mysqli_close($con);
			?>
		</section>
	</body>
	</html>