<?php 
  //$page_title = 'Reclamos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
//$rec_cliente = find_by_id2('inv_cliente',(int)$_GET['id']); 
$reg_lectura = lecturas_table();


if(!$reg_lectura){
  $session->msg("d","Cuenta no encontrada.",$li_numcuenta);
  redirect('reg_lectura.php');
}
?>

<?php 


 if(isset($_POST['reg_lectura'])){
     echo $_POST['num_cuenta'];
     
    $req_fields = array('num_cuenta','mes_ini','anio_ini','lec_ant_li','lectura_actual','consumo','id_user', 'cobro');
    validate_fields($req_fields);
    if(empty($errors)){
        $li_numcuenta   = remove_junk($db->escape($_POST['num_cuenta']));
        $li_mes   = remove_junk($db->escape($_POST['mes_ini']));
        $li_anio   = remove_junk($db->escape($_POST['anio_ini']));
        //calcular el ultimo dia del mes para fecha lectura
        function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
        }
        //Ejemplo de uso ultimo dia
        $ultimoDia = getUltimoDiaMes(($_POST['anio_ini']),($_POST['mes_ini']));
        $li_fecha_lect = ($_POST['anio_ini']).'-'.($_POST['mes_ini']).'-'.$ultimoDia;	
        
        //$li_fecha_lect = $li_anio.'-'.$li_mes.'-'.$ultimoDia;	
        //$li_fecha_lect  = remove_junk($db->escape($_POST['fecha_lect_li']));
        $li_lec_ant  = remove_junk($db->escape($_POST['lec_ant_li']));
        $li_lec_act  = remove_junk($db->escape($_POST['lec_act_li']));
        //$li_consumo =  $li_lec_act - $li_lec_ant;
        $li_consumo = ($_POST['lec_act_li'])-($_POST['lec_ant_li']);
        $li_user  = remove_junk($db->escape($_POST['user_lect']));
        if (($_POST['lec_ant_li'])>($_POST['lec_act_li'])) {
            $li_cobro = 'v';
            } else {
              $li_cobro = 'c';
              }
        //no se permite la misma lectura inicial para la cuenta y mes y año
        $query_cta = "SELECT * FROM lecturas WHERE num_cuenta='$li_numcuenta'and anio='$li_anio' and mes='$li_mes'";
        if($db->query($query_cta)){
           $session->msg('s',"La Carga Inicial de Lectura para la cuenta ya fue agregada");
           redirect('reg_ini_lec1.php', false);
           }
            else
            {
            //efectua registro inicial de lectura, marca el recibo
            $query  = "INSERT INTO lecturas (num_cuenta,mes,anio,fecha_lectura,lectura_anterior, lectura_actual, consumo, id_use, cobro ) VALUES ('{$li_numcuenta}','{$li_mes}','{$li_anio}','{$li_fecha_lect}','{$li_lec_ant}', '{$li_lec_act}','{$li_consumo}', '{$li_user}', '{$li_cobro}')";
            if($db->query($query)){
               $session->msg('s',"Lectura inical agregada exitosamente. ");
               redirect('reg_ini_lec1.php', false);
             } else {
               $session->msg('d',' Lo siento, registro falló.');
               redirect('reg_ini_lec1.php', false);
               } 
               }
    } else {
                    $session->msg("d", $errors);
                    redirect('reg_ini_lec1.php',false);
                    }
}
  ?>
 
<?php //include_once('layouts/header.php'); ?>


<?php //include_once('layouts/footer.php'); ?>
