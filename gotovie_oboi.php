<?php require ('bdconf.php'); ?>
<?php
  	if($query = $mysqli->prepare("select img, size,  price,  materials.name , comment,artikul from vnalichii, materials where vnalichii.material = materials.id"))
        {
		$query->execute();
                $query->store_result();
                $query->bind_result($imgPath,$size,$price,$material,$comment, $articul);
        }else{
          print $mysqli->error;
        }
?>
<?php require ('head.php'); ?>
	<title>Фотообои в наличии в интернет-магазине "Радуга"</title>
	<link rel="canonical" href="http://raduga-oboi.net/gotovie_oboi/"/>
  	<meta name="description" content="Готовые фотобои в наличии">
  	<meta name="Keywords" content="готовые фотообои,в наличии">
</head>
 <body>
   <div class = "container">
    <?php require('sidebar.php'); ?>
    <?php require ('leftmenu.php'); ?>
    <div class = "span9 info">
       <ul class="breadcrumb">
         <li><a href="http://raduga-oboi.net">Главная</a></li>
         <li class="active">Готовые фотообои</li>
       </ul>
       <div>
        <p>В данном разделе представлены готовые варианты фотообоев.</p>
        <p>Если представленные образцы не подходят Вам по каким-либо причинам, Вы всегда можете изготовить фотообои на заказ.</p>
        <p>Наш <a href = "http://raduga-oboi.net/catalog/" title = "каталог фотообоев">фотокаталог</a> содержит большое количество изображений на различную тематику. Если ни одно из изображений каталога Вам не подошло, 
        то Вы можете прислать нам на <a href = "mailto: info@raduga-oboi.net" title = "написать письмо на почту">почту</a> любое изображение,
        найденное в интернете,которое Вам по душе.</p>
        <p>Интернет-магазин фотообоев "Радуга" предлагает богатый ассортимент <a href = "http://raduga-oboi.net/tekstury-fotooboev/" title = "текстуры для фотообоев">текстур</a> для изготовления фотообоев.</p>
        <p>Мы работаем без предопдаты, срок выполнения заказа - 2 дня.</p>
        <p>Чтобы заказать фотообои в нашем интернет-магазине, просто заполните специальную <a href = "http://raduga-oboi.net/zakaz/" title = "заказать фотообои">форму</a>.</p>
       </div>
       
       <?php
         if ( $query->num_rows > 0){
          while ($query->fetch())
          {
           print  "<div class = 'media oboi_now'>\n";
           printf  (" <img class = 'pull-left' src='%s'  alt = '%s' width = '300'>",$imgPath,$articul);
           print"<div class='media-body'>\n";
           printf("<p>Размер: %s</p>",$size);
           printf("<p>Материал: %s</p>",$material);
           printf("<p>Цена: %s</p>",$price);
           printf("<p>%s</p>",$comment);
           printf("<p>Артикул для заказа: %s</p>",$articul);
           print"</div>";
           print"</div>";
          }
         }else{
             print "<p>К сожалению в данный момент готовые фотообои отсутствуют. Но мы можем изготовить фотообои по вашим пожеланиям и размерам.</p>";
             print "<p>Выбрать подходящее для себя изображение Вы можете в нашем <a href = 'http://raduga-oboi.net/catalog/' title = 'фотокаталог'>каталоге.</a></p>"; 
             print "<p>Оформить заказ Вы можете, позвонив по телефону:  или заполнив специальную <a href = 'http://raduga-oboi.net/zakaz/' title = 'Заказать фотообои'>форму</a></p>";
         }
       ?>
      </div>
     </div>
  </div>
  
<?php require ('footer.php'); ?>