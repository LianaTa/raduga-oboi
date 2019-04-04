<?php require ('head.php'); ?>
 <title>Написать сообщение, задать вопрос о покупке обоев в интернет-магазине "Радуга"</title>
 <link rel="canonical" href="http://raduga-oboi.net/write/"/>
</head>
 <body>
   <div class = "container">
    <?php require('sidebar.php'); ?>
    <?php require ('leftmenu.php'); ?>
    <div class = "span9 info">
       <ul class="breadcrumb">
         <li><a href="http://raduga-oboi.net">Главная</a></li>
         <li class="active">Написать письмо</li>
       </ul>
        <div class = "media" >
                    <img class = "pull-left" width = "250" src = "http://raduga-oboi.net/image/Letter.png" alt = "письмо и ручка">
                    <div class = "meadia-body">
                        <p>Здесь Вы можете задать любые вопросы, связанные с покупкой фотообоев.Так же Вы можете присылать нам свои предложения и идеи. Мы с радостью Вам поможем.</p>
                        <p>Наш специалист ответит на ваше письмо в течение 2х часов.</p> 
                    </div>
                </div>
        <div class = "blank"></div>
        
       <div id = "formAns" ></div>
       <form class="form-horizontal" id = "mesForm">
         <fieldset>
         <legend><h1 class = "header">Написать сообщение</h1></legend>
         <div class="control-group">
           <label class="control-label" for="inputName">Имя</label>
           <div class="controls">
             <input class = "span4" style = "height: 30px;" type="text" id="inputName">
           </div>
        </div>
        <div class="control-group">
           <label class="control-label" for="inputEmail">Email</label>
           <div class="controls">
             <input class = "span4" style = "height: 30px;" type="text" id="inputEmail">
           </div>
        </div>
        <div class="control-group">
           <label class="control-label" for="inputTel">Контактный телефон</label>
           <div class="controls">
             <input class = "span4" style = "height: 30px;" type="text" id="inputTel">
           </div>
        </div>
        <div class="control-group">
           <label class="control-label" for="inputInf">Сообщение</label>
           <div class="controls">
             <textarea class = "span4" id="inputInf"  maxlength = "500" rows = "4"></textarea>
           </div>
        </div>
        <div class="control-group">
          <div class="controls">
              <input type="submit" class="btn" value  = "Отправить">
          </div>
        </div>
        </fieldset>
      </form>
   </div>
  </div>
  </div>
<?php require('footer.php'); ?>