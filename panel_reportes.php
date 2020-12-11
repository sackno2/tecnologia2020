<?php
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id1('inv_cliente');
 $c_product       = count_by_id2('inv_medidor');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5');
 $consumo_total   = sum_by_lecturas_total('lecturas');
//Hacer un grafico
/*$sql="SELECT MonthName(fecha_lectura) , SUM(consumo) FROM lecturas
where fecha_lectura >= makedate(year(curdate()), 1)
   and fecha_lectura < makedate(year(curdate()) + 1, 1)
 group by MonthName(fecha_lectura) order by fecha_lectura";*/

$sql="SELECT fecha_lectura , SUM(consumo) FROM lecturas
group by fecha_lectura";
$result = $db->query($sql);

$sql2="SELECT anio, consumo FROM lecturas
group by anio";
$result2 = $db->query($sql2);


$valoresY=array();//mes
$valoresX=array();//consumo
$valores2Y=array();//año
$valores2X=array();//consumo

while ($ver=mysqli_fetch_row($result)) {
  $valoresY[]=$ver[1];
  $valoresX[]=$ver[0];
  
}

while ($ver2=mysqli_fetch_row($result2)) {
  $valores2Y[]=$ver2[1];
  $valores2X[]=$ver2[0];
  
}


$datosX=json_encode($valoresX);
$datosY=json_encode($valoresY);

$datos2X=json_encode($valores2X);
$datos2Y=json_encode($valores2Y);

?>


<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>



  <div class="row">
   <div class="col-md-12">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
            <span>CONSUMO POR MES</span>
          </strong>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <div id="graficaLineal"></div>
           <tr>
          </thead>
         </table>
         <tbody>
           
         </tbody>
       </div>
     </div>
   </div>
   </div>

  <div class="row">
   <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
          <strong>
            <span>ÚLTIMAS VENTAS</span>
          </strong>
       </div>
       <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
           <thead>
            <tr>
             <div id='myDiv'></div>
            </tr>
           </thead>  
          </table>
        </div>
   </div>
  </div>
 </div>




 <script type="text/javascript">
   function crearCadenaLineal(json){
    var parsed = JSON.parse(json);
    var arr = [];
    for (var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
   }
 </script>

<script type="text/javascript">

 datosX=crearCadenaLineal('<?php echo $datosX; ?>');
 datosY=crearCadenaLineal('<?php echo $datosY; ?>');
 datos2X=crearCadenaLineal('<?php echo $datos2X; ?>');
 datos2Y=crearCadenaLineal('<?php echo $datos2Y; ?>');

 var layout = {
  title:'Consumo por mes',
  height: 550,
  font: {
    family: 'Lato',
    size: 16,
    color: 'rgb(100,150,200)'
  },
  plot_bgcolor: 'rgba(200,255,0,0.1)',
  margin: {
    pad: 10
  },

  xaxis: {
    title: 'Mes',
    titlefont: {
      color: 'black',
      size: 12
    },
    rangemode: 'tozero'
  },
  yaxis: {
    title: 'Consumo',
    titlefont: {
      color: 'black',
      size: 12
    },
    rangemode: 'tozero'
  }
};

 var trace1 = {
    x: datosX,
    y: datosY,
    type: 'scatter'
 };



var data = [trace1];
Plotly.newPlot('graficaLineal', data, layout);

//Grafico de barras//
var data2 = [
  {
    x: datos2X,
    y: datos2y,
    type: 'bar'
  }
];

Plotly.newPlot('myDiv', data2);

</script>




 



<div class="row">
 <div class="panel-body">
        <table class="table table-striped table-bordered table-condensed">
          <tbody>
              <tr>
                <td> 
                  <div class="panel panel-box clearfix">
                  <div class="panel-icon pull-left bg-yellow">
                  <i class="glyphicon glyphicon-usd"></i>
                  </div>
                  <div class="panel-value pull-right">
                  <h2 class="margin-top"> <?php  echo $consumo_total['total']; ?></h2>
                  <p class="text-muted">Consumo total</p>
                  </div>
                  </div>
                </td>
              
                <td>
                  <div class="panel panel-box clearfix">
                  <div class="panel-icon pull-left bg-green">
                  <i class="glyphicon glyphicon-user"></i>
                  </div>
                  <div class="panel-value pull-right">
                  <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
                  <p class="text-muted">Usuarios</p>
                  </div>
                  </div>
                </td>
              
                <td>
                  <div class="panel panel-box clearfix">
                  <div class="panel-icon pull-left bg-red">
                  <i class="glyphicon glyphicon-user"></i>
                  </div>
                  <div class="panel-value pull-right">
                  <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
                  <p class="text-muted">Clientes</p>
                  </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="panel panel-box clearfix">
                  <div class="panel-icon pull-left bg-blue">
                  <i class="glyphicon glyphicon-scale"></i>
                  </div>
                  <div class="panel-value pull-right">
                  <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
                  <p class="text-muted">Medidores</p>
                  </div>
                  </div>
                </td>
              
                <td>
                   <div class="panel panel-box clearfix">
                   <div class="panel-icon pull-left bg-yellow">
                   <i class="glyphicon glyphicon-usd"></i>
                   </div>
                   <div class="panel-value pull-right">
                   <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
                   <p class="text-muted">Ventas</p>
                   </div>
                   </div>
                </td>
              
                <td>
                  <div class="panel panel-box clearfix">
                  <div class="panel-icon pull-left bg-yellow">
                  <i class="glyphicon glyphicon-usd"></i>
                  </div>
                  <div class="panel-value pull-right">
                  <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
                  <p class="text-muted">Consumo total</p>
                  </div>
                  </div>
                </td>
              
              </tr>
          </tbody>

        </table>
   </div>
  </div>




  <div class="row">
   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Productos más vendidos</span>
         </strong>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Título</th>
             <th>Total vendido</th>
             <th>Cantidad total</th>
           <tr>
          </thead>
          <tbody>
            <?php foreach ($products_sold as  $product_sold): ?>
              <tr>
                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                <td><?php echo (int)$product_sold['totalQty']; ?></td>
              </tr>
            <?php endforeach; ?>
          <tbody>
         </table>
       </div>
     </div>
   </div>
   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>ÚLTIMAS VENTAS</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Producto</th>
           <th>Fecha</th>
           <th>Venta total</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Productos recientemente añadidos</span>
        </strong>
      </div>
      <div class="panel-body">

        <div class="list-group">
      <?php foreach ($recent_products as  $recent_product): ?>
            <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>">
                <h4 class="list-group-item-heading">
                 <?php if($recent_product['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                <?php endif;?>
                <?php echo remove_junk(first_character($recent_product['name']));?>
                  <span class="label label-warning pull-right">
                 $<?php echo (int)$recent_product['sale_price']; ?>
                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
              </span>
          </a>
      <?php endforeach; ?>
    </div>
  </div>
 </div>
</div>
 </div>


 <div class="row">
 <div class="panel-body">
        <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Catálogo</th>
             <th>Clientes</th>
             <th>Conexiones</th>
             <th>Pagos</th>
             <th>Mantenimiento</th>
           <tr>
          </thead>
          <tbody>
              <tr>
                <td> 
        
                </td>
              
                <td>
                  
                </td>
              
                <td>
                  
                </td>
              
                <td>Boton4</td>
              
                <td>Boton5</td>
              </tr>
              <tr>
                <td>Boton1</td>
              
                <td>Boton2</td>
              
                <td>Boton3</td>
              
                <td>Boton4</td>
              
                <td>Boton5</td>
              </tr>
          </tbody>

        </table>
   </div>
  </div>



<?php include_once('layouts/footer.php'); ?>
