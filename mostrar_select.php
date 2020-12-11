<?php
//error_reporting (0);
require_once('includes/load.php'); //incluye datos de la conexion a la base de datos
//include('../conexion/sesion.php');

$q=$_POST['q'];
//$con=conexion();

$resul_muni = ("SELECT cod_municipio,municipio FROM inv_municipio WHERE cod_departamento='$q' ORDER BY municipio ASC");
$res = $db->query($resul_muni);

?>
<!DOCTYPE html>
<html lang="es">

<!--<select name="municipio" class="textbox" width="250px">-->

<?php while($fila=mysqli_fetch_array($res)){ ?>
<option value="<?php echo $fila['cod_municipio'];?>"><?php echo $fila['municipio']; ?></option>
<?php } ?>

<!--</select>-->