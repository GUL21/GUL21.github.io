<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
  define('myeshop', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
        header("Cache-Control: no-store,no-cache,mustrevalidate");
    }
  $_SESSION['urlpage'] = "<a href='index.php'>Главная</a><span id='slash'> \ </span><a href='tovar.php'>Товары</a><span id='slash'> \ </span><a>Изменить товар</a>";
  
  include("include/db_connect.php");
  include("include/functions.php");
  $id = clear_string($_GET["id"]);

      if(isset($_POST['submit_save']))
      {

        mysql_query("UPDATE table_products SET image='{$_POST['form_picture']}', title='{$_POST['form_title']}', price='{$_POST['form_price']}', category='{$_POST['form_category']}', Ctg='{$_POST['Ctg']}', country='{$_POST['form_country']}', country_id='{$_POST['country_id']}', color='{$_POST['form_color']}', Cl='{$_POST['Cl']}', material='{$_POST['form_material']}', M='{$_POST['M']}', size='{$_POST['form_size']}', S='{$_POST['S']}', num='{$_POST['form_num']}', visible='{$_POST['chk_visible']}', new='{$_POST['chk_new']}', leader='{$_POST['chk_leader']}', sale='{$_POST['chk_sale']}' WHERE products_id='$id'");
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
        <span id="all_goods">ИЗМЕНЕНИЕ ТОВАРА</span>
      </div>
      <?php
        $result = mysql_query("SELECT * FROM table_products WHERE products_id='$id'", $link);
        if (mysql_num_rows($result) > 0)
        {
          $row = mysql_fetch_array($result);
          do
          {
              echo '
                <form method="POST" enctype="multipart/form-data">
        <ul id="edit-tovar">
          <li>
            <label>Название товара</label>
              <input type="text" name="form_title" value="'.$row["title"].'">
          </li>
          <li>
            <label>Цена</label>
              <input type="number" name="form_price" id="number" value="'.$row["price"].'">
          </li>
          <li>
            <label>Категория</label>
            <input type="text" name="form_category" id="number" value="'.$row["category"].'">
              <select name="form_category" size="1">
              ';
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
                  echo '
                  </select><br><br>
              <label>Ctg</label>
              <input type="number" name="form_ctg" id="number" value="'.$row["cat_id"].'">
              <select name="Ctg" size="1">
              ';
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
                  echo '
                    </select>
                      </li>
                      <li>
                        <label>Страна</label>
                        <input type="text" name="form_country" id="number" value="'.$row["country"].'">
                      <select name="form_country" size="1">
                  ';               
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
                  echo '
                    </select><br><br>
                  <label>country_id</label>
                  <input type="number" name="form_country_id" id="number" value="'.$row["country_id"].'">
                  <select name="country_id" size="1">
                  ';
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
                  echo '
                  </select>
                    </li>
                    <li>
                      <label>Цвет</label>
                      <input type="text" name="form_color" id="number" value="'.$row["color"].'">
                       <select name="form_color" size="1">
                  ';
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
                  echo '
                </select><br><br>
                  <label>Cl</label>
                  <input type="number" name="form_Cl" id="number" value="'.$row["Cl"].'">
                  <select name="Cl" size="1">
                  ';
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
                  echo '
              </select>
            </li>
            <li>
              <label>Материал</label>
              <input type="text" name="form_material" id="number" value="'.$row["material"].'">
                <select name="form_material" size="1">
                  ';
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
                  echo '
                </select><br><br>
              <label>M</label>
              <input type="number" name="form_M" id="number" value="'.$row["M"].'">
              <select name="M" size="1">
                  ';
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
                  echo '
                    </select>
                      </li>
                     <li>
                       <label>Размеры</label>
                       <input type="text" name="form_size" id="number" value="'.$row["size"].'">
                     <select name="form_size" size="1">
                  ';
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
                  echo '
                  </select><br><br>
              <label>S</label>
              <input type="number" name="form_S" id="number" value="'.$row["S"].'">
              <select name="S" size="1">
              ';
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

                  if ($row["visible"] == '1') $checked1 = "checked";
                  if ($row["new"] == '1') $checked2 = "checked";
                  if ($row["leader"] == '1') $checked3 = "checked";
                  if ($row["sale"] == '1') $checked4 = "checked";

                  echo '
                  </select>
          </li>
          <li>
            <label>Количество</label>
              <input type="number" name="form_num" id="number" value="'.$row["num"].'">
          </li>
          <li>
            <label>Изображение</label>
              <input type="text" name="form_picture" id="number" value="'.$row["image"].'">
          </li>
</ul>   
<ul id="chkbox">
  <li>
    <input type="checkbox" name="chk_visible" id="chk_visible" '.$checked1.' value="1"><label for="chk_visible">Видимый товар</label>
  </li>
  <li>
    <input type="checkbox" name="chk_new" id="chk_new" '.$checked2.' value="1"><label for="chk_new">Новый товар</label>
  </li>
  <li>
    <input type="checkbox" name="chk_leader" id="chk_leader" '.$checked3.' value="1"><label for="chk_leader">Популярный товар</label>
  </li>
  <li>
    <input type="checkbox" name="chk_sale" id="chk_sale" '.$checked4.' value="1"><label for="chk_sale">Товар со скидками</label>
  </li>
</ul> 


    <p align="right"><input type="submit" id="submit_save" name="submit_save" value="Сохранить"/></p>     
</form>
';
                   } while ($row = mysql_fetch_array($result));
                  }
                ?> 
              
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