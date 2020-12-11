<?php
  require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function buscar datos en la tabla por cod_cliente
/*--------------------------------------------------------------*/
function find_by_id2($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_cliente='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function find_by_id3($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_medidor='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function find_by_id4($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_reclamo='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function find_by_id5($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_servicio='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function find_by_id6($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_tarifa='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function find_by_id7($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_valvula='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function find_by_id8($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
       $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_cuenta='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}


function find_by_id_filtro($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_cuenta='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

function find_by_id_filtro2($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE num_cuenta='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}


/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id2($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
    $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_cliente=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

function delete_by_id3($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
    $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_medidor=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

function delete_by_id4($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
    $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_reclamo=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

function delete_by_id5($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
    $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_servicio=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

function delete_by_id6($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
    $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_tarifa=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
    return ($db->affected_rows() === 1) ? true : false;
   }
}


function delete_by_id7($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
    $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_orden_desco=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
    return ($db->affected_rows() === 1) ? true : false;
   }
}



/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

function count_by_id1($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(cod_cliente) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

function count_by_id2($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(cod_medidor) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

function sum_by_lecturas_total($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT SUM(consumo) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,c.name";
    $sql  .=" AS categorie,m.file_name AS image";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);

   }
   
   
   //LISTAR CLIENTE_DESCONEXION
   function join_inv_desconexion_table_lista(){
    global $db;
    $sql = "SELECT d.cod_cuenta, c.nombre, c.apellido, d.fecha_orden, d.motivo, d.fecha_ejecucion, d.ejecutada, d.observacion FROM `inv_desconexion` d INNER JOIN inv_cliente c ON c.num_cuenta = d.cod_cuenta ORDER BY d.cod_cuenta ASC";
    return find_by_sql($sql);
    }
	
 //LISTAR CLIENTES_PARA_RECONEXION
   function join_inv_reconexion_table_lista(){
    global $db;
    $sql = "SELECT r.cod_cuenta, c.nombre, c.apellido, r.fecha_orden, r.fecha_ejecucion, r.ejecutada, r.observacion FROM `inv_reconexion` r INNER JOIN inv_cliente c ON c.num_cuenta = r.cod_cuenta ORDER BY r.cod_cuenta ASC";
    return find_by_sql($sql);
    }  
 
  
   /*--------------------------------------------------------------*/
   /* Function for Finding all inv_cliente name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_inv_cliente_table(){
     global $db;
     $sql  =" SELECT * FROM inv_cliente";
    return find_by_sql($sql);

   }
   
  function join_inv_medidor_table(){
     global $db;
     $sql  =" SELECT * FROM inv_medidor";
    return find_by_sql($sql);

   }
   
   function inv_reclamo_table(){
     global $db;
     $sql  =" SELECT * FROM inv_reclamo";
    return find_by_sql($sql);

   }
   
   function inv_desconexion_table(){
     global $db;
     $sql  =" SELECT * FROM inv_desconexion";
    return find_by_sql($sql);

   }

  function inv_reconexion_table(){
     global $db;
     $sql  =" SELECT * FROM inv_reconexion";
    return find_by_sql($sql);

   } 
   
   function join_inv_servicio_table(){
     global $db;
     $sql  =" SELECT * FROM inv_servicio";
    return find_by_sql($sql);

   }
   
    function join_inv_tarifa_table(){
     global $db;
     $sql  =" SELECT * FROM inv_tarifa";
    return find_by_sql($sql);

   }
   
    function join_inv_valvula_table(){
     global $db;
     $sql  =" SELECT * FROM inv_valvula";
    return find_by_sql($sql);

   }

  function join_reportecliente2pdf_table(){
     global $db;
     $sql  =" SELECT * FROM reportecliente2pdf";
    return find_by_sql($sql);

   } 

  function join_reporteclientepdf_table(){
     global $db;
     $sql  =" SELECT * FROM reporteclientepdf";
    return find_by_sql($sql);

   }  

  function join_asociacion1_table(){
     global $db;
     $sql  =" SELECT * FROM asociacion1";
    return find_by_sql($sql);

   }  
  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.name,p.sale_price,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}

/*FUNCIONES MARIO RIVAS */

//TABLAS JERARQUIA DE TUBERIA
function join_jerarquia_tuberia_table(){
     global $db;
     $sql  =" SELECT * FROM jerarquia_tuberia";
    return find_by_sql($sql);

   }

//BUSCAR JERARQUIA TUBERIA
   
   function find_by_id_jt($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_jerarquia='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

//BORRAR JERARQUIA DE TUBERIA
function delete_by_id_jt($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
      
      $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_jerarquia=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
      
    
    return ($db->affected_rows() === 1) ? true : false;
   }
}

//CUENTA REGISTRO JERARQUIA DE TUBERIA
function count_by_idj($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(cod_jerarquia) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}  


//TABLAS MATERIAL DE TUBERIA
function join_material_tuberia_table(){
     global $db;
     $sql  =" SELECT * FROM mat_tuberia";
    return find_by_sql($sql);

   }

//BUSCAR MATERIAL TUBERIA
   
   function find_by_id_mt($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_material='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

//BORRAR JERARQUIA DE TUBERIA
function delete_by_id_mt($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
      
      $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_material=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
      
    
    return ($db->affected_rows() === 1) ? true : false;
   }
}

//CUENTA REGISTRSO JERARQUIA DE TUBERIA
function count_by_idm($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(cod_material) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}  
  

//TABLAS ASOCIACION 
function join_asociacion_table(){
     global $db;
     $sql  ="SELECT * FROM asociacion";
    return find_by_sql($sql);

   }

//BUSCAR ASOCIACION
  function find_by_id_aso($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_asociacion='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
} 
   

//BORRAR ASOCIACION
function delete_by_id_as($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
      
      $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_asociacion=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
      
    
    return ($db->affected_rows() === 1) ? true : false;
   }
}

//CUENTA REGISTRSO ASOCIACION
function count_by_idas($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(cod_asociacion) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}  

//TABLA INVENTARIO DE TUBERIA
function join_inv_tuberias_table(){
     global $db;
     $sql  =" SELECT * FROM inv_tuberias";
    return find_by_sql($sql);

   }
   
  //LISTAR TUBERIA
   function join_inv_tuberias_table_lista(){
    global $db;
    $sql = "SELECT t.cod_tuberia, j.jerarquia, m.material, t.estado";
    $sql  .=" FROM inv_tuberias t";
    $sql  .=" INNER JOIN jerarquia_tuberia j ON j.cod_jerarquia = t.cod_jerarquia";
    $sql  .=" INNER JOIN mat_tuberia m ON m.cod_material = t.cod_material";
    $sql  .=" ORDER BY t.cod_tuberia ASC";
    return find_by_sql($sql);
    }

//BUSCAR  TUBERIA
   	
   function find_by_id_tub($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_tuberia='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

//BORRAR TUBERIA
function delete_by_id_tub ($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
      
      $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_tuberia=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
      
    
    return ($db->affected_rows() === 1) ? true : false;
   }
}

//CUENTA REGISTRSO JERARQUIA DE TUBERIA
function count_by_idtub($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(cod_tuberia) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}  

//TABLAS LECTURA
function join_lecturas_table(){
     global $db;
     $sql  =" SELECT * FROM lecturas";
    return find_by_sql($sql);

   }
   
   

//BUSCAR  LECTURA
    
   function find_by_id_lec($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE cod_lectura='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

//BORRAR LECTURA
function delete_by_id_lec ($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table))
   {
      
      $sql1 ="DELETE FROM ".$db->escape($table);
    $sql1 .= " WHERE cod_lectura=". $db->escape($id);
    $sql1 .= " LIMIT 1"; 
    $db->query($sql1);
      
    
    return ($db->affected_rows() === 1) ? true : false;
   }
}

//CUENTA REGISTROS LECTURA
function count_by_idlec($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(cod_lectura) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}  

function lecturas_table(){
     global $db;
     $sql  ="SELECT * FROM lecturas";
    return find_by_sql($sql);

   }
   
   //BUSCAR POR CUENTA
   function find_by_cta($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE num_cuenta='{$db->escape($id)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}




function join_lecturas_table_lista(){
    global $db;
    $sql = "SELECT l.cod_lectura, l.num_cuenta, l.mes, l.anio, l.lectura_anterior, l.lectura_actual, c.nombre,c.apellido";
    $sql  .=" FROM lecturas l";
    $sql  .=" INNER JOIN inv_cliente c ON c.num_cuenta = l.num_cuenta";
    $sql  .=" ORDER BY l.cod_lectura ASC";
    return find_by_sql($sql);
    }
    
    function busq_ultima_fecha(){
    global $db;
    $sql = "SELECT num_cuenta, max(fecha_lectura)as ultima_fecha FROM lecturas ";
    //$sql  .=" ORDER BY num_cuenta ASC";
    return find_by_sql($sql);
    }

    //BUSCAR POR CUENTA MES Y AÑO
     function find_by_cta_mes_an($table,$id,$mes,$an)
{
  global $db;
  $id = (int)$id;
  $mes = (int)$mes;
  $an = (int)$an;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE num_cuenta='{$db->escape($id)}' && mes='{$db->escape($mes)}'&& anio='{$db->escape($an)}'");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

?>
