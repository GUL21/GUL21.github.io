<?php
	defined('myeshop') or die('Äîñòóï çàïðåù¸í!');
?>
<!-- Îñíîâíîé âåðõíèé áëîê.  -->
<div id="block-header">
<!-- Âåðõíèé áëîê ñ íàâèãàöèåé -->
<div id="header-top-block">
<!-- Ñïèñîê ñ íàâèãàöèåé -->
<ul id="header-top-menu">
<li>Наш город - <span>Киев</span></li>
<li><a href="o-nas.php">Справка</a></li>
</ul>
<a href="admin/login.php"><img src="images/admin.png" id="admin"></a>


<div id="block-top-auth">

<!-- <div class="corner"></div> -->

<!-- <form method="post">


<ul id="input-email-pass">

<h3>Âõîä</h3>

<p id="message-auth">Íåâåðíûé Ëîãèí è(èëè) Ïàðîëü</p>

<li><center><input type="text" id="auth_login" placeholder="Ëîãèí èëè E-mail" /></center></li>
<li><center><input type="password" id="auth_pass" placeholder="Ïàðîëü" /><span id="button-pass-show-hide" class="pass-show"></span></center></li>

<ul id="list-auth">
<li><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme">Çàïîìíèòü ìåíÿ</label></li>
<li><a id="remindpass" href="#">Çàáûëè ïàðîëü?</a></li>
</ul>




<p align="right" class="auth-loading"><img src="/images/loading.gif" /></p>

</ul>
</form> -->


<!-- <div id="block-remind">
<h3>Âîññòàíîâëåíèå<br /> ïàðîëÿ</h3>
<p id="message-remind" class="message-remind-success" ></p>
<center><input type="text" id="remind-email" placeholder="Âàø E-mail" /></center>
<p align="right" id="button-remind" ><a>Ãîòîâî</a></p>
<p align="right" class="auth-loading" ><img src="/images/loading.gif" /></p>
<p id="prev-auth">Íàçàä</p>
</div> -->



</div>

</div>
<!-- Ëèíèÿ -->
<!-- <div id="top-line"></div> -->

<div id="block-user" >
<!-- <div class="corner2"></div> -->
<!-- <ul>
<li><img src="images/user_info.png" /><a href="profile.php">Ïðîôèëü</a></li>
<li><img src="images/logout.png" /><a id="logout" >Âûõîä</a></li>
</ul> -->
</div>


<!-- Ëîãîòèï -->
<img id="img-logo" src="images/logo.png" />
<!-- Èíôîðìàöèîííûé áëîê -->
<div id="personal-info">
<p align="right">Звонок согласно тарифу вашего оператора</p>
<h3 align="right">(068) 174-76-39</h3>
 <img src="images/phone.png" width="40" height="40" />
<p align="right">Режим работы:</p>
<p align="right">Рабочее время: с 9:00 до 18:00</p>
<p align="right">Суббота, Воскресенье - выходные</p>
 <img src="images/time.png" width="40" height="40"/>
</div>
<!-- Ôîðìà ïîèñêà -->
<div id="block-search">
<form method="GET" action="search.php?q=" >
<span></span>
<img src="images/search.ico"><input type="text" id="input-search" name="q" placeholder="Поиск среди более 100 000 товаров" value="<?php echo $search; ?>" />
<input type="submit" id="button-search" value="Поиск" />
</form>

<ul id="result-search">


</ul>

</div>
</div>
<!-- Ñðåäíÿÿ íàâèãàöèÿ -->
<div id="top-menu">
<ul>
<li><img src="images/shop.png" /><a href="index.php">Главная</a></li>
<li><img src="images/new-32.png" /><a href="view_aystopper.php?go=news">Новинки</a></li>
<li><img src="images/bestprice-32.png" /><a href="view_aystopper.php?go=leaders">Лидеры продаж</a></li>
<li><img src="images/sale-32.png" /><a href="view_aystopper.php?go=sale">Распродажа</a></li>
</ul>
<div id="nav-line"></div>
</div>