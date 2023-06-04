<?php include('header_link.php');?>
        <!-- Topbar Start -->
        <?php  include('topbar.php');?>
        <!-- Topbar End -->

 <!-- Navbar Start -->
 <div class="container-fluid mb-5">
            <div class="row border-top px-xl-5">
                <?php include('categories.php');?>
                <div class="col-lg-9">
                    <?php include('header.php');?>
                    <div class="container-fluid bg-secondary mb-5">
                        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
                            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
                            <div class="d-inline-flex">
                            <p class="m-0"><a href="<?=base_url()?>">Home</a></p>
                            <p class="m-0 px-2">-</p>
                            <p class="m-0">Checkout</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->


    <!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form id = "customerOrder" action="<?=base_url('/Web/saveOrder')?>" method="post">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" value="<?=!empty($customer)?$customer->name:''?>" name="customer_name" type="text" placeholder="John Bocco">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" value="<?=!empty($customer)?$customer->email:''?>"  name="customer_email" type="email" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" value="<?=!empty($customer)?$customer->mobile:''?>"   name="customer_mobile" type="text" placeholder="+255 7456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" value="<?=!empty($customer)?$customer->address:''?>"  name="customer_address"  type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="customer_country" >
                                <option value="Tanzania" selected>Tanzania</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Rwanda">Rwanda</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" value="<?=!empty($customer)?$customer->city:''?>"  name="customer_city"  type="text" placeholder="Dar Es Salaam">
                        </div>
                        <?php if (empty($customer)) {?>
                        <div class="col-md-6 form-group">
                            <label>Username</label>
                            <input class="form-control"  name="customer_username" type="text" placeholder="john_bocco">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input class="form-control" name="customer_password"  type="text" placeholder="john@bocco#123">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="customer_create_account"  class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="shipping_data" name="shipping_" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" name="shipping_name"  type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="shipping_email"  type="email" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="shipping_phone"  type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" name="shipping_address"  type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="shipping_country" >
                                <option value="Tanzania" selected>Tanzania</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Rwanda">Rwanda</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="shipping_city"  placeholder="Dar Es Salaam">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php
                        $sum =0;
                         if(!empty($products)){
                            foreach ($products as $key => $product) {?>
                        <div class="d-flex justify-content-between">
                            <p><b><?=$product->name?></b> </p>
                            <p>TZS <?=number_format($product->price,1)?> X <?=$product->quantity?></p>
                        </div>
                        <?php
                        $sum+=($product->price*$product->quantity); }
                        }?>
                        <input name="total_order" value=<?=$sum?> type ="hidden">
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">TZS <?=number_format($sum,1)?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">0.0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">TZS <?=number_format($sum,1)?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value ="Cash" required name="payment_method" id="cash">
                                <label class="custom-control-label"  for="cash">Cash</label>
                            </div>
                        </div>

                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" value="Bank Deposit" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Deposit</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Checkout End -->

    <!-- Footer Start -->
    <?php include('footer.php');?>david.daniel@shulesoft.africa
    <!-- Footer End -->

    <?php include('footer_link.php');?>
