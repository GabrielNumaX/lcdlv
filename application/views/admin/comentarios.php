<?php
require_once 'includes/header.php';
 ?>

     <div class="div-inicio">
       <div class="div-btn">
        
        <a href="<?=base_url('admin/inicio')?>" class="link">Fotos</a>
        <a href="<?=base_url('admin/video')?>" class="link">Videos</a>
        <a href="<?=base_url('admin/nota')?>" class="link">Notas</a>
         
       </div>

       <div class="div-btn-and-tabla">

         <div class="div-btn-modal">
           <h2>Comentarios</h2>

         </div>


         <div class="div-tabla">

           <!-- <div class="table-responsive"> -->
             <table id="comentarios_tabla" class="table table-striped table-bordered" width="100%" >
               <thead>
                 <th width="5%">ID</th>
                 <th width="20%">Fecha</th>
                 <th width="30%">Comentario</th>
                 <th width="10%">Tipo</th>
                 <th width="15%">Acción</th>
               </thead>
             </table>

           <!-- </div> -->

         </div>

       </div>
     </div>

   </body>

   <script>
   var table;
   //var save_method;
   jQuery(document).ready(function($){ //funcion para crear datatables
       table = $('#comentarios_tabla').DataTable({
           "ajax": {
               url : '<?= base_url('Comentarios/ajax_listado')?>',
               type : 'GET'
           },
           language: {
               "sProcessing":     "Procesando...",
               "sLengthMenu":     "Mostrar _MENU_ registros",
               "sZeroRecords":    "No se encontraron resultados",
               "sEmptyTable":     "Ningún dato disponible en esta tabla",
               "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
               "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
               "sInfoPostFix":    "",
               "sSearch":         "Buscar:",
               "sUrl":            "",
               "sInfoThousands":  ",",
               "sLoadingRecords": "Cargando...",
               "oPaginate": {
                   "sFirst":    "Primero",
                   "sLast":     "Último",
                   "sNext":     "Siguiente",
                   "sPrevious": "Anterior"
               },
               "oAria": {
                   "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                   "sSortDescending": ": Activar para ordenar la columna de manera descendente"
               }
           }
       });
   });
   function borrar_coment(id){
     $.ajax({
       type:'POST',
       url: '<?=base_url('Comentarios/borrar_coment/')?>'+id,
       success:function(){
         table.ajax.reload();
       },
       error:function(){
         alert('Ha ocurrido un error');
       },
     });
   }

   </script>
</html>
