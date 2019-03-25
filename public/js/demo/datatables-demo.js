// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('.dropify').dropify(
  {
  	messages: {
            'default': 'Click para seleccionar imagén de perfil de usuario',
            'replace': 'Click para cambiar la imagén de perfil',
            'remove':  'Remover',
            'error':   'Ooops, algo salio mal.'        
    }
  });
  $('#dataTable').DataTable(
  		{
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }        
    }
  	);

});
