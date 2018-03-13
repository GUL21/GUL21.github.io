<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
  define('myeshop', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a>";
  
  include("include/db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Панель управления</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
</head>
<body>
  <div id="block-body">
    <?php
      include("include/block-header.php");

      $query1 = mysql_query("SELECT * FROM orders",$link);
      $result1 = mysql_num_rows($query1);
 // Îáùåå êîëè÷åñòâî òîâàðîâ 
 $query2 = mysql_query("SELECT * FROM table_products",$link);
 $result2 = mysql_num_rows($query2);   
 // Îáùåå êîëè÷åñòâî îòçûâîâ 
    ?>
    <div id="block-content">
      <div id="block-parameters">
        <span id="all_goods">ОБЩАЯ СТАТИСТИКАz</span>
      </div>
      <ul id="general-statistics">
        <li><p>Всего заказов - <span><?php echo $result1; ?></span></p></li>
        <li><p>Товаров - <span><?php echo $result2; ?></span></p></li>
      </ul>
    </div>  
  </div>
</body>
</html>
<?php
}else
{
    header("Location: login.php");
}
?>