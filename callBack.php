<?php require ('head.php'); ?>
        <title> Заказать обратный звонок : интернет-магазин фотообоев "Радуга"</title>
        <link rel="canonical" href="http://raduga-oboi.net/call/"/>
    </head>
    <body>
        <div class = "container">
<?php require('sidebar.php'); ?>
<?php require ('leftmenu.php'); ?>
            <div class = "span9 info">
                <ul class="breadcrumb">
                    <li><a href="http://raduga-oboi.net">Главная</a></li>
                    <li class="active">Обратный звонок</li>
                </ul>
                <div id = "formAns" ></div>
                <div class = "media" >
                    <img class = "pull-left" width = "250" src = "http://raduga-oboi.net/image/tel.jpg" alt = "tel.jpg">
                    <div class = "meadia-body">
                        <p>Если Вы хотите связаться с нами по телефону, 
                           но по каким-либо причинам Вам неудобно звонить, 
                           закажите <b>БЕСПЛАТНУЮ</b> услугу <span class = "name">«Обратный звонок»</p> 
                         </p>
                    </div>
                </div>
                <div class = "blank"></div>
                <div>
                    <p>Наш специалист свяжется с вами в течение 2х часов.
                    Услуга <span class = "name">«Обратный звонок»</span> доступна ежедневно с <span class = "name">09:00</span> до <span class = "name">20:00</span> часов по московскому времени</p>
                </div>
                <div class = "blank"></div>
                <form class="form-horizontal" id = "callForm">
                    <fieldset>
                    <legend><h1 class = "header">Заказать обратный звонок</h1></legend>
                    <div class="control-group">
                        <label class="control-label" for="inputName">Имя</label>
                        <div class="controls">
                            <input class = "span4" style = "height: 30px;" type="text" id="inputName">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputTel">Контактный телефон</label>
                        <div class="controls">
                            <input class = "span4" style = "height: 30px;" type="text" id="inputTel">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" class="btn" value  = "Заказать">
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php require('footer.php'); ?>