<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?=base_url()?>" class="nav-item nav-link ">Shop</a>
                            <a href="<?=base_url('/Web/cart')?>" class="nav-item nav-link">Shopping Cart</a>
                            <a href="<?=base_url('/Web/checkout')?>" class="nav-item nav-link">Checkout</a>

                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="<?=base_url('Web/about')?>" class="nav-item nav-link">About Us</a>
                            <a href="<?=base_url('Web/contact')?>" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php if ($this->session->userdata('customer_id')!=NULL || $this->session->userdata('customer_name')!=NULL) {
                                echo "<a href='#' class='nav-item nav-link'> Welcome <b> ".$this->session->userdata('customer_name')."</b></a>";?>
                            <a href="<?=base_url('Web/Logout')?>" class="nav-item nav-link">Logout</a>
                                
                            <?php } else {?>
                            <a href="" data-toggle="modal" data-target="#exampleModalCenter" class="nav-item nav-link">Login</a>
                            <a href="" id="register_customer" class="nav-item nav-link">Register</a>
                            <?php }?>
                        </div>
                    </div>
                </nav>