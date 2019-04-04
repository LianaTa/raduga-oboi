<?php require('bdconf.php'); ?>
<?php
$typeId = array(4,5);
$j = 0;
for ($j=0;$j<count($typeId);$j++)
{
    if ($select = $mysqli->prepare(" select id, img, img_big  from catalog where typeId = $typeId[$j]"))
    {
     $select->execute();
     $select->store_result();
     $select->bind_result($id, $img, $img_big);

    }
    else
     print $mysqli->error;
    

    while ($select->fetch())
    {
        $img = str_replace("/home/v/vvvooo/radula-oboi.net/public_html","http://raduga-oboi.net",$img);
        $img_big = str_replace("/home/v/vvvooo/radula-oboi.net/public_html","http://raduga-oboi.net",$img_big);
        $query = "UPDATE `vvvooo_oboi`.`catalog` SET `img` = '$icon',`img_big` = '$big_im' WHERE `catalog`.`id` = $id;";

        print $query."<br>";
        if (!$mysqli->query($query))
        {

          print $mysqli->error;  
        } 
    
    }
}
?>