<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u>Orders Payments</u></h4>
                        <table class="table table-hover">
                        <thead>
                            <tr class="bg-gradient-primary">
                            <th> # </th>
                            <th>order_id </th>
                            <th>Order Amount </th>
                            <th>Payed Amount </th>
                            <th>Balance </th>
                            <th>Status </th>
                            <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($payments)) {
                                foreach ($payments as $key => $payment) {?>
                            <tr>
                            <td> <?=$no?> </td>
                            <td> <?=$payment->order_id?> </td>
                            <td> <?=number_format($payment->order_amount,1)?> </td>
                            <td> <?=number_format($payment->paid,1)?> </td>
                            <td> <?=number_format($payment->unpayed,1)?> </td>
                            <td> <?=$payment->payment_status?> </td>
                            <td>  
                                <a href="#"  id="<?=$payment->order_id?>" class="view_payment_history" title="view payment history"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                               <?=$payment->unpayed > 0 ?"<a href='#'  id='$payment->order_id' class='add_payment 'title='add payment'><i class='mdi mdi-plus-circle-outline'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;":""?>
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

<!-- payment history modal -->
<div class="modal fade" id="viewPaymentHistory" tabindex="-1" role="dialog" aria-labelledby="viewPaymentHistory" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <div class=" mb-4">
        <h4 class="font-weight-semi-bold mb-4">Payment History</h4>
        <div class="items_data">
            
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gradient-secondary close-viewPaymentHistory" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- payment history modal  -->

<!--  add Payment Modal-->
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
        $('.view_payment_history').on('click', function(){
         var order_id =$(this).attr("id");
        $.ajax({
              url: "<?=base_url('Admin/getPaymentHistory')?>",
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
                    "<th> Date </th>" +
                    "<th>Amount </th>" +
                    "<th>"+stringDivider('Payment method', 7, '<br/>\n')+"</th>" +
                    "<th>recieved by </th>" +
                    "</tr>";
                    for (let i = 0; i < response.length; i++) {
                    html += "<tr>" +
                        "<td>" + no + "</td>" +
                        "<td>" + response[i].date + "</td>" +
                        "<td>" + response[i].amount + "</td>" +
                        "<td>" + response[i].payed_by + "</td>" +
                        "<td>" + stringDivider(response[i].name, 10, "<br/>\n") + "</td>" +
                        "</tr>";
                    no++;
                    sum+=parseInt(response[i].amount);
                    }
                    html+="<tr><td colspan='4'><b>TOTAL</b></td><td><b>"+sum+"</b></td></tr>"+
                   "</tbody></table>";

                $('.items_data').html(html);
                $('#viewPaymentHistory').modal("show");
            },
              error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }       
        });
    });
        $('.add_payment').on('click', function(){
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