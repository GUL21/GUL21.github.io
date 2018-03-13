<?php
	defined('myeshop') or die('Äîñòóï çàïðåù¸í!');
?>
<div id="block-parameter">
<p class="header-title">Поиск по параметрам</p>
<p class="title-filter">Цена</p>

<form method="GET" action="search_filter.php">


<div id="block-input-price">
<ul>
<li><p>От</p></li>
<li><input type="text" id="start-price" name="start_price" value="100"></li>
<li><p>До</p></li>
<li><input type="text" id="end-price" name="end_price" value="2000"></li>
<li><p>грн</p></li>
</ul>
</div>
<ul class="checkbox-brand">
<p class="title-filter">Страна</p>
<?php

$result = mysql_query("SELECT * FROM country WHERE country != ''",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  do
 {
 $checked_country = ""; 
 if ($_GET["country"])
 {
    if (in_array($row["cou_id"],$_GET["country"]))
    {
        $checked_country = "checked";
    }
    
 } 
  
  
  echo '
<li><input '.$checked_country.' type="checkbox" name="country[]" value="'.$row["cou_id"].'" id="checkcountry'.$row["cou_id"].'" /><label for="checkcountry'.$row["cou_id"].'">'.$row["country"].'</label></li>
  
  
  '; 
 }
  while ($row = mysql_fetch_array($result));  
} 
  
?>
<br>
<p class="title-filter">Цвет</p>
<?php

$result = mysql_query("SELECT * FROM color WHERE color != ''",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  do
 {
 $checked_color = ""; 
 if ($_GET["color"])
 {
    if (in_array($row["col_id"],$_GET["color"]))
    {
        $checked_color = "checked";
    }
    
 } 
  
  
  echo '
<li><input '.$checked_color.' type="checkbox" name="color[]" value="'.$row["col_id"].'" id="checkcolor'.$row["col_id"].'" /><label for="checkcolor'.$row["col_id"].'">'.$row["color"].'</label></li>
  
  
  '; 
 }
  while ($row = mysql_fetch_array($result));  
} 
  
?>
<br>
<p class="title-filter">Материал</p>
<?php

$result = mysql_query("SELECT * FROM material WHERE material != ''",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  do
 {
 $checked_material = ""; 
 if ($_GET["material"])
 {
    if (in_array($row["mat_id"],$_GET["material"]))
    {
        $checked_material = "checked";
    }
    
 } 
  
  
  echo '
<li><input '.$checked_material.' type="checkbox" name="material[]" value="'.$row["mat_id"].'" id="checkmaterial'.$row["mat_id"].'" /><label for="checkmaterial'.$row["mat_id"].'">'.$row["material"].'</label></li>
  
  
  '; 
 }
  while ($row = mysql_fetch_array($result));  
} 
  
?>
<br>
<p class="title-filter">Размеры</p>
<?php

$result = mysql_query("SELECT * FROM size WHERE size != ''",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  do
 {
 $checked_size = ""; 
 if ($_GET["size"])
 {
    if (in_array($row["si_id"],$_GET["size"]))
    {
        $checked_size = "checked";
    }
    
 } 
  
  
  echo '
<li><input '.$checked_size.' type="checkbox" name="size[]" value="'.$row["si_id"].'" id="checksize'.$row["si_id"].'" /><label for="checksize'.$row["si_id"].'">'.$row["size"].'</label></li>
  
  
  '; 
 }
  while ($row = mysql_fetch_array($result));  
} 
  
?>
<center><input type="submit" name="submit" id="button-param-search" value="НАЙТИ" /></center> 

</form>


</div>