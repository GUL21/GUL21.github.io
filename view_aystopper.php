<?php
   define('myeshop', true);	
   include("include/db_connect.php");
   include("functions/functions.php");
   session_start();
 
 
    $go = clear_string($_GET["go"]);
    
    switch ($go) {

	    case "news":     
	    $query_aystopper= " WHERE visible = '1' AND new = '1'";
        $name_aystopper = "Новинки";
	    break;

	    case "leaders":
	    $query_aystopper= " WHERE visible = '1' AND leader = '1'";
        $name_aystopper = "Лидеры продаж";
	    break;

	    case "sale":
	    $query_aystopper= " WHERE visible = '1' AND sale = '1'";
        $name_aystopper = "Распродажа";
	    break;
        
        
	    default:
        $query_aystopper = "";  
	    break;
}    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/shop-script.js"></script>
    
	 <title>У ВИННИ</title>
  <link rel="shortcut icon" href="images/puhh.ico" type="image/x-icon">
</head>
<body>
<div id="block-body">
<?php 
    include("include/block-header.php");    
?>
<div id="block-left">
<ul id="cat">
  <li><a id="category" href="bosonozhki.php">БОСОНОЖКИ<img src="images/puh2.png" width="100" height="70" alt=""></a></li>
  <li><a id="category" href="sport.php">СПОРТ<img src="images/puh2.png" width="100" height="70" alt=""></a></li>
  <li><a id="category" href="bodiki.php">БОДИКИ<img src="images/puh2.png" width="100" height="70" alt=""></a></li>
  <li><a id="category" href="kepki.php">КЕПКИ<img src="images/puh2.png" width="100" height="70" alt=""></a></li>
  <li><a id="category" href="t_shirts.php">ФУТБОЛКИ<img src="images/puh2.png" width="100" height="70" alt=""></a></li>
</ul>
<br><br>
<?php 
    include("include/block-parameter.php");  
?>
</div>
</div>
<div id="block-right">
<?php
  include("include/block-right.php");
  // include("include/block-news.php"); 
?>
</div>
<div id="block-content-1">

<ul id="block-tovar-grid">
<?php
	
  $result = mysql_query("SELECT * FROM table_products $query_aystopper ORDER BY products_id",$link);  

if (mysql_num_rows($result) > 0)
{
 $row = mysql_fetch_array($result); 
 
 do
 {

if  ($row["image"] != "" && file_exists("products/".$row["image"]))
{
$img_path = 'products/'.$row["image"];
$max_width = 150; 
$max_height = 150; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}
  
  echo '
  
  <li>
    <div class="block-tovar">
    <center>
      <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
      <p class="prop">'.$row["title"].'</p>
    </center>
  <p class="features" >'.group_numerals($row["price"]).' грн</p>
  <a class="add-cart-style-grid" tid="'.$row["products_id"].'" ><img src="images/buy.png" width="40" height="40"></a>
  <br>
  <p class="features">Страна: <span class="normal">'.$row["country"].'</span></p>
  <p class="features">Цвет: <span class="normal">'.$row["color"].'</span></p>
  <p class="features">Материал: <span class="normal">'.$row["material"].'</span></p>
  <p class="features">Размеры: <span class="normal">'.$row["size"].'</span></p>
  <br>
  <center><p class="features">В НАЛИЧИИ: <span class="normal">'.$row["num"].'</span></p></center>
  
  </div>
  </li>
  
  ';
  
    
 }
    while ($row = mysql_fetch_array($result));
}  
?>


</ul>
</div>
<center>
  <div id="block-footer">
    <?php 
      include("include/block-footer.php"); 
    ?>
  </div>
</center>

</body>
</html>