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
  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a><span id='slash'> \ </span><a href='tovar.php' >Товары</a>";
  
  include("include/db_connect.php");

  $action = $_GET["action"];
  if (isset($action))
  {
     $id = (int)$_GET["id"]; 
     switch ($action) {
        case 'delete':
             $delete = mysql_query("DELETE FROM table_products WHERE products_id = '$id'",$link);  
    
     
        break;
          
    } 
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Панель управления</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="jquery_confirm/jquery_confirm.css">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>
</head>
<body>
  <div id="block-body">
    <?php
      include("include/block-header.php");
    ?>
    <div id="block-content">
      <div id="block-parameters">
        <span id="all_goods_1">НАСТРОЙКА СВОЙСТВ</span>
      </div><br>
      <ul id="list_cat">
                <li>
                  <span id="cat1">Страна</span><br>
                  <select name="form_country" size="10" id="select_cat1">
                    <?php
                      $country = mysql_query("SELECT country FROM country WHERE country != ''",$link); 
                      if (mysql_num_rows($country) > 0)
                      {
                        $result_country = mysql_fetch_array($country);
                        do
                        {
                          echo '
                            <option value="'.$result_country["id"].'" >'.$result_country["country"].'</option>
                               ';    
                        }
                        while ($result_country = mysql_fetch_array($country));
                      }
                    ?> 
                  </select>
              </li>
          <li>
            <span id="cat1">Цвет</span><br>
              <select name="form_color" size="10" id="select_cat1">
                <?php
                  $color = mysql_query("SELECT color FROM color WHERE color != ''",$link); 
                  if (mysql_num_rows($color) > 0)
                  {
                    $result_color = mysql_fetch_array($color);
                    do
                    {
                      echo '
                        <option value="'.$result_color["id"].'" >'.$result_color["color"].'</option>
                           ';    
                    }
                    while ($result_color = mysql_fetch_array($color));
                  }
                ?> 
              </select>
          </li>
          <li>
            <span id="cat1">Материал</span><br>
              <select name="form_material" size="10" id="select_cat1">
                <?php
                  $material = mysql_query("SELECT material FROM material WHERE material != ''",$link); 
                  if (mysql_num_rows($material) > 0)
                  {
                    $result_material = mysql_fetch_array($material);
                    do
                    {
                      echo '
                        <option value="'.$result_material["id"].'" >'.$result_material["material"].'</option>
                           ';    
                    }
                    while ($result_material = mysql_fetch_array($material));
                  }
                ?> 
              </select>
          </li>
          <li>
            <span id="cat1">Размеры</span><br>
              <select name="form_size" size="10" id="select_cat1">
                <?php
                  $size = mysql_query("SELECT size FROM size WHERE size != ''",$link); 
                  if (mysql_num_rows($size) > 0)
                  {
                    $result_size = mysql_fetch_array($size);
                    do
                    {
                      echo '
                        <option value="'.$result_size["id"].'" >'.$result_size["size"].'</option>
                           ';    
                    }
                    while ($result_size = mysql_fetch_array($size));
                  }
                ?> 
              </select>
          </li>
          </ul>
          <p id="add">Добавить</p>
          <div id="add_form">
            <form method="post" action="props.php">
              <label class="add_class">Страна</label>
              <input type="text" name="country_add" id="input_country">
              <input type="submit" name="country_submit" value="Добавить">
            </form>
            <form method="post" action="props.php">
              <label class="add_class">Цвет</label>
              <input type="text" name="color_add" id="input_color">
              <input type="submit" name="color_submit" value="Добавить">
            </form>
            <form method="post" action="props.php">
              <label class="add_class">Материал</label>
              <input type="text" name="material_add" id="input_mat">
              <input type="submit" name="material_submit" value="Добавить">
            </form>
            <form method="post" action="props.php">
              <label class="add_class">Размер</label>
              <input type="text" name="size_add" id="input_size">
              <input type="submit" name="size_submit" value="Добавить">
            </form>
          </div>
          <?php
            if(isset($_POST["country_submit"]))
            {
              $country = $_POST["country_add"];
              mysql_query("INSERT INTO country (country) VALUES ('$country')");
            }
            if(isset($_POST["color_submit"]))
            {
              $color = $_POST["color_add"];
              mysql_query("INSERT INTO color (color) VALUES ('$color')");
            }
            if(isset($_POST["material_submit"]))
            {
              $material = $_POST["material_add"];
              mysql_query("INSERT INTO material (material) VALUES ('$material')");
            }
            if(isset($_POST["size_submit"]))
            {
              $size = $_POST["size_add"];
              mysql_query("INSERT INTO size (size) VALUES ('$size')");
            }
          ?>
  </div>
</body>
</html>
<?php
}else
{
    header("Location: login.php");
}
?>