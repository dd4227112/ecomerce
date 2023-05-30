
        <!-- main-panel ends -->
    </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url('admin_files/assets/vendors/js/vendor.bundle.base.js')?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?=base_url('admin_files/assets/vendors/chart.js/Chart.min.js')?>"></script>
    <script src="<?=base_url('admin_files/assets/js/jquery.cookie.js" type="text/javascript')?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url('admin_files/assets/js/off-canvas.js')?>"></script>
    <script src="<?=base_url('admin_files/assets/js/hoverable-collapse.js')?>"></script>
    <script src="<?=base_url('admin_files/assets/js/misc.js')?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?=base_url('admin_files/assets/js/todolist.js')?>"></script>
    <!-- End custom js for this page -->
    <!-- file upload js -->
    <script src="<?=base_url('admin_files/assets/js/file-upload.js')?>"></script>
    <script src="<?=base_url('DataTables/js/jquery.dataTables.js')?>"></script>

  </body>
</html>
<script>
  $(document).ready(function(){
  
      $('.close').click(function(){
        $('#exampleModalCenter').modal("hide");
      });

      $('.close_edit_modal').click(function(){
        $('#EditCategoryModal').modal("hide");
      });

      $('.close_decription').click(function(){
        $('#productDescription').modal("hide");
      });

      $('.close-addProductImage').click(function(){
        $('#addProductImage').modal("hide");
      });

      $('.close-EditProductModal').click(function(e){
        e.preventDefault();
        $('#EditProductModal').modal("hide");
      });

      $('.close-viewShippingAddress').click(function(e){
        $('#viewShippingAddress').modal("hide");
      });
      
      $('.close-viewOrderItems').click(function(e){
        e.preventDefault();
        $('#viewOrderItems').modal("hide");
      });

      $('.close-addPaymentModal').click(function(e){
        e.preventDefault();
        $('#addPaymentModal').modal("hide");
      });

      $('.close-viewPaymentHistory').click(function(e){
        e.preventDefault();
        $('#viewPaymentHistory').modal("hide");
      });
      
  });
</script>
