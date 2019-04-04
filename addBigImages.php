<?php require ('bdconf.php');?>
<?php                                           
  $catalogs = array("fartuki");
  $key = array(".","..");
  $typeId = array(52);
  $j = 0;
  for ($j=0;$j<count($catalogs);$j++)
  {
    $dir_img_big  = '/home/v/vvvooo/radula-oboi.net/public_html/image/'.$catalogs[$j].'/';
    $dir_img  = '/home/v/vvvooo/radula-oboi.net/public_html/image/'.$catalogs[$j].'Icon/';
   
    $files = scandir($dir_img);
    $iconList = array();
    foreach ($files as $file){
      if (($file != $key[0])&&($file!= $key[1]))
        $iconList[] = $file;
    } 
    print_r ($iconList);
    $numb = count($iconList);
    for ($i=0;$i<$numb;$i++)
    {

         $dir_img = str_replace("/home/v/vvvooo/radula-oboi.net/public_html","http://raduga-oboi.net",$dir_img);
         $icon = $dir_img.$iconList[$i];
         print $icon."<br>";
         $big_im = str_replace("phoca_thumb_m_","",$iconList[$i]);
         $kod = explode(".",$big_im);
         $dir_img_big = str_replace("/home/v/vvvooo/radula-oboi.net/public_html","http://raduga-oboi.net",$dir_img_big);
         $big_im = $dir_img_big.$big_im;

     $query = " INSERT INTO `vvvooo_oboi`.`catalog` (`id` ,`kod` ,`typeId` ,`img` ,`img_big`) VALUES ('', '$kod[0]',$typeId[$j], '$icon', '$big_im')";
     print $query."<br>";
     if (!$mysqli->query($query))
     {
        print $mysqli->error;  
     } 
     else{
        print "Данные успешно добавлены!";
     } 
  }
 }
  
?>
