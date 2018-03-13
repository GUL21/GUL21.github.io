<?php
   define('myeshop', true); 
   include("include/db_connect.php");
   include("functions/functions.php");
   session_start();
  
     $id = clear_string($_GET["id"]);
     $action = clear_string($_GET["action"]);
    
   switch ($action) {

      case 'clear':
        $clear = mysql_query("DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);     
      break;
        
        case 'delete':     
        $delete = mysql_query("DELETE FROM cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);        
        break;
        
  }
    
if (isset($_POST["submitdata"]))
{

$_SESSION["order_delivery"] = $_POST["order_delivery"];
$_SESSION["order_fio"] = $_POST["order_fio"];
$_SESSION["order_email"] = $_POST["order_email"];
$_SESSION["order_phone"] = $_POST["order_phone"];
$_SESSION["order_address"] = $_POST["order_address"];
$_SESSION["order_note"] = $_POST["order_note"];

    mysql_query("INSERT INTO orders(order_datetime,order_dostavka,order_fio,order_address,order_phone,order_note,order_email)
            VALUES( 
                             NOW(),
                            '".clear_string($_POST["order_delivery"])."',         
              '".clear_string($_POST["order_fio"])."',
                            '".clear_string($_POST["order_address"])."',
                            '".clear_string($_POST["order_phone"])."',
                            '".clear_string($_POST["order_note"])."',
                            '".clear_string($_POST["order_email"])."'                   
                )",$link);    

                          
 $_SESSION["order_id"] = mysql_insert_id();                          
                            
$result = mysql_query("SELECT * FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);    

do{

    mysql_query("INSERT INTO buy_products(buy_id_order,buy_id_product,buy_count_product)
            VALUES( 
                            '".$_SESSION["order_id"]."',          
              '".$row["cart_id_product"]."',
                            '".$row["cart_count"]."'                   
                )",$link);



} while ($row = mysql_fetch_array($result));
}
                            
header("Location: cart.php?action=completion");
}      


$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_product",$link);
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);

do
{ 
$int = $int + ($row["price"] * $row["cart_count"]); 
}
 while ($row = mysql_fetch_array($result));
 

   $itogpricecart = $int;
} 


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
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
  <?php
    $action = clear_string($_GET["action"]);
    switch ($action) {
      
      case 'oneclick':
        echo '
          <div id="block-step">
            <div id="name-step">
              <ul>
                <li><a class="active">1. Корзина товаров</a></li>
                <li><span>&rarr;</span></li>
                <li><a>2. Контактная информация</a></li>
                <li><span>&rarr;</span></li>
                <li><a>3. Завершение</a></li>
              </ul>
            </div>
            <p>шаг 1 из 3</p>
            <a href="cart.php?action=clear">Очистить</a>
          </div>
        ';

        $result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_product",$link);
        if (mysql_num_rows($result) > 0)
        {
          $row = mysql_fetch_array($result);
          echo '
            <div id="header-list-cart">
              <div id="head1">Изображение</div>
              <div id="head2">Наименование товара</div>
              <div id="head3">Кол-во</div>
              <div id="head4">Цена</div>
            </div>
          ';
          do
          {
            $int = $row["cart_price"] * $row["cart_count"];
            $all_price = $all_price + $int;
            if  (strlen($row["image"]) > 0 && file_exists("products/".$row["image"]))
            {
              $img_path = 'products/'.$row["image"];
              $max_width = 100; 
              $max_height = 100; 
               list($width, $height) = getimagesize($img_path); 
              $ratioh = $max_height/$height; 
              $ratiow = $max_width/$width; 
              $ratio = min($ratioh, $ratiow); 
              $width = intval($ratio*$width); 
              $height = intval($ratio*$height);    
            }
        echo '
          <div class="block-list-cart">
            <div class="img-cart">
              <p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></p>
            </div>
            <div class="title-cart">
              <p><span>'.$row["title"].'</span></p>
            </div>
            <div class="count-cart">
              <ul class="input-count-style">
                <li>
                  <p align="center" iid="'.$row["cart_id"].'" class="count-minus">-</p>
                </li>
                <li>
                  <p align="center" iid="'.$row["cart_id"].'"><input class="count-input" id="input-id'.$row["cart_id"].'" maxlength="3" type="text" value="'.$row["cart_count"].'"></p>
                </li>
                <li>
                  <p align="center" iid="'.$row["cart_id"].'" class="count-plus">+</p>
                </li>
              </ul>
            </div>
            <div id="tovar'.$row["cart_id"].'" class="price-product"><h5><span class="span-count" >'.$row["cart_count"].'</span> x <span>'.$row["cart_price"].'</span></h5><p price="'.$row["cart_price"].'" >'.group_numerals($int).' грн</p></div>
            <div class="delete-cart">
              <a  href="cart.php?id='.$row["cart_id"].'&action=delete">
                <img id="del" src="images/bsk_item_del.png">
              </a>
            </div>
            <div id="bottom-cart-line">
            </div>
          </div>
        ';
        }
          while ($row = mysql_fetch_array($result));
          echo '
            <h2 class="itog-price" align="right">Итого: <strong>'.group_numerals($all_price).'</strong> грн</h2>
            <p align="right" class="button-next">
              <a href="cart.php?action=confirm">Далее</a>
            </p> 
          ';
        } 
          else
          {
            echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
          }
      break;

      case 'confirm':
        echo '
          <div id="block-step">
            <div id="name-step">
              <ul>
                <li><a href="cart.php?action=oneclick">1. Корзина товаров</a></li>
                <li><span>&rarr;</span></li>
                <li><a class="active">2. Контактная информация</a></li>
                <li><span>&rarr;</span></li>
                <li><a>3. Завершение</a></li>
              </ul>
            </div>
            <p>шаг 2 из 3</p>
          </div>
        ';
        if ($_SESSION['order_delivery'] == "Курьером") $chck1 = "checked";
        if ($_SESSION['order_delivery'] == "НОВА ПОШТА") $chck2 = "checked";
 
          echo '
            <h3 class="title-h3" >Способ доставки:</h3>
            <form method="post" id="#form">
              <ul id="info-radio">
                <li>
                  <input type="radio" name="order_delivery" class="order_delivery" id="order_delivery1" value="Курьером" '.$chck1.'>
                  <label class="label_delivery" for="order_delivery1">Курьером</label>
                </li>
                <li>
                  <input type="radio" name="order_delivery" class="order_delivery" id="order_delivery2" value="НОВА ПОШТА" '.$chck2.'>
                  <label class="label_delivery" for="order_delivery2">НОВА ПОШТА</label>
                </li>              
              </ul>
              <h3 class="title-h3" >Информация для доставки:</h3>   
              ';
          echo '
              <ul id="info-order">
              <li><label for="order_fio"><span>*</span>ФИО</label><input type="text" name="order_fio" id="order_fio" value="'.$_SESSION["order_fio"].'" /></li>
              <li><label for="order_email"><span>*</span>E-mail</label><input type="text" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'" /></li>
              <li><label for="order_phone"><span>*</span>Телефон</label><input type="text" name="order_phone" id="order_phone" value="'.$_SESSION["order_phone"].'" /></li>
              <li><label class="order_label_style" for="order_address"><span>*</span>Адрес<br /> доставки</label><input type="text" name="order_address" id="order_address" value="'.$_SESSION["order_address"].'" /></li>
            <li><label class="order_label_style" for="order_note">Примечание</label><textarea name="order_note"  >'.$_SESSION["order_note"].'</textarea></li>
              </ul>
          <p align="right" ><input type="submit" name="submitdata" id="confirm-button-next" value="Заказать"></p>
          </form>
          <h3 class="title-h3">Пример оформления:</h3>
            <span class="order_span_style"><b>ФИО:</b> Иванов Иван Иванович</span><br><br>
            <span class="order_span_style"><b>E-mail:</b> ivanov@mail.ru</span><br><br>
            <span class="order_span_style"><b>Телефон:</b> 8 950 100 12 34</span><br><br>
            <span class="order_span_style"><b>Адрес доставки:</b> г. Киев, ул. Ломоносова,61 или г. Киев, 353 отделение</span><br><br>
            <span class="order_span_style"><b>Примечание:</b> доставка после 16.00</span>
          ';      
      
        break;

        case 'completion':
        echo '
          <div id="block-step">
            <div id="name-step">
              <ul>
                <li><a href="cart.php?action=oneclick">1. Корзина товаров</a></li>
                <li><span>&rarr;</span></li>
                <li><a href="cart.php?action=confirm">2. Контактная информация</a></li>
                <li><span>&rarr;</span></li>
                <li><a class="active">3. Завершение</a></li>
              </ul>
            </div>
            <p>шаг 3 из 3</p>
            <a href="cart.php?action=clear">Очистить</a>
          </div>';
          echo '<div id="anima">
                  <center>
                    <span>Ваш заказ успешно оформлен!<br><br>Спасибо, что выбрали нас!</span>
                    <img src="images/puh.gif" id="img_1" width="150" height="150">
                  </center>
                </div>';
          break; 
      default:
        echo '
          <div id="block-step">
            <div id="name-step">
              <ul>
                <li><a class="active">1. Корзина товаров</a></li>
                <li><span>&rarr;</span></li>
                <li><a>2. Контактная информация</a></li>
                <li><span>&rarr;</span></li>
                <li><a>3. Завершение</a></li>
              </ul>
            </div>
            <p>шаг 1 из 3</p>
            <a href="cart.php?action=clear">Очистить</a>
          </div>
        ';

        $result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_product",$link);
        if (mysql_num_rows($result) > 0)
        {
          $row = mysql_fetch_array($result);
          echo '
            <div id="header-list-cart">
              <div id="head1">Изображение</div>
              <div id="head2">Наименование товара</div>
              <div id="head3">Кол-во</div>
              <div id="head4">Цена</div>
            </div>
          ';
          do
          {
            $int = $row["cart_price"] * $row["cart_count"];
            $all_price = $all_price + $int;
            if  (strlen($row["image"]) > 0 && file_exists("tovars_images/".$row["image"]))
            {
              $img_path = 'tovars_images/'.$row["image"];
              $max_width = 100; 
              $max_height = 100; 
               list($width, $height) = getimagesize($img_path); 
              $ratioh = $max_height/$height; 
              $ratiow = $max_width/$width; 
              $ratio = min($ratioh, $ratiow); 
              $width = intval($ratio*$width); 
              $height = intval($ratio*$height);    
            }
        echo '
          <div class="block-list-cart">
            <div class="img-cart">
              <p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></p>
            </div>
            <div class="title-cart">
              <p><span>'.$row["title"].'</span></p>
            </div>
            <div class="count-cart">
              <ul class="input-count-style">
                <li>
                  <p align="center" class="count-minus">-</p>
                </li>
                <li>
                  <p align="center"><input class="count-input" maxlength="3" type="text" value="'.$row["cart_count"].'"></p>
                </li>
                <li>
                  <p align="center" class="count-plus">+</p>
                </li>
              </ul>
            </div>
            <div class="price-product">
              <h5><span class="span-count">'.$row["cart_count"].'</span> x <span>'.$row["cart_price"].'</span></h5>
              <p>'.group_numerals($int).'</p>
            </div>
            <div class="delete-cart">
              <a  href="cart.php?id='.$row["cart_id"].'&action=delete">
                <img id="del" src="images/bsk_item_del.png">
              </a>
            </div>
            <div id="bottom-cart-line">
            </div>
          </div>
        ';
        }
          while ($row = mysql_fetch_array($result));
          echo '
            <h2 class="itog-price" align="right">Итого: <strong>'.group_numerals($all_price).'</strong> грн</h2>
            <p align="right" class="button-next">
              <a href="cart.php?action=confirm">Далее</a>
            </p> 
          ';
        } 
          else
          {
            echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
          }
      break;

      case 'confirm':
        echo '
          <div id="block-step">
            <div id="name-step">
              <ul>
                <li><a>1. Корзина товаров</a></li>
                <li><span>&rarr;</span></li>
                <li><a class="active">2. Контактная информация</a></li>
                <li><span>&rarr;</span></li>
                <li><a>3. Завершение</a></li>
              </ul>
            </div>
            <p>шаг 2 из 3</p>
          </div>
        ';
      break;

      case 'completion':
        echo '
          <div id="block-step">
            <div id="name-step">
              <ul>
                <li><a href="cart.php?action=oneclick">1. Корзина товаров</a></li>
                <li><span>&rarr;</span></li>
                <li><a>2. Контактная информация</a></li>
                <li><span>&rarr;</span></li>
                <li><a class="active">3. Завершение</a></li>
              </ul>
            </div>
            <p>шаг 3 из 3</p>
            <a href="cart.php?action=clear">Очистить</a>
          </div>';
          break;
    }
  ?>
</div>
<center>
  <div id="block-footer">
    <?php 
      include("include/block-footer.php"); 
    ?>
  </div>
</center>
<script>
  var animation_duration = 2000;
 
function showContainer() {
    document.querySelector(".container").classList.add("container_show");
}
 
function hideContainerAndSubmit() {
    document.querySelector(".container").classList.add("container_hide");
    setTimeout("login_container_id.querySelector('form').submit();", animation_duration);
    return true;
}
//second animation

var images  = ['images/puh.gif', 'images/puh3.png'],

    length  = 2,

    index   = 1;

 

setInterval(function() {

    if(index == length) index = 0;

    document.getElementById('img_1').src = images[index];

}, 4000);

</script>
</body>
</html>