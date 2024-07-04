$(document).ready(function(){
   
    $("#consultar").on('click',function(){
        
         $.post("userinfo.php", 
            function(data, status){
             
                 $.each(data, function(index, persona) {
                   $('#servidor table').append(
                        "<tr>"+
                             "<td>"+persona.id +"</td>"+
                             "<td>"+persona.usuario+"</td>"+
                             "<td>"+ persona.edad+"</td>"+
                        "</tr>"
                        );
                      });
                    
                  }, 'json') ;
         });
   
    $("#consultarUno").on('click',function(){
       
         $.post("consuta_uno.php", 
            function(data, status){
              var  usuario=$("usuario").val(),
                   clave=$("#lave").val();
                   $.post("envioajax2.php",{"usuario": usuario, "clave": clave}, 
                        function(data, status){
                            alert("dfdfd");
                          // $("#servidor2 p").html(data);
                     });
                
                    
                  }, 'json') ;
         });
    });
  
