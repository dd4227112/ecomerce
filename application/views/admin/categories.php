<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u>Product's Categories</u></h4>
                        <a href="#" id="addNew" class="btn btn-sm btn-primary"> New 
                        </a>
                        <br>
                        <br>
                        <br>
                        <table class="table  table-hover">
                        <thead>
                            <tr class="bg-gradient-primary">
                            <th> # </th>
                            <th>Name </th>
                            <th> Number of Product </th>
                            <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($categories)) {
                                foreach ($categories as $key => $category) {
                                $number_of_product = $this->db->query("select count(*) as count from products where category_id=".$category->id)->row()->count;?>
                            <tr>
                            <td> <?=$no?> </td>
                            <td> <?=$category->name?> </td>
                            <td> <?=$number_of_product ?></td>
                            <td>  
                                <a href="#" id="<?=$category->id?>" class="view_products" title="view products in this category"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" id="<?=$category->id?>" class="editCategory" title="edit category"><i class="mdi mdi-pen"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" id="<?=$category->id?>" class="delete_category" title="delete category"><i class="mdi mdi-delete"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            </td>
                            </tr>
                            <?php 
                            $no++;
                                }
                            }
                            else {
                                
                                echo "<tr><td  colspan ='4' class='text-center'>No data found</td></tr>";}

                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<!-- content -->
<!-- Add modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add New Category</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" action="<?=base_url('Admin/addCategory')?>" method="POST">
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                          <input type="text"name ="name"  required class="form-control" id="name" placeholder="category name ">
                        </div>
                      </div>
                      <button type="button"  class="btn btn-secondary close" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary align-right">Save</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add modal -->

<!-- Edit modal -->
<div class="modal fade" id="EditCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" action="<?=base_url('Admin/editCategory')?>" method="POST">
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                          <input type="text" name ="name"  required class="form-control" id="category_name" placeholder="category name ">
                          <input type="hidden" name ="id" id="category_id">
                        </div>
                      </div>
                      <button type="button"  class="btn btn-secondary close_edit_modal" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary align-right">Save</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Edit modal -->

<?php include('admin_footer.php');?>
<script>
    $(document).ready(function(){
        $('#addNew').click(function(){
        $('#exampleModalCenter').modal("show");
        });
        $('.view_products').click(function(){
        var id = $(this).attr('id');
        window.location ="<?=base_url('Admin/getProductByCategory')?>/"+id;
        });
        $('.editCategory').click(function(){
          var id = $(this).attr('id');
          $.ajax({
              url: "<?=base_url('Admin/getCategoryById')?>",
              type: 'POST',
              dataType: 'json',
              data:{
                  category:id,
              },
              success: function(response) {
                console.log(response);
                $('#category_id').val(response.id);
                $('#category_name').val(response.name);
                $('#EditCategoryModal').modal("show");
              },
              error: function(xhr, status, error) {
              console.log(xhr.responseText);
              }
          });
      });
      $('.delete_category').click(function(){
        var id = $(this).attr('id');
        window.location ="<?=base_url('Admin/deleteCategory')?>/"+id;
        });
    });
  
</script>
