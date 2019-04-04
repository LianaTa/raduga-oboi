<?php require('bdconf.php'); ?>
<?php
  if($queryPrice = $mysqli->prepare("SELECT materials.name, price.cena1, price.cena2
                                     FROM materials, price
                                     WHERE materials.id = price.materialId"))
  {
     $queryPrice->execute();
     $queryPrice->store_result();
     $queryPrice->bind_result($material,$price_1,$price_2);
  }
?>
<?php require ('head.php'); ?>
        <title>Прайс-лист на фотообои в интернет-магазине "Радуга"</title>
        <link rel="canonical" href="http://www.raduga-oboi.net/price/"/>
        <meta name="description" content="Прайс-лист на заказ фотообоев">
        <meta name="Keywords" content="прайс-лист, стоимость, цена, материал, обои, антимаркер, шелкография, мазки кисти, лен, песок,штукатурка, имитация фрески, холст, пленка, фотопанели, цветопроба,фотообои, радуга"> 
    </head>
    <body>
        <div class = "container">
            <?php require('sidebar.php'); ?>
            <?php require ('leftmenu.php'); ?>
                    <div class = "span9  info"> 
                    <ul class="breadcrumb">
                        <li><a href="http://raduga-oboi.net">Главная</a></li>
                        <li class="active">Прайс-лист</li>
                    </ul>
                    <h3>Прайс-лист</h3>
                    <table class= "table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Материал</th>
                                <th>Цена м<sup><small>2</small></sup>,руб.</th>
                                <th>Цена при заказе от 10 м<sup><small>2</small></sup>, руб.</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                while ($queryPrice->fetch())
                                {
                                print "\t\t\t\t\t\t\t<tr>\n";
                                printf("\t\t\t\t\t\t\t\t<td>%s</td>\n",$material);
                                if($price_1 == 0)
                                    print "\t\t\t\t\t\t\t\t<td>Бесплатно</td>\n";
                                else 
                                    printf("\t\t\t\t\t\t\t\t<td>%d</td>\n",$price_1);
                                if($price_2 == 0)
                                    print "\t\t\t\t\t\t\t\t<td>Бесплатно</td>\n";
                                else
                                    printf("\t\t\t\t\t\t\t\t<td>%d</td>\n",$price_2);
                                print "\t\t\t\t\t\t\t</tr>\n";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
  <?php
    $queryPrice->close();
    $mysqli->close();
  ?>
<?php require('footer.php'); ?>