$(document).ready(function(){
  $("#orderForm").submit(function(){
       $.ajax({
               type:"POST",
               url: "http://raduga-oboi.net/php/send.php",
               data:{
                     
                     "name":     $('#inputName').val(),
                     "tel":      $('#inputTel').val(),
                     "mail":     $('#inputEmail').val(),
                     "kod":      $('#inputKod').val(),
                     "material": $('#select').val(),
                     "height":   $('#inputHeight').val(),
                     "width":    $('#inputWidth').val(),
                     "num":      $('#inputNum').val(),
                     "inf":      $('#inputInf').val()
                    },  
                success: function(html){
                    $("#formAns").html(html);
                    document.getElementById('orderForm').reset();
                   }
              });
            return false;
          });

  $("#mesForm").submit(function(){
      $.ajax({
               type:"POST",
               url: "http://raduga-oboi.net/php/sendMes.php",
               data:{
                     
                     "name": $("#inputName").val(),
                     "tel":  $("#inputTel").val(),
                     "mail": $("#inputEmail").val(),
                     "inf":  $("#inputInf").val()
                    },  
                success: function(html){
                    $("#formAns").html(html);
                    document.getElementById('mesForm').reset();
                   }
              });
            return false;

 

  });
  $("#callForm").submit(function(){
      $.ajax({
               type:"POST",
               url: "http://raduga-oboi.net/php/sendCall.php",
               data:{
                     
                     "name": $("#inputName").val(),
                     "tel":  $("#inputTel").val()
                    },  
                success: function(html){
                    $("#formAns").html(html);
                    document.getElementById('callForm').reset();
                   }
              });
            return false;

 

  });
  jQuery(function($){
        $("#inputTel").mask("(999) 999-99-99");
  });
     
});


