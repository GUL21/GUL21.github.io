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
  $_SESSION['urlpage'] = "<a href='index.php'>Главная</a><span id='slash'> \ </span><a href='tovar.php'>Товары</a><span id='slash'> \ </span><a>Добавить товар</a>";
  
  include("include/db_connect.php");
  // include("include/functions.php");
  // require "libs/DB.php";

  //     if (isset($_POST['submit_add']))
  //     {
  //       $good = R::dispen

  //     }
  //   }
      if(isset($_POST['submit_add']))
      {

        $image = $_POST['form_picture'];
        $title = $_POST['form_title'];
        $price = $_POST['form_price'];
        $category = $_POST['form_category'];
        $country = $_POST['form_country'];
        $color = $_POST['form_color'];
        $material = $_POST['form_material'];
        $size = $_POST['form_size'];
        $num = $_POST['form_num'];
        $Ctg = $_POST['Ctg'];
        $country_id = $_POST['country_id'];
        $Cl = $_POST['Cl'];
        $M = $_POST['M'];
        $S = $_POST['S'];
        $visible = $_POST["chk_visible"];
        $new = $_POST["chk_new"];
        $leader = $_POST["chk_leader"];
        $sale = $_POST["chk_sale"];

        mysql_query("INSERT INTO table_products 
                     (image, title, price, category, country, color, material, size, num, cat_id, country_id, Cl, M, S, visible, new, leader, sale)
                     VALUES('$image', '$title', '$price', '$category', '$country', '$color', '$material', '$size', '$num', '$Ctg', '$country_id', '$Cl', '$M', '$S', '$visible', '$new', '$leader', '$sale')");
      }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Панель управления</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
  <div id="block-body">
    <?php
      include("include/block-header.php");
    ?>
    <div id="block-content">
      <div id="block-parameters">
        <span id="all_goods">ДОБАВЛЕНИЕ ТОВАРА</span>
      </div>
      <form method="POST" action="add_product.php">
        <ul id="edit-tovar">
          <li>
            <label>Название товара</label>
              <input type="text" name="form_title">
          </li>
          <li>
            <label>Цена</label>
              <input type="number" name="form_price" id="number">
          </li>
          <li>
            <label>Категория</label>
              <select name="form_category" size="1">
                <?php
                  $category = mysql_query("SELECT category FROM category WHERE category != ''",$link);
                  if (mysql_num_rows($category) > 0)
                  {
                    $result_category = mysql_fetch_array($category);
                    do
                    {
                      echo '
                        <option>'.$result_category["category"].'</option>
                           ';    
                    }
                    while ($result_category = mysql_fetch_array($category));
                  }
                ?> 
              </select><br><br>
              <label>Ctg</label>
              <select name="Ctg" size="1">
                <?php
                  $ctg = mysql_query("SELECT cat_id FROM category WHERE category != ''",$link);
                  if (mysql_num_rows($ctg) > 0)
                  {
                    $result_ctg = mysql_fetch_array($ctg);
                    do
                    {
                      echo '
                        <option>'.$result_ctg["cat_id"].'</option>
                           ';    
                    }
                    while ($result_ctg = mysql_fetch_array($ctg));
                  }
                ?> 
              </select>
          </li>
          <li>
            <label>Страна</label>
              <select name="form_country" size="1">
                <?php
                  $country = mysql_query("SELECT country FROM country WHERE country != ''",$link); 
                  if (mysql_num_rows($country) > 0)
                  {
                    $result_country = mysql_fetch_array($country);
                    do
                    {
                      echo '
                        <option>'.$result_country["country"].'</option>
                           ';    
                    }
                    while ($result_country = mysql_fetch_array($country));
                  }
                ?> 
              </select><br><br>
              <label>country_id</label>
              <select name="country_id" size="1">
                <?php
                  $country_id = mysql_query("SELECT cou_id FROM country WHERE country != ''",$link);
                  if (mysql_num_rows($country_id) > 0)
                  {
                    $result_country_id = mysql_fetch_array($country_id);
                    do
                    {
                      echo '
                        <option>'.$result_country_id["cou_id"].'</option>
                           ';    
                    }
                    while ($result_country_id = mysql_fetch_array($country_id));
                  }
                ?> 
              </select>
          </li>
          <li>
            <label>Цвет</label>
              <select name="form_color" size="1">
                <?php
                  $color = mysql_query("SELECT color FROM color WHERE color != ''",$link); 
                  if (mysql_num_rows($color) > 0)
                  {
                    $result_color = mysql_fetch_array($color);
                    do
                    {
                      echo '
                        <option>'.$result_color["color"].'</option>
                           ';    
                    }
                    while ($result_color = mysql_fetch_array($color));
                  }
                ?> 
              </select><br><br>
              <label>Cl</label>
              <select name="Cl" size="1">
                <?php
                  $Cl = mysql_query("SELECT col_id FROM color WHERE color != ''",$link);
                  if (mysql_num_rows($Cl) > 0)
                  {
                    $result_Cl = mysql_fetch_array($Cl);
                    do
                    {
                      echo '
                        <option>'.$result_Cl["col_id"].'</option>
                           ';    
                    }
                    while ($result_Cl = mysql_fetch_array($Cl));
                  }
                ?> 
              </select>
          </li>
          <li>
            <label>Материал</label>
              <select name="form_material" size="1">
                <?php
                  $material = mysql_query("SELECT material FROM material WHERE material != ''",$link); 
                  if (mysql_num_rows($material) > 0)
                  {
                    $result_material = mysql_fetch_array($material);
                    do
                    {
                      echo '
                        <option>'.$result_material["material"].'</option>
                           ';    
                    }
                    while ($result_material = mysql_fetch_array($material));
                  }
                ?> 
              </select><br><br>
              <label>M</label>
              <select name="M" size="1">
                <?php
                  $M = mysql_query("SELECT mat_id FROM material WHERE material != ''",$link);
                  if (mysql_num_rows($M) > 0)
                  {
                    $result_M = mysql_fetch_array($M);
                    do
                    {
                      echo '
                        <option>'.$result_M["mat_id"].'</option>
                           ';    
                    }
                    while ($result_M = mysql_fetch_array($M));
                  }
                ?> 
              </select>
          </li>
          <li>
            <label>Размеры</label>
              <select name="form_size" size="1">
                <?php
                  $size = mysql_query("SELECT size FROM size WHERE size != ''",$link); 
                  if (mysql_num_rows($size) > 0)
                  {
                    $result_size = mysql_fetch_array($size);
                    do
                    {
                      echo '
                        <option>'.$result_size["size"].'</option>
                           ';    
                    }
                    while ($result_size = mysql_fetch_array($size));
                  }
                ?> 
              </select><br><br>
              <label>S</label>
              <select name="S" size="1">
                <?php
                  $S = mysql_query("SELECT si_id FROM size WHERE size != ''",$link);
                  if (mysql_num_rows($S) > 0)
                  {
                    $result_S = mysql_fetch_array($S);
                    do
                    {
                      echo '
                        <option>'.$result_S["si_id"].'</option>
                           ';    
                    }
                    while ($result_S = mysql_fetch_array($S));
                  }
                ?> 
              </select>
          </li>
          <li>
            <label>Количество</label>
              <input type="number" name="form_num" id="number">
          </li>
          <li>
            <label>Изображение</label>
              <input type="file" name="form_picture" id="picture">
          </li>
</ul>   
<ul id="chkbox">
  <li>
    <input type="checkbox" name="chk_visible" id="chk_visible" value="1"><label for="chk_visible">Видимый товар</label>
  </li>
  <li>
    <input type="checkbox" name="chk_new" id="chk_new" value="1"><label for="chk_new">Новый товар</label>
  </li>
  <li>
    <input type="checkbox" name="chk_leader" id="chk_leader" value="1"><label for="chk_leader">Популярный товар</label>
  </li>
  <li>
    <input type="checkbox" name="chk_sale" id="chk_sale" value="1"><label for="chk_sale">Товар со скидками</label>
  </li>
</ul> 


    <p align="right"><input type="submit" id="submit_form" name="submit_add" value="Добавить товар"/></p>     
</form>
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