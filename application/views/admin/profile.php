<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Profile</h4>
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
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form action="saveProfileInfo" class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" value=" <?=$user->name?>" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control">
                            
                          <option <?=$user->gender=='Male'?'selected':''?> >Male</option>
                          <option <?=$user->gender=='Female'?'selected':''?>> Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email </label>
                        <input type="email" name="email" class="form-control" value="<?=$user->email?> " id="exampleInputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Username</label>
                        <input type="text" name = "username" value="<?=$user->username?>" required class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" name="photo" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="photo" value="<?=$user->photo?>" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<?php include('admin_footer.php');?>