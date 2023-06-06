<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Shopping and Product Analysis</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=base_url('admin_files/assets/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('admin_files/assets/vendors/css/vendor.bundle.base.css')?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=base_url('admin_files/assets/css/style.css')?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=base_url('web_files/img/ecommerce.png')?>"/>
    <link rel="stylesheet" href="<?=base_url('DataTables/css/jquery.dataTables.css')?>">
    <script src="<?php echo base_url('web_files/swal/sweetalert2.all.min.js')?>"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?=base_url('admin_files/assets/images/'.$this->session->userdata('photo'))?>" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?=$this->session->userdata('name')?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="<?=base_url('/Admin/profile')?>">
                  <i class="mdi mdi-cached me-2 text-success"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=base_url('/Admin/logout')?>">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="<?=base_url('/Admin/logout')?>">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?=base_url('admin_files/assets/images/ecommerce.svg')?>" alt="profile">
                </div>
               
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"> E-Commerce Shopping</span>
                  <span class="font-weight-bold mb-2"> & Product Analysis</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('/Admin/dashboard')?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Website Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-web menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('Admin/product')?>"> Products</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('Admin/categories')?>">Categories</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('Admin/sliders')?>">Sliders</a></li>
                  <li class="nav-item"> <a class="nav-link" target="_blank" href="<?=base_url()?>">Preview Website</a></li>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('Admin/orders')?>">
                <span class="menu-title">Customer Orders</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('Admin/orderPayments')?>">
                <span class="menu-title">Order Payments</span>
                <i class="mdi mdi-currency-usd menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#analysis-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title"> Products Analysis</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
              <div class="collapse" id="analysis-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('Admin/algorithmSetup')?>">  Algorithm Setup </a></li>
                  <?php if (!empty($this->db->get('setups')->result())){?>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('Admin/Association')?>"> Product Association </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('Admin/Recommendation')?>"> Auto Recommendation </a></li>
                  <?php }?>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('Admin/manageUser')?>">
                <span class="menu-title">Manage Users</span>
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#account-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title"> User Account</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
              <div class="collapse" id="account-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('/Admin/profile')?>"> Profile </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('/Admin/changePassword')?>"> Change Password </a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?=base_url('/Admin/logout')?>"> Signout </a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
