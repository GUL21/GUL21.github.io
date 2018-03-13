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
  <div id="opis">
  <h2>Добро пожаловать!</h2>
<p>Для заказа товара Вам надо выполнить следующие действия:</p>
<p><span class="yellow">1. Выбрать товар</span><br><br>
Это можно сделать тремя способами. Найти интересующие Вас позиции в категориях слева. Воспользоваться фильтром по параметрах. Либо в меню "поиск товаров" выбрать из выпадающего списка нужную группу, затем в соседнем поле указать характеристику товара. После этого указать количество единиц товара и щелчком мыши поместить заказ в "корзину". Посмотреть содержимое Вашей корзины можно щелчком левой кнопки мыши на иконке "корзина", расположенной в правой части экрана.</p>
<p><span class="yellow">2. Выбрать форму доставки</span><br><br>
Доставка осуществляется курьером или приходит на указанное отделение "НОВА ПОШТА".</p>
<p><span class="yellow">3. Оформить заказ</span><br><br>
<p>После нажатия кнопки "Далее" откроется страница, на которой Вам необходимо оставить контактную информацию. После нажатия кнопки "Оформить" Вы увидите сообщение о прохождении заказа.</p>
<p>В нашем магазине Вы можете приобрести любое количество товара - для нас "минимальной партии" и "минимальной цены за заказ" не существует. Заказать товар можно в любое удобное для Вас время. Ваш заказ будет подтвержден электронным письмом со счетом и телефонным звонком менеджера в течение рабочего дня.</p>
<p>Для совершения покупки в магазине предварительная регистрация не обязательна, но при дальнейшем обращении наши зарегистрированные покупатели получают скидки.</p>
<h3>Удачных покупок!</h3><br>
<center><img src="images/vinnie.png"></center>
</div>
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