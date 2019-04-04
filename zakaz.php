<?php require('bdconf.php');?>
<?php
   if ($types = $mysqli->prepare("select name from materials"))
   {
       $types->execute();
       $types->store_result();
       $types->bind_result($mat);
   }
   else
       print $mysqli->error;
?>
<?php require ('head.php'); ?>
  <title>Заказать фотообои</title>
  <link rel="canonical" href="http://raduga-oboi.net/zakaz/"/>
  <meta name="description" content="Заказать фотобои">
  <meta name="Keywords" content="оформление заказа,фотообои,материал, изображение">
</head>
 <body>
   <div class = "container">
    <?php require('sidebar.php'); ?>
    <?php require ('leftmenu.php'); ?>
    <div class = "span9 info">
       <ul class="breadcrumb">
         <li><a href="index.php">Главная</a></li>
         <li class="active">Сделать заказ</li>
       </ul>
       <div id = "formAns" ></div>
       <div class = "media" >
          <img class = "pull-left" width = "250" src = "http://raduga-oboi.net/image/rulon.jpg" alt = "Обои" style = "margin-right:20px;">
          <div class = "meadia-body">
            <h3>Как заказать фотообои?</h3>
            <ul>
		<li>Выберите изображение в нашем <a href = "http://raduga-oboi.net/catalog/" title = "фотокаталог" target = "_blank" >фотокаталоге</a></li>
                <li>Определитесь с нужными Вам размерами</li>
                <li>Выберите <a href = "http://raduga-oboi.net/material/" title = "материалы" target = "_blank">материал</a> для изготовления</li>
            </ul>
            <p>Теперь Вы можете оформить заказ, заполнив форму, указанную ниже.Наш интернет магазин позволяет также заказать фотообои через интернет в свободной форме, написав нам на <a href = "mailto:info@raduga-oboi.net" title = "info@raduga-oboi.net">электронную почту</a>  или позвонив по телефону в СПб: (812) - 953-36-97</p>
          </div>
       </div>
       <div class = "blank"></div>
       <form class="form-horizontal" id = "orderForm">
         <fieldset>
         <legend>Форма заказа</legend>
         <div class="control-group">
           <label class="control-label" for="inputName">ФИО</label>
           <div class="controls">
             <input class = "span4" style = "height: 30px;" type="text" id="inputName">
           </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputTel">Контактный телефон</label>
          <div class="controls">
            <input  class = "span4" style = "height: 30px;" type="text" id="inputTel">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input  class = "span4"  style = "height: 30px;" type="text" id="inputEmail">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputKod">Код изображения</label>
          <div class="controls">
            <input  class = "span4" style = "height: 30px;" type="text" id="inputKod">
            <span class="help-block">Код указан под каждым изображением в каталоге</span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputMat">Материал</label>
          <div class="controls">
            <select class = "span4" style = "height: 30px;" id="select">
            <?php
             while($types->fetch())
             {
               print "<option value = '$mat'>$mat</option>\n";
             }              
            ?>
            </select>           
          </div>
        </div>
        <p>Желаемый размер фотообоев (указывается в см)</p>
        <div class="control-group">
          <label class="control-label" for="inputHeight">Высота</label>
          <div class="controls">
            <input  class = "span2" style = "height: 30px;" type="text" id="inputHeight">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputWidth">Ширина</label>
          <div class="controls">
            <input  class = "span2" style = "height: 30px;" type="text" id="inputWidth">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputNum">Количество изделий</label>
          <div class="controls">
            <input  class = "span2" style = "height: 30px;" type="text" id="inputNum">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputInf">Дополнительная информация</label>
          <div class="controls">
            <textarea class = "span4" id="inputInf" maxlength="500" rows="4"></textarea>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
              <input type="submit" class="btn" value  = "Оформить заказ">
          </div>
        </div>
        </fieldset>
      </form>
      <p>Срок изготовления заказа - 3 рабочих дня. Оплата производится при получении.</p>
    </div>
   </div>
   </div>
<?php require('footer.php'); ?>