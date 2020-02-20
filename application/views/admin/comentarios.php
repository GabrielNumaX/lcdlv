<?php
require_once 'includes/header.php';
 ?> 
  
  <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/js/admin/adminComentarios.js"></script>

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
                 <th width="45%">Comentario</th>
                 <th width="10%">Tipo</th>
                 <th width="10%">Acción</th>
               </thead>
             </table>

           <!-- </div> -->

         </div>

       </div>
     </div>  

   </body>
</html>
