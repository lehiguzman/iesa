// Call the dataTables jQuery plugin
$(document).ready(function() 
{
  $('.dropify').dropify(
  {
    messages: 
    {
            'default': 'Click para seleccionar imagén de perfil de usuario',
            'replace': 'Click para cambiar la imagén de perfil',
            'remove':  'Remover',
            'error':   'Ooops, algo salio mal.'        
    }
  });
  $('#dataTable').DataTable(
      {
        "language": 
        {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }        
      }
    );

  $.ajaxSetup(
  {
    headers: 
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#tipoOferta').change(function(e)
  {       
        e.preventDefault();        
        var tipo = $("select[id=tipoOferta]").val();  
                $.ajax({                    
                    url: '/ajaxOfertas',
                    type: 'POST',
                    data:{tipo:tipo},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);
                        $('#divSelOfertas').replaceWith(data);
                    }                    
                });          
          
  });

  $('#tipoHorario').change(function(e)
  {       
        e.preventDefault();        
        var tipo = $("select[id=tipoHorario]").val();          
                $.ajax({                    
                    url: '/ajaxHorarios',
                    type: 'POST',
                    data:{tipo:tipo},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);
                        $('#divSelHorarios').replaceWith(data);
                    }                    
                });          
          
  }); 

  $('#addAsig').click(function(e)
  {       
        e.preventDefault();        
        var oferta_id = $("input[name=oferta_id]").val();                  
        var user_id = document.getElementById('user_id').value;          
        var aula_id = document.getElementById('aula_id').value;
        var nombre = $("input[name=nombre]").val();                  
        var descripcion = $("textarea[name=descripcion]").val();                   
        var observacion = $("textarea[name=observacion]").val();    
        alert(user_id);
        $.ajax({                    
                    url: '/ajaxMaterias',
                    type: 'POST',
                    data:{nombre:nombre, descripcion:descripcion, observacion:observacion, oferta_id:oferta_id, user_id:user_id, aula_id:aula_id},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);
                        document.getElementById('nombre').value = "";
                        document.getElementById('descripcion').value = "";
                        document.getElementById('observacion').value = "";
                        document.getElementById('user_id').value = "";  
                        document.getElementById('aula_id').value = "";                        
                        $('#gridAsig').replaceWith(data);
                    }                    
                });
        
  });   

  $('#tipoPerIns').change(function(e)
  {          
         e.preventDefault();        
        var tipoPer = $("select[id=tipoPerIns]").val();          
        $.ajax({                    
                    url: '/ajaxInsPeriodo',
                    type: 'POST',
                    data:{tipoPer:tipoPer},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);                        
                        $('#selInsPeriodo').replaceWith(data);
                    }                    
                });       
  });  
});