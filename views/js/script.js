var main = function()
{
   $("#upload").on('submit',function(e)
                   {
    e.preventDefault();   
       $(this).ajaxSubmit(
       
           {
            beforeSend:function()
               {
                $("#prog").show();
                $("#prog").attr('value','0');
                   
               },
               uploadProgress:function(event,position,total,percentCompelete)
               {
                  $("#prog").attr('value',percentCompelete); 
                   $("#percent").html(percentCompelete+'%');
               },
               success:function(data)
               {
                   $("#here").html(data);
               }
           });
   });
};

$(document).ready(main);

var alerta = function()
{
$('#btnSubmit').click(function () {
            $('#here').show('fade');

            setTimeout(function () {
                $('#here').hide('fade');
            }, 4000);

        });

        $('#linkClose').click(function () {
            $('#here').hide('fade');
        });
};
$(document).ready(alerta);