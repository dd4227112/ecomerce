<?php include('header_link.php');?>

        <!-- Topbar Start -->
        <?php include('topbar.php');?>
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
           <?php include('categories.php');?>
            <div class="col-lg-9">
               <?php include('header.php');?>
               <!-- PAGE CONTENT -->
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php if(!empty($sliders)){
                            foreach($sliders as $slider){?>
                  
                        <div class="carousel-item <?=$slider->display?>" style="height: 410px;">
                        <img class="img-fluid" src="<?=base_url('web_files/img/'.$slider->image)?>" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3"><?=$slider->name?></h4>
                                    <h6 class=" text-white font-weight-semi-bold mb-4"><?=$slider->description?></h6>
                                    <a href="<?=base_url('Web/product_detail/'.$slider->product_id)?>" class="btn btn-light py-2 px-3">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <?php }
                        }?>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
                <!-- PAGE CONTENT -->
            </div>
        </div>
    </div>
        <!-- Navbar End -->


        <!-- Featured Start -->
        <?php  // include('featured.php');?>
        <!-- Featured End -->

        <!-- Categories Start -->
        <?php // include('categories.php')?>
        <!-- Categories End -->


        <!-- Offer Start -->
        <?php // include('offers.php');?>
        <!-- Offer End -->


        <!-- Products Start -->
        <?php include('products.php');?>
        <!-- Products End -->
    </div>


        <!-- Subscribe Start -->
        <?php // include('subscribe.php');?>
        <!-- Subscribe End -->



        <!-- Vendor Start -->
        <?php // include('vendor.php');?>
        <!-- Vendor End -->


        <!-- Footer Start -->
        <?php include('footer.php');?>
        <!-- Footer End -->



        <!-- JavaScript Libraries -->
        <?php include('footer_link.php');?>
