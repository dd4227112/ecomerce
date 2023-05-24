<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Change Password</h4>
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
                    <form action="changePassword" class="forms-sample" method="POST">
                      <div class="form-group">
                        <label for="exampleInputName1">Current Password</label>
                        <input type="password" class="form-control" name="current" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">New Password </label>
                        <input type="password" name="new" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Confirm Password</label>
                        <input type="password" name = "confirm" required class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Update Password</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<?php include('admin_footer.php');?>