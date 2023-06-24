<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u><?=$header?></u></h4>
                        <a href="#" class="btn btn-sm btn-primary  add_product"> New 
                        </a>
                        <br>
                        <br>
                        <br>
                        <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible text-center">
                <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible text-center">
                <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                        <table class="table table-hover">
                        <thead class="bg-gradient-primary">
                            <tr>
                            <th> # </th>
                            <th> Image </th>
                            <th>Name </th>
                            <th>Gender </th>
                            <th> Email </th>
                            <th> Username </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($users)) {
                                foreach ($users as $key => $user) {?>
                            <tr>
                            <td> <?=$no?> </td>
                            <td class="py-3">
                                <img src="<?=base_url('admin_files/assets/images/'.$user->photo)?>" alt="image" />
                            </td>
                            <td> <?=$user->name?> </td>
                            <td> <?=$user->gender?> </td>
                            <td> <?=$user->email?> </td>
                            <td> <?=$user->username?> </td>
                            <td>  
                                <!-- <a href="#"  id="<?=$user->id?>" class="more_description "title="view more description"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <a href="#"  id="<?=$user->id?>" class="edit_user" title="edit user"><i class="mdi mdi-pen"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- <a href="#" id="<?=$user->id?>" class="add_image "title="add more product  image"><i class="mdi mdi-plus-circle"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <a href="#" id="<?=$user->id?>" class="delete_user "title="delete user"><i class="mdi mdi-delete"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            </td>
                            </tr>
                            <?php 
                            $no++;
                                }
                            }
                            else {
                                echo "<tr><td  colspan ='7' class='text-center'>No data found</td></tr>";}

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

<!-- add user modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
        </div>
        <div class="modal-body">
                    <form class="forms-sample" action="saveUser" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" required class="form-control" id="name" placeholder=" user full name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" required name="email" class="form-control" id="email" placeholder="user's email">
                      </div>
                      <div class="form-group">
                        <label for="description">Gender</label>
                      <select name="gender" id="gender" class="form-control">
                        <option value="">select....</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="username" >Username</label>
                        <input type="text" name="username" required class="form-control" id="username">
                      </div>
                      <div class="form-group">
                        <label for="password" >Password</label>
                        <input type="password" name="password" required class="form-control" id="password">
                      </div>
                      <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="image" required class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Browse</button>
                          </span>
                        </div>
                      </div>
                      <button class="btn btn-gradient-secondary  close">Cancel</button>
                      <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                    
                    </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user modal -->

  <!-- add user modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
        </div>
        <div class="modal-body">
                    <form class="forms-sample" action="editUser" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" name="name" required class="form-control" id="edit_name" placeholder=" user full name">
                      </div>
                      <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="text" required name="email" class="form-control" id="edit_email" placeholder="user's email">
                        <input type="hidden" name="user_id" id="user_id">
                      </div>
                      <div class="form-group">
                        <label for="edit_gender">Gender</label>
                      <select name="gender" id="edit_gender" class="form-control">
                        <option value="">select....</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="edit_username" >Username</label>
                        <input type="text" name="username" required class="form-control" id="edit_username">
                      </div>
                      <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="image"  class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="image" id="edit_photo" required class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Browse</button>
                          </span>
                        </div>
                      </div>
                      <button class="btn btn-gradient-secondary  close_edit">Cancel</button>
                      <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                    
                    </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user modal -->
 
<?php include('admin_footer.php');?>
<script>
$(document).ready(function(){
      $('.add_product').on('click', function(){
        $('#exampleModalCenter').modal("show");
      });

      $('.delete_user').click(function(){
        var id = $(this).attr('id');
        // window.location ="<?=base_url('Admin/deleteProduct')?>/"+id;
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            



            $.ajax({
              url: "<?=base_url('Admin/deleteUser')?>",
              type: 'POST',
              dataType: 'json',
              data:{
                id:id,
              },
              success: function(response) {
                swalWithBootstrapButtons.fire(
                'Deleted!',
                response.message,
                'success',
                ).then(() => {
                location.reload(); // Refresh the current page
                });
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }       
        });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
        });

      $('.edit_user').click(function(){
          var id = $(this).attr('id');
          $.ajax({
              url: "<?=base_url('Admin/getUserByid')?>",
              type: 'POST',
              dataType: 'json',
              data:{
                id:id,
              },
              success: function(response) {
                console.log(response);
                $('#edit_name').val(response.name);
                $('#edit_email').val(response.email);
                $('#edit_username').val(response.username);
                $('#edit_gender').val(response.gender);
                $('#edit_photo').val(response.photo);
                $('#user_id').val(response.id);           
                $('#editUser').modal("show");
              },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }       
        });
      });
});

</script>