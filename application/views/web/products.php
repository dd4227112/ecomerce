<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2"><?=$title?></span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php if(!empty($products)){
                foreach( $products as $product){?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4" style="height:400px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="<?=base_url('web_files/img/'.$product->image)?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?=$product->name?></h6>
                        <div class="d-flex justify-content-center">
                            <h6> TZS<?=$product->price?></h6><h6 class="text-muted ml-2"><del><?=$product->old_price?'TZS'.$product->old_price:''?></del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="<?=base_url('/Web/product_detail/'.$product->id)?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="<?=base_url('/Web/product_detail/'.$product->id)?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
           <?php }
           }else{ ?>
           <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <h6 class="text-truncate mb-3"> Product not found</h6>

           </div>
        <?php } ?>
       </div>
       <div class="pagination-links">
        <?php echo $links; ?>
    </div>