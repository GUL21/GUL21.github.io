<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
  define('myeshop', true);
       

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a><span id='slash'> \ </span><a href='orders.php' >Заказы</a><span id='slash'> \ </span><a href='view_order.php' >Подробности</a>";
  
  include("include/db_connect.php");
  include("include/functions.php"); 
 
  $id = clear_string($_GET["id"]);
  $action = $_GET["action"];
  
  if (isset($action))
{
   switch ($action) {

      case 'accept':
                     $update = mysql_query("UPDATE orders SET order_confirmed='yes' WHERE order_id = '$id'",$link);  

      break;
        
        case 'delete':
        
           $delete = mysql_query("DELETE FROM orders WHERE order_id = '$id'",$link); 
           header("Location: orders.php");   

      break;
        
  } 
    
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script> 
    <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script> 
    
  <title>Панель управления</title>
</head>
<body>
<div id="block-body">
<?php
  include("include/block-header.php");
?>
<div id="block-content">
<div id="block-parameters">
<span id="all_goods">ДЕТАЛИ</span>
</div>
<?php

  $result = mysql_query("SELECT * FROM orders WHERE order_id = '$id'",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
if ($row["order_confirmed"] == 'yes')
{
    $status = '<span class="green">Обработан</span>';
} else
{
    $status = '<span class="red">Не обработан</span>';    
}


 echo '
  <p class="view-order-link" ><a class="green" href="view_order.php?id='.$row["order_id"].'&action=accept" >Подтвердить заказ</a> | <a class="delete" rel="view_order.php?id='.$row["order_id"].'&action=delete" >Удалить заказ</a></p>
  <p class="order-datetime" >'.$row["order_datetime"].'</p>
  <p class="order-number" >Заказ № '.$row["order_id"].' - '.$status.'</p>

<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>№</TH>
<TH>Наименование товара</TH>
<TH>Цена</TH>
<TH>Количество</TH>
</TR>
';
$query_product = mysql_query("SELECT * FROM buy_products,table_products WHERE buy_products.buy_id_order = '$id' AND table_products.products_id = buy_products.buy_id_product",$link);
 
$result_query = mysql_fetch_array($query_product);
do
{
$price = $price + ($result_query["price"] * $result_query["buy_count_product"]);    
$index_count =  $index_count + 1; 
echo '
 <TR>
<TD  align="CENTER" >'.$index_count.'</TD>
<TD  align="CENTER" >'.$result_query["title"].'</TD>
<TD  align="CENTER" >'.$result_query["price"].' грн</TD>
<TD  align="CENTER" >'.$result_query["buy_count_product"].'</TD>
</TR>

';
} while ($result_query = mysql_fetch_array($query_product));



echo '
</TABLE>
<ul id="info-order">
<li>Обшая цена - <span>'.$price.'</span> грн</li>
<li>Способ доставки - <span>'.$row["order_dostavka"].'</span></li>
<li>Дата заказа - <span>'.$row["order_datetime"].'</span></li>
</ul>


<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>ФИО</TH>
<TH>Адрес</TH>
<TH>Контакты</TH>
<TH>Примечание</TH>
</TR>

 <TR>
<TD  align="CENTER" >'.$row["order_fio"].'</TD>
<TD  align="CENTER" >'.$row["order_address"].'</TD>
<TD  align="CENTER" >'.$row["order_phone"].'</br>'.$row["order_email"].'</TD>
<TD  align="CENTER" >'.$row["order_note"].'</TD>
</TR>
</TABLE>

 ';   
    
} while ($row = mysql_fetch_array($result));
}
    
}else
{
    echo '<p id="form-error" align="center">Ошибка!</p>';  
} 
?>
</div>
</div>
</body>
</html>