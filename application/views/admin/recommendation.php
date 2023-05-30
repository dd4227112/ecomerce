<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u>Recommendations</u></h4>
                        <br>
                        <br>
                <div class="alert alert-success alert-dismissible"><b>The following products are frequently purchased together by the customer.</b>
                  <?php
                  if(!empty($most_sold_together)){
                     foreach ($most_sold_together as $value) {?>
                    <li><?=$value->name?></li>
              
                 <?php }?>
                 Therefore, we recommend the following;
                 <ol>
                  <li>Create marketing materials, such as banners or email campaigns, that emphasize the benefits of purchasing these products together and any cost savings they can gain from doing so</li>
                 <li>Offer discounts on products which are not frequently purchase to encourage customers to purchase these products. You can click <a class="text-primary" href="<?=base_url('Admin/discount')?>">here<a> to create a discount.</li>
                 <li>The Retailer should make sure that their quantities are always in the same ratio.Since these products are purchased together</li>
                  <li>They should be arranged together in rack</li>
                 </ol>
                 <?php } ?>
              </div>

                <div class="alert alert-danger alert-dismissible"><br>The following  are rarely sold products .
                <?php
                  if(!empty($sold_separated)){
                     foreach ($sold_separated as $value) {?>
                    <li><?=$value->name?></li>
              
                 <?php }?>
                 Therefore, we advice you to offer discount to emphasize purchase of this products.</br>
                 Click <a class="text-primary" href="<?=base_url('Admin/discount')?>">here<a> to create a discount.</li>
                 <?php } ?>
                </div>
                    </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<!-- content -->
<?php include('admin_footer.php');?>
<script>
$(document).ready(function(){
    $('.more_description').click(function(){
          var id = $(this).attr('id');
          $.ajax({
              url: "<?=base_url('Admin/getProductByid')?>",
              type: 'POST',
              dataType: 'json',
              data:{
                product_id:id,
              },
              success: function(response) {
                console.log(response);
                $('.modal-body-description').html(response.description);
                $('#productDescription').modal("show");
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }       
        });
      });

      $('.add_product').on('click', function(){
        $('#exampleModalCenter').modal("show");
      });

      $('.delete_product').click(function(){
        var id = $(this).attr('id');
        window.location ="<?=base_url('Admin/deleteProduct')?>/"+id;
        });

        $('.add_image').on('click', function(){
          var product_id =$(this).attr("id");
          $('.product_id').val(product_id);
        $('#addProductImage').modal("show");
      });

      $('.edit_product').click(function(){
          var id = $(this).attr('id');
          $.ajax({
              url: "<?=base_url('Admin/getProductByid')?>",
              type: 'POST',
              dataType: 'json',
              data:{
                product_id:id,
              },
              success: function(response) {
                console.log(response);
                $('#product_name').val(response.name);
                $('#product_short_description').val(response.short_description);
                $('#product_description').val(response.description);
                $('#product_quantity').val(response.quantity);
                $('#product_price').val(response.price);
                $('#product_old_price').val(response.old_price);
                $('.product_product_id').val(response.id);                
                $('#EditProductModal').modal("show");
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }       
        });
      });
});

</script>