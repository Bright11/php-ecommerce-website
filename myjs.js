$(document).ready(function(){
     // getdata();
    $('.myform').click(function(e){
      e.preventDefault();
      $.ajax({
        type:"POST",
        url:"actions/action.php",
        data:$(this).serialize(),
        success:function(response){
          if(jQuery.trim(response) == 'ok'){
      toastr.success('Successfully Added into your cart','success',{timeOut:2000});
   //$('#myform').trigger('reset');
   getdata();
          }else{
             toastr.error('Item already added into cart','Error',{timeOut:2000});
          }
        },
        error:function(){
          toastr.error('There is an error','Error',{timeOut:2000});
        }
      });
      getdata();
      function getdata(){
      $.ajax({
        url:'actions/count.php',
        success:function(response){
          $('#getdata').html(response);
        },
        error:function(){
          toastr.error('There is an error','Error',{timeOut:2000});
        }


      });
      }
     //return false;
    });
    });
