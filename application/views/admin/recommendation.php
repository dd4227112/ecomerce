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
                 <li>Offer discounts or incentives for customers who purchase these products. This can create a sense of value and encourage customers to complete the set.</li>
                 <li>The Retailer should make sure that their quantities are always in the same ratio.Since these products are purchased together</li>
                  <li>They should be arranged together in rack</li>
                 </ol>
                 <?php } ?>
              </div>

                <div class="alert alert-danger alert-dismissible text-center">
                <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                    </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<!-- content -->

<!-- description modal -->
<div class="modal fade" id="productDescription" tabindex="-1" role="dialog" aria-labelledby="productDescription" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body modal-body-description">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gradient-secondary close_decription" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- description modal  -->

<!-- add product modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
        </div>
        <div class="modal-body">
                    <form class="forms-sample" action="saveProduct" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" required class="form-control" id="name" placeholder=" product Name">
                      </div>
                      <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <input type="text" required name="short_description" class="form-control" id="short_description" placeholder="Provide a short description about  pro">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  cols="3" required name="description" class="form-control" id="description" placeholder="full product descrition"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="category_id" >Category</label>
                        <select name="category_id" required class="form-control" id="category_id">
                          <option></option>
                          <?php if (!empty($categories)) {
                         foreach ($categories as $key => $category) {?>
                          <option value="<?=$category->id?>"><?=$category->name?></option>
                          <?php }
                          }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="image" required class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Browse</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="quantity">
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="price">
                      </div>
                      <div class="form-group">
                        <label for="old_price">Old Price</label>
                        <input type="text" name ="old_price" class="form-control" id="old_price" placeholder="old price ">
                      </div>
                      <button class="btn btn-gradient-secondary  close">Cancel</button>
                      <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                    
                    </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add product modal -->
  <!-- Add image modal -->
<div class="modal fade" id="addProductImage" tabindex="-1" role="dialog" aria-labelledby="addProductImage" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Product Image</h5>
        </div>
        <div class="modal-body">
                    <form class="forms-sample" action="addProductImage" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="image" required class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="image" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <input type="hidden" name="product_id" class="product_id">
                          
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Browse</button>
                          </span>
                        </div>
                      </div>

                      <button class="btn btn-gradient-secondary  close-addProductImage">Cancel</button>
                      <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                    
                    </form>
        </div>
      </div>
    </div>
  </div>
<!-- add image modal  -->
<!-- edit product modal -->
<div class="modal fade" id="EditProductModal" tabindex="-1" role="dialog" aria-labelledby="EditProductModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
        </div>
        <div class="modal-body">
                    <form class="forms-sample" action="editProduct" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" required class="form-control" id="product_name" placeholder=" product Name">
                      </div>
                      <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <input type="text" required name="short_description" class="form-control" id="product_short_description" placeholder="Provide a short description about  pro">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  cols="3" required name="description" class="form-control" id="product_description" placeholder="full product descrition"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="category_id" >Category</label>
                        <select name="category_id" required class="form-control" id="category_id">
                          <option></option>
                          <?php if (!empty($categories)) {
                         foreach ($categories as $key => $category) {?>
                          <option value="<?=$category->id?>"><?=$category->name?></option>
                          <?php }
                          }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="image"  class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="image"  class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Browse</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="product_quantity" placeholder="quantity">
                        <input type="hidden" name="product_id" class="product_product_id">

                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="product_price" placeholder="price">
                      </div>
                      <div class="form-group">
                        <label for="old_price">Old Price</label>
                        <input type="text" name ="old_price" class="form-control" id="product_old_price" placeholder="old price ">
                      </div>
                      <button class="btn btn-gradient-secondary  close-EditProductModal">Cancel</button>
                      <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                    
                    </form>
        </div>
      </div>
    </div>
  </div>
  <!-- edit product modal -->
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