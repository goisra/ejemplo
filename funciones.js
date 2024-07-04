$(document).ready(function(){
   
     $("#consultar").on('click',function(){
         
          $.post("userinfo.php", 
             function(data, status){
               $('#content').html('');
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
          var  usuario=$("#usuario").val(),
               clave=$("#clave").val();
                $.post("consulta_uno.php",{
                    "usuario_uno": usuario, 
                    "clave_uno": clave
               }, 
                function(data, status){
                    if (status === "success") {
                              if (data.error) {
                                  $("#servidor2 p").html("Error: " + data.error);
                              } else {
                                  $("#servidor2 p").html
                                  ("ID: " +  data.id+
                                   ", Usuario: " + data.usuario +
                                    ", Edad: " + data.edad );
                              }
                          } else {
                              alert("Error en la solicitud: " + status);
                          }               
                   }, 'json') ;
          });
     
     $("#registrar").on('click',function(){
          var  usuario=$("#usuarioi").val(),
               clave=$("#clavei").val(),
               edad=$("#edadi").val(),
               tipo=$("#tipoi").val();
                $.post("insertar.php",{
                    "usuario": usuario, 
                    "clave": clave,
                    "edad":edad,
                    "tipo":tipo
               }, 
                function(data, status){
                    
                    if (status === "success") {
                              if (data.error) {
                                  $("#servidor3 p").html("Error: " + data.error);
                              } else {
                                  $("#servidor3 p").html
                                  (data.exito);
                              }
                          } else {
                              alert("Error en la solicitud: " + status);
                          }               
                   }, 'json') ;
          });
          $("#eliminar").on('click',function(){
               var  usuario=$("#usuariob").val(),
                    clave=$("#claveb").val();
                     $.post("borrar.php",{
                         "usuariob": usuario, 
                         "claveb": clave
                    }, 
                     function(data, status){
                         if (status === "success") {
                                   if (data.error) {
                                       $("#servidor4 p").html("Error: " + data.error);
                                   } else {
                                        $("#servidor4 p").html
                                        (data.exito);
                                   }
                               } else {
                                   alert("Error en la solicitud: " + status);
                               }               
                        }, 'json') ;
               });
               $("#actualizar").on('click',function(){
                    var  usuario=$("#usuarioa").val(),
                         clave=$("#clavea").val(),
                         clavenueva=$("#clavenueva").val();
                          $.post("actualizar.php",{
                              "usuarioa": usuario, 
                              "clavea": clave,
                              "clavenueva":clavenueva
                         }, 
                         function(data, status){
                              if (status === "success") {
                                        if (data.error) {
                                            $("#servidor5 p").html("Error: " + data.error);
                                        } else {
                                             $("#servidor5 p").html
                                             (data.exito);
                                        }
                                    } else {
                                        alert("Error en la solicitud: " + status);
                                    }               
                             }, 'json') ;
                    });
     });
   
     