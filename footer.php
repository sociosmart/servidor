
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SMARTGAS 2023</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modales-->

    <div class="modal fade" id="CerrarSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿ESTAS SEGURO?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
         </div>
          <div class="modal-body">Selecciona Cerrar sesion para salir</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">CANCELAR</button>
            <a class="btn btn-primary" href="Salir.php">CERRAR SESION</a>
          </div>
        </div>
      </div>
    </div>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>   
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>  
    <script src="js/sb-admin-datatables.min.js"></script>
    <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>

       <!-- Quitar Alertas automaticamente -->
    <script type="text/javascript">
    $(document).ready(function() {
    setTimeout(function() 
    {
        $(".alertaquitar").fadeOut(1500);

    },3000);
        });
</script>
