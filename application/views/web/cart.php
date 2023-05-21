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
                            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
                            <div class="d-inline-flex">
                            <p class="m-0"><a href="<?=base_url()?>">Home</a></p>
                            <p class="m-0 px-2">-</p>
                            <p class="m-0">Shopping Cart</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th></th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $total =0;
                         if(!empty($products)){
                            
                            foreach($products as $product){?>
                        <tr id="<?=$product->id?>">
                            <td class="align-middle"><img src="<?=base_url('web_files/img/'.$product->image)?>" alt="" style="width: 50px;"> <?=$product->name?></td>
                            <td class="align-middle">TZS <?=$product->price?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?=$product->quantity?>">
                                    <input type="hidden" class="form-control form-control-sm bg-secondary text-center" value="<?=$product->id?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>                                   
                                </div>
                                
                            </td>
                            <td class="align-middle">
                            <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-update-quantity">
                                            update
                                        </button>
                                    </div>
                            </td>

                            <td class="align-middle">TZS <?=$product->price*$product->quantity?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary remove"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php 
                     $total +=($product->price*$product->quantity);
                    }
                        }?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <!-- <input type="text" class="form-control p-4" placeholder="Coupon Code"> -->
                        <div class="input-group-append">
                            <a href="<?=base_url()?>" class="btn btn-primary">Continue Shopping...</a>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">TZS <?=number_format($total,1)?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">TZS 0.0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">TZS <?=number_format($total,1)?></h5>
                        </div>
                        <a href ="<?=base_url('/Web/checkout')?>" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php include('footer.php');?>
    <!-- Footer End -->

    <?php include('footer_link.php');?>
