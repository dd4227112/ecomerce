<div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark show_link" href="">Support</a>
                    <div class ="link_hidden">
                    <span class="text-muted px-2">|</span>
                    <a href="<?=base_url('/Admin/index')?>" class="text-dark link_hidden" href="">Admin</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
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
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="<?=base_url()?>" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold "><img style="width: 80px;height: 80px;" src= "<?=base_url('web_files/img/ecommerce.png')?>"></span>E-commerce</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form id="search" action="<?=base_url('/Web/Search')?>" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" required = "required" name="search" placeholder="Type product's name then press enter">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary searchProduct">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="<?=base_url('/Web/cart')?>" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span  class="badge" id="cartCount">1</span>
                </a>
            </div>
        </div>
    </div>