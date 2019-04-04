<?php require('bdconf.php'); ?>
<?php
  if($queryTheme = $mysqli->prepare("select id,name,transname,icon from types where parentId = 0 order by name "))
  {
     $queryTheme->execute();
     $queryTheme->store_result();
     $queryTheme->bind_result($typeId,$typeName,$transName,$img);
  }
  else
     print $mysqli->error;
?>
<?php require ('head.php'); ?>
        <title>Фотокаталог изображений для фотообоев в интернет-магазине "Радуга"</title>
        <link rel="canonical" href="http://raduga-oboi.net/catalog/"/>
        <meta name="description" content="Каталог фотообоев, изображения для создания фотообоев"> 
        <meta name="Keywords" content="каталог, изображения по категориям, фотостоки, фото, фотообои, радуга"> 
    </head>
    <body>
        <div class = "container">
            <?php require('sidebar.php'); ?>
            <?php require ('leftmenu.php'); ?>
                <div class = "span9  info">
                    <ul class="breadcrumb">
                        <li><a href="http://raduga-oboi.net">Главная</a></li>
                        <li class="active">Фотокаталог</li>
                    </ul>
                    <h1 class = "header">О каталоге</h1>
                    <p>Изображения в нашем каталоге сгруппированы по категориям. Если вы не нашли подходящий вам вариант, то воспользуйтесь следующими фотостоками, где представлено
                    более 1 млн. изображений : <a href = "http://shutterstock.com">www.shutterstock.com</a> 
                    и <a href = "http://fotolia.com">www.fotolia.com</a>. Мы готовы работать с любыми
                    вариантами фото, которые вы найдете.
                    </p>
                    <p>Изображение может быть напечатано в любом, нужном вам размере. Срок изготовления:
                    2 рабочих дня, оплата при получении</p>
                    <div class = "blank"></div>
                    <ul class = "thumbnails span7 catalog">
                        <?php
                            while ($queryTheme->fetch())
                            {
                                $typeNameUrl = str_replace(' ','%20',$transName);
                                print"\t\t\t\t\t\t<li class = 'span2 text-center'>\n";
                                print"\t\t\t\t\t\t\t<a href = 'http://raduga-oboi.net/catalog/$typeNameUrl/' class = 'thumbnail'>";
                                printf ("<img src = '%s' alt = '%s' class = 'img-polaroid' ><br>", $img,$typeName);
                                if ($queryCount = $mysqli->prepare("select count(*) from catalog where typeId = $typeId"))
                                {
                                    $queryCount->execute();
                                    $queryCount->store_result();
                                    $queryCount->bind_result($num);
                                    $queryCount->fetch();
                                }
                                else
                                    print $mysqli->error;
                                print "</a><br>\n";
                                if (empty($num))
                                    printf("\t\t\t\t\t\t\t<h5>%s</h5>\n", $typeName);
                                else
                                    printf("\t\t\t\t\t\t\t<h5>%s (%d)</h5>\n", $typeName,$num);
                                print "\t\t\t\t\t\t</li>\n";
                            } 
                        ?>      
                    </ul> 
                </div>
             </div>
        </div>
<?php require('footer.php'); ?>