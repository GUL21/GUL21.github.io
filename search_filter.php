<?php 
   define('myeshop', true);
   include("include/db_connect.php");
   include("functions/functions.php");
   session_start();

$sorting = $_GET["sort"];   
 
switch ($sorting)
{
    case 'price-asc';
    $sorting = 'price ASC';
    $sort_name = ' От дешевых к дорогим';
    break;

    case 'price-desc';
    $sorting = 'price DESC';
    $sort_name = ' От дорогих к дешевым';
    break;
    
    case 'title-asc';
    $sorting = 'title ASC';
    $sort_name = ' От А до Я';
    break;
    
    default:
    $sorting = 'products_id DESC';
    $sort_name = ' Нет сортировки';
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
<ul id="block-tovar-grid" >

<?php
  if ($_GET["start_price"] AND $_GET["end_price"])
  {
    $start_price = (int)$_GET["start_price"];
    $end_price = (int)$_GET["end_price"];
     $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["country"])
  {
    $country = implode(',',$_GET["country"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND country_id IN($country) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["color"])
  {
    $color = implode(',',$_GET["color"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND Cl IN($color) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["material"])
  {
    $material = implode(',',$_GET["material"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND M IN($material) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["size"])
  {
    $size = implode(',',$_GET["size"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["size"] AND $_GET["material"])
  {
    $size = implode(',',$_GET["size"]);
    $material = implode(',',$_GET["material"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND M IN($material) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["size"] AND $_GET["country"])
  {
    $size = implode(',',$_GET["size"]);
    $country = implode(',',$_GET["country"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND country_id IN($country) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["size"] AND $_GET["color"])
  {
    $size = implode(',',$_GET["size"]);
    $color = implode(',',$_GET["color"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND Cl IN($color) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["country"] AND $_GET["material"])
  {
    $country = implode(',',$_GET["country"]);
    $material = implode(',',$_GET["material"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND country_id IN($country) AND M IN($material) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["color"] AND $_GET["material"])
  {
    $color = implode(',',$_GET["color"]);
    $material = implode(',',$_GET["material"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND Cl IN($color) AND M IN($material) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["country"] AND $_GET["color"])
  {
    $country = implode(',',$_GET["country"]);
    $color = implode(',',$_GET["color"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND country_id IN($country) AND Cl IN($color) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
  if($_GET["size"] AND $_GET["material"] AND $_GET["country"])
  {
    $size = implode(',',$_GET["size"]);
    $material = implode(',',$_GET["material"]);
    $country = implode(',',$_GET["country"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND M IN($material) AND country_id IN($country) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
   if($_GET["size"] AND $_GET["material"] AND $_GET["color"])
  {
    $size = implode(',',$_GET["size"]);
    $material = implode(',',$_GET["material"]);
    $color = implode(',',$_GET["color"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND M IN($material) AND country_id IN($country) AND Cl IN($country) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
   if($_GET["size"] AND $_GET["color"] AND $_GET["country"])
  {
    $size = implode(',',$_GET["size"]);
    $color = implode(',',$_GET["color"]);
    $country = implode(',',$_GET["country"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND Cl IN($color) AND country_id IN($country) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
   if($_GET["color"] AND $_GET["material"] AND $_GET["country"])
  {
    $color = implode(',',$_GET["color"]);
    $material = implode(',',$_GET["material"]);
    $country = implode(',',$_GET["country"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND Cl IN($color) AND M IN($material) AND country_id IN($country) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }
   if($_GET["size"] AND $_GET["material"] AND $_GET["country"] AND $_GET["color"])
  {
    $size = implode(',',$_GET["size"]);
    $material = implode(',',$_GET["material"]);
    $country = implode(',',$_GET["country"]);
    $color = implode(',',$_GET["color"]);
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND S IN($size) AND M IN($material) AND country_id IN($country) AND Cl IN($color) AND price BETWEEN $start_price AND $end_price ORDER BY products_id DESC",$link);
  }

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
else
{
  echo '<p id="result">Товаров не найдено</p>';
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