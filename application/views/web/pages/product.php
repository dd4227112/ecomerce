
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="main">
    <div class="content">
        <div class="">
            <div class="heading">
                <h3>Shop Page</h3>
            </div>
            <div class="clear"></div>
        </div>
<div class="row">


        <?php
            ?>
                <?php foreach ($get_all_product as $single_products) { ?>

                    <div class="col-sm-4">
                        <div class="card">
                        <div class="card-body">

                        <a href="<?php echo base_url('single/'.$single_products->product_id);?>"><img style="width:250px;height:250px" src="<?php echo base_url('uploads/'.$single_products->product_image)?>" alt="" /></a>
                        <h2><?php echo $single_products->product_title ?></h2>
                        <p><?php echo word_limiter($single_products->product_short_description, 10) ?></p>
                        <p><span class="price"><?php echo $this->cart->format_number($single_products->product_price) ?> Rs.</span></p>
                        <a class="btn btn-sm" href="<?php echo base_url('single/'.$single_products->product_id);?>">Details</a>
                    </div>
                </div>
                </div>
                    <?php
                }
                ?>
            <?php
        ?>
        </div>


    </div>
</div>
