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
  <li class="active"><a id="category" href="kepki.php">КЕПКИ<img src="images/puh2.png" width="100" height="70" alt=""></a></li>
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
<div id="block-content">
  <div id="block-sorting">
  <p id="nav-breadcrumbs"><a href="index.php" >Главная</a> \ <span>Все товары</span></p>
<ul id="options-list">
<li>Сортировка:</li>
<li><a id="select-sort"><?php echo $sort_name; ?></a></li>
  <ul id="sorting-list">
  <li><a href="kepki.php?sort=price-asc" >От дешевых к дорогим</a></li>
  <li><a href="kepki.php?sort=price-desc" >От дорогих к дешевым</a></li>
  <li><a href="kepki.php?sort=title-asc" >От А до Я</a></li>
  </ul>
</ul>
</div>
<ul id="block-tovar-grid" >

<?php
$num = 6; // Çäåñü óêàçûâàåì ñêîëüêî õîòèì âûâîäèòü òîâàðîâ.
    $page = (int)$_GET['page'];              
    
  $count = mysql_query("SELECT COUNT(*) FROM table_products WHERE visible = '1' AND category='КЕПКИ'",$link);
    $temp = mysql_fetch_array($count);
  If ($temp[0] > 0)
  {  
  $tempcount = $temp[0];
  // Íàõîäèì îáùåå ÷èñëî ñòðàíèö
  $total = (($tempcount - 1) / $num) + 1;
  $total =  intval($total);
  $page = intval($page);
  if(empty($page) or $page < 0) $page = 1;  
       
  if($page > $total) $page = $total;
   
  // Âû÷èñëÿåì íà÷èíàÿ ñ êàêîãî íîìåðà
    // ñëåäóåò âûâîäèòü òîâàðû 
  $start = $page * $num - $num;
  $qury_start_num = " LIMIT $start, $num"; 
  }
  $result = mysql_query("SELECT * FROM table_products WHERE visible='1' AND category='КЕПКИ' ORDER BY $sorting $qury_start_num",$link);  

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
  <a class="add-cart-style-grid" tid="'.$row["products_id"].'"><img src="images/buy.png" width="40" height="40"></a>
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

echo '</ul>';
if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="kepki.php?page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="kepki.php?page='.($page + 1).'">&gt;</a></li>';
// Ôîðìèðóåì ññûëêè ñî ñòðàíèöàìè
if($page - 5 > 0) $page5left = '<li><a href="kepki.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="kepki.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="kepki.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="kepki.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="kepki.php?page='.($page - 1).'">'.($page - 1).'</a></li>';
if($page + 5 <= $total) $page5right = '<li><a href="kepki.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="kepki.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="kepki.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="kepki.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="kepki.php?page='.($page + 1).'">'.($page + 1).'</a></li>';
if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="kepki.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}
if ($total > 1)
{
    echo '
    <div class="pstrnav">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='kepki.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    ';
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