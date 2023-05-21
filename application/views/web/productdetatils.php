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
                    <div class="container-fluid bg-secondary mb-5">
                        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
                            <h1 class="font-weight-semi-bold text-uppercase mb-3"><?=$product->name?></h1>
                            <div class="d-inline-flex">
                                <p class="m-0"><a href=""></a></p>
                                <p class="m-0 px-2">Home -</p>
                                <p class="m-0">Product Details</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
            <!--Product Detail Start -->
            
    <div class="container-fluid py-4">
        <div class="row px-xl-4">
                    
            <div class="col-lg-4 pb-4">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-50 h-50" src="<?=base_url('web_files/img/'.$product->image)?>" alt="Image">
                        </div>
                        <?php if(!empty($images)){?>
                        <?php foreach ($images as $key => $image) {?>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="<?=base_url('web_files/img/'.$image->name)?>" alt="Image">
                        </div>
                        <?php }
                         } ?>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
       
            <div class="col-lg-8 pb-8">
                <h3 class="font-weight-semi-bold"><?=$product->name?></h3>
                <h3 class="font-weight-semi-bold mb-4">TZS <?=$product->price?></h3>
                <p class="mb-4"><?=$product->short_description?></p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center"name="quantity" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3 add_to_cart"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (<?=$total_reviews->reviews?>)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p><?=$product->description?></p>
                    </div>

                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4"><?=$total_reviews->reviews?> review(s) for "<?=$product->name?>"</h4>
                                <div class="media mb-4">
                                <div class="row">
                                    
                                    <?php if (!empty($reviews)) {
                                        foreach($reviews as $review)
                                        {?>
                                        
                                            <div class="col-12">                                  
                                                <img src="<?=base_url('web_files/img/user.jpg')?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                                <div class="media-body">
                                                    <h6><?=$review->name?><small> - <i><?=$review->date?></i></small></h6>
                                                    <p><?=$review->content?></p>
                                                </div>
                                            </div>
                                         <hr>
                                    <?php }
                                    }?>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <form action="<?=base_url('/Web/saveReview')?>" method="post">
                                    <input type="hidden" name="product_id" value="<?=$product->id?>">
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" required name="content" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" name="name" required class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" name="email" required class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Detail End -->



        <!-- Products Start -->
        <?php include('products.php');?>
        <!-- Products End -->


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
