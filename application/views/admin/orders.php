<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u>Requested Orders</u></h4>
                        <table id= "orders" class="table table-hover">
                        <thead>
                            <tr class="bg-gradient-primary">
                            <th> # </th>
                            <th>Date </th>
                            <th>Customer </th>
                            <th>Location </th>
                            <th>Contact </th>
                            <th>Amount </th>
                            <th>Payment Method </th>
                            <th> Status </th>
                            <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($orders)) {
                                foreach ($orders as $key => $order) {?>
                            <tr>
                            <td> <?=$no?> </td>
                            <td> <?=$order->date?> </td>
                            <td> <?=$order->name?> </td>
                            <td> <?=$order->city." - ".$order->country?> </td>
                            <td> <?=$order->mobile?> </td>
                            <td> <?=number_format($order->amount,1)?> </td>
                            <td> <?=$order->payment_method?> </td>
                            <td> <?=$order->status?> </td>
                            <td>  
                                <a href="#"  id="<?=$order->order_id?>" class= "view_shipping" title="view shipping address"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#"  id="<?=$order->order_id?>"  class="view_order_items" title="view order items"><i class="mdi mdi-cart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                               <?php if($order->status =='Pending' || $order->status =='Partial' ){?>
                                <a href="#"  id="<?=$order->order_id?>" class="add_payment" title="add Payment"><i class="mdi mdi-plus-circle-outline"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php }?>

                            </td>
                            </tr>
                            <?php 
                            $no++;
                                }
                            }
                            else {
                                echo "<tr><td  colspan ='7' class='text-center'>No data found</td></tr>";}

                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<!-- content -->
<!-- shipping address modal -->
<div class="modal fade" id="viewShippingAddress" tabindex="-1" role="dialog" aria-labelledby="productDescription" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <div class=" mb-4" id="shipping-address">
        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
        <div class="shipping_data">
            
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gradient-secondary close-viewShippingAddress" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- shipping address modal  -->

<!-- order items modal -->
<div class="modal fade" id="viewOrderItems" tabindex="-1" role="dialog" aria-labelledby="viewOrderItems" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <div class=" mb-4">
        <h4 class="font-weight-semi-bold mb-4">Order Items</h4>
        <div class="items_data">
            
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gradient-secondary close-viewOrderItems" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- order items modal  -->

<!--  add Payment Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModal" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Payment</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" action="<?=base_url('Admin/addPayment')?>" method="POST">
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Amount</label>
                        <div class="col-sm-9">
                          <input type="number" name ="amount"  required class="form-control" id="category_name" placeholder=" ">
                          <input type="hidden" name ="order_id" id="order_id">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="category_id"class="col-sm-3 col-form-label" >Payment Mathod</label>
                        <div class="col-sm-9">
                            <select name="payed_by" required class="form-control" id="category_id">
                            <option value="cash">Cash</option>
                            <option value="Bank Deposit">Bank Deposit</option>
                            <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>
                      </div>
                      <button type="button"  class="btn btn-secondary close-addPaymentModal" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary align-right">Save</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- add Payment modal -->
<?php include('admin_footer.php');?>
<script>
$(document).ready(function(){
    $('#orders').DataTable();


    $(document).on('click','.view_shipping', function(){
        var order_id =$(this).attr("id");
        $.ajax({
              url: "<?=base_url('Admin/getOrderShippingAddress')?>",
              type: 'POST',
              dataType: 'json',
              data:{
                order_id:order_id,
              },
              success: function(response) {
                var html = "<table class='table table-hover'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<th> Full name </th>" +
                    "<th> Phone </th>" +
                    "<th>Email </th>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>" + response.name + "</td>" +
                    "<td>" + response.phone + "</td>" +
                    "<td>" + response.email + "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<th>Address</th>" +
                    "<th> Country </th>" +
                    "<th> City </th>" +
                    "</tr>" +
                    "<tr>" +
                    "<td>" + response.address + "</td>" +
                    "<td>" + response.country + "</td>" +
                    "<td>" + response.city + "</td>" +
                    "</tr>" +
                    "</tbody></table>";

                $('.shipping_data').html(html);
                $('#viewShippingAddress').modal("show");
            },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }       
        });
    });

    $(document).on('click', '.view_order_items', function(){
         var order_id =$(this).attr("id");
        $.ajax({
              url: "<?=base_url('Admin/getOrderItems')?>",
              type: 'POST',
              dataType: 'json',
              data:{
                order_id:order_id,
              },
              success: function(response) {
                var no=1;
                var sum =0;
                var html = "<table class='table table-hover'>" +
                    "<tbody>" +
                    "<tr>" +
                    "<th># </th>" +
                    "<th> Product Name </th>" +
                    "<th>Description </th>" +
                    "<th>Quantity </th>" +
                    "<th>Price</th>" +
                    "<th>Total</th>" +
                    "</tr>";
                    for (let i = 0; i < response.length; i++) {
                    html += "<tr>" +
                        "<td>" + no + "</td>" +
                        "<td>" + response[i].name + "</td>" +
                        "<td>" + stringDivider(response[i].description, 150, "<br/>\n") + "</td>" +
                        "<td>" + response[i].quantity + "</td>" +
                        "<td>" + response[i].price + "</td>" +
                        "<td>" + (response[i].price * response[i].quantity) + "</td>" +
                        "</tr>";
                    no++;
                    sum+=(response[i].price * response[i].quantity);
                    }
                    html+="<tr><td colspan='5'><b>TOTAL</b></td><td><b>"+sum+"</b></td></tr>"+
                   "</tbody></table>";

                $('.items_data').html(html);
                $('#viewOrderItems').modal("show");
            },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }       
        });
    });
      $(document).on('click', '.add_payment', function() {
        var order_id =$(this).attr("id");
        $('#order_id').val(order_id);
        $('#addPaymentModal').modal("show");
    });

    function stringDivider(str, width, spaceReplacer) {
    if (str.length>width) {
        var p=width
        for (;p>0 && str[p]!=' ';p--) {
        }
        if (p>0) {
            var left = str.substring(0, p);
            var right = str.substring(p+1);
            return left + spaceReplacer + stringDivider(right, width, spaceReplacer);
        }
      }
      return str;
    }
});
</script>

