<?php
  require ('bdconf.php');
  $category = $_GET['cat'];
  
  if ($selectCat = $mysqli->prepare(" select id,name,path, descript from types where transname =  '$category'"))
  {
     $selectCat->execute();
     $selectCat->store_result();
     $selectCat->bind_result($catNum,$categoryName,$imgPath,$categoryDesc);
     $selectCat->fetch();
  }
  else
     print $mysqli->error;

  if ($selectChild = $mysqli->prepare("select id, name,transname, icon from types where parentId = $catNum "))
  {
    $selectChild->execute();
    $selectChild->store_result();
    $selectChild->bind_result($childId, $childName,$childTransName, $childPic);
  }
  if ($selectCat->num_rows == 0)
  {
    //header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
    header("HTTP/1.1 404 Not Found"); 
    $_SERVER['REDIRECT_STATUS'] = 404;
    include('http://raduga-oboi.net/404.php'); 
  }
  else{
      require ('head.php');
      $canonical = "http://raduga-oboi.net/catalog/".$category."/";

?>
        <title>Изображения фотокаталога в категории <?php print $categoryName;?></title>
        <link rel="canonical" href="<?php print $canonical;?>"/>
        <meta name="description" content="Фотообои на тему : <?php  print $categoryName; ?>">
        <meta name="Keywords" content="фотообои,<?php  print $categoryName; ?> ">
    </head>
    <body>
        <div class = "container">
            <?php require('sidebar.php'); ?>
            <input type = "hidden" id = "imgPath" value = "<?php print $imgPath; ?>" ><br>
            <?php require ('leftmenu.php'); ?>
            <?php
      
             if ($selectChild->num_rows > 0 )
            {   
            
            print "<div class = 'span7 offset2 info'>\n";
            print"\t\t\t\t\t<ul class='breadcrumb'>\n";
            print "\t\t\t\t\t<li><a href='http://raduga-oboi.net'>Главная</a></li>\n"; 
            print "\t\t\t\t\t<li><a href='http://raduga-oboi.net/catalog/'>Фотокаталог</a></li>\n"; 
            print "\t\t\t\t\t<li class='active'>".$categoryName."</li>\n";
            print "\t\t\t\t</ul>\n";


            print "\t\t\t\t<ul class = 'thumbnails span7 catalog' >\n";
    
            while ($selectChild->fetch())
            {   
                $childNameUrl = str_replace(' ','%20',$childTransName);
                print"\t\t\t\t\t<li class = 'span2 text-center'>\n";
                print"\t\t\t\t\t<a href = 'http://raduga-oboi.net/catalog/$childNameUrl/' class = 'thumbnail'>\n";
                printf ("<img src = '%s' alt = '%s' class = 'img-polaroid'><br>\n", $childPic,$childName);
                if ($queryCount = $mysqli->prepare("select count(*) from catalog where typeId = $childId"))
                {
                    $queryCount->execute();
                    $queryCount->store_result();
                    $queryCount->bind_result($num);
                    $queryCount->fetch();
                }
               else
                    print $mysqli->error;
         
                print "</a><br>\n";
                printf("<h5>%s (%d)</h5> ", $childName,$num);
          
             
                print "</li>\n";
            }
            print "</ul>";
        }
        else
        {
          if ($queryParent = $mysqli->prepare("select parentId  from types where id = $catNum"))
          {
             $queryParent->execute();
             $queryParent->store_result();
             $queryParent->bind_result($parentId); 
             $queryParent->fetch();
          }
          else
            print $mysqli->error;
          
          if (!empty($parentId))
          {                
             if ($queryParentName = $mysqli->prepare("select name, transname, descript from types where id = $parentId"))
             {
               $queryParentName->execute();
               $queryParentName->store_result();
               $queryParentName->bind_result($parentCatName, $parentCatTransName, $parentCatDesc);
               $queryParentName->fetch();
             }
             else
               print $mysqli->error;
            $parentCatNameUrl = str_replace(' ','%20',$parentCatTransName);
            print "\n\t\t\t\t<div class = 'span7 offset2 info'  >\n";
            print"\t\t\t\t\t<ul class='breadcrumb'>\n";
            print "\t\t\t\t\t\t<li><a href='http://raduga-oboi.net'>Главная</a></li>\n"; 
            print "\t\t\t\t\t\t<li><a href='http://raduga-oboi.net/catalog/'>Фотокаталог</a></li>\n";
            print "\t\t\t\t\t\t<li><a href='http://raduga-oboi.net/catalog/$parentCatNameUrl/'>".$parentCatName."</a></li>\n"; 
            print "\t\t\t\t\t\t<li class='active'>".$categoryName."</li>\n";
            print "\t\t\t\t\t</ul>\n";
            /*print "<h1 style = 'font-size:14pt;'>".$categoryName."</h1>"; */
         }
         else{
           print "\n\t\t\t\t<div class = 'span7 offset2 info'  >\n";
           print"\t\t\t\t\t<ul class='breadcrumb'>\n";
           print "\t\t\t\t\t\t<li><a href='http://raduga-oboi.net'>Главная</a></li>\n"; 
           print "\t\t\t\t\t\t<li><a href='http://raduga-oboi.net/catalog/'>Фотокаталог</a></li>\n"; 
           print "\t\t\t\t\t\t<li class='active'>".$categoryName."</li>\n";
           print "\t\t\t\t\t</ul>\n";
           print "<h1 style = 'font-size:14pt;'>".$categoryName."</h1>";
         }
            
          print $categoryDesc;
          if ($oboi = $mysqli->prepare("select kod,img,img_big from catalog where typeId = $catNum"))
          {
            $oboi->execute();
            $oboi->store_result();
            $oboi->bind_result($kod,$image,$imageBig);
   
          }
          else
            print $mysqli->error;


          print "\t\t\t\t\t<div class = 'palitra span6'>";
          while ($oboi->fetch())
          {
           print "\t\t\t\t\t\t<a href = '$imageBig'  rel = 'iLoad|$categoryName' title = '$kod'>";
           printf ("<img src = '%s' class = 'img-polaroid' alt = '%s'>",$image,$kod);
           print "</a>\n";
       
          }
          print "\t\t\t\t\t</div>";
       }
?>
                <script type='text/javascript' src='/js/iLoad/iLoad.js'></script>
                </div>  
            </div> 
        </div>  
    <?php require 'footer.php'; }?>