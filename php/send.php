<?php
 $email = "info@raduga-oboi.net";
 

 $name =   $_REQUEST['name'];
 $mail =   $_REQUEST['mail'];
 $tel  =   $_REQUEST['tel'];
 $kod  =   $_REQUEST['kod'];
 $material = htmlspecialchars ($_REQUEST['material']);
 $height = $_REQUEST['height'];
 $width =  $_REQUEST['width'];
 $num =    $_REQUEST['num'];
 $inf =    $_REQUEST['inf'];

 $err="";


if (!empty($mail))
{ 
    
   if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i",$mail)){
     $err.="Введен некорректный адрес электронной почты<br>";
   }
}
else{
   print "<script type='text/javascript'>window.alert('Введите ваш адрес электронной почты'); </script>\n";
   $err.="<p>Введите ваш адрес электронной почты!</p>";
}


if (empty($kod))
 {
   $err.="<p>Выберите пожалуйста изображение, которое хотите заказать</p>";
 }
 
 

if (empty($err))
 {
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "Date: ".date("Y-m-d (H:i:s)",time())."\r\n";
    $headers .= "From: <".$mail.">\r\n";
   
    $subject = "Заказ на фотообои";
    
    $mes = " <div style = 'font-family: Times New Roman ; font-size: 12pt'>
                <p><b>Имя:</b>$name</p>
                <p>Код изображения:</b>$kod</p>
                <h4><b>Рамер изображения<b></h4>
                <p><b>Высота,см:</b>$height</p>
                <p><b>Ширина,см:</b>$width</p>
                <p><b>Материал для изготовления:</b>$material</p>
                <p><b>Количество копий</b>$num</p>
                <p><b>Дополнительная информация:</b><p>$inf</p></p>
                <p><b>Контактный телефон:</b>$tel</p>
            </div>";  

   /* $mes = " <div><b>Имя:</b>$name</div>
             <div><b>Код изображения:</b>$kod</div>
             <h4><b>Рамер изображения<b></h4>
             <div><b>Высота,см:</b>$height</div>
             <div><b>Ширина,см:</b>$width</div>
             <div><b>Материал для изготовления:</b>$material</div>
             <div><b>Количество копий</b>$num</div>
             <div><b>Дополнительная информация:</b><p>$inf</p></div>
             <div><b>Контактный телефон:</b>$tel</div>"; */ 
    
   


    if(mail($email,$subject,$mes,$headers)){
      print "<script type='text/javascript'>$('#formAns').addClass('alert alert-success');</script>\n";
      print "<p>Сообщение успешно отправлено</p>";}
    else { print "<script type='text/javascript'>$('#formAns').addClass('alert alert-error');</script>\n
                  <p>Ошибка связи с сервером, повторите попытку позднее</p>"; }
 } 
 else{
       print "<script type='text/javascript'>$('#formAns').addClass('alert alert-error');</script>\n";
       print "<p>$err</p>\n";
 }
              
?>
