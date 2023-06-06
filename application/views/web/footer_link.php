<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('web_files/lib/easing/easing.min.js')?>"></script>
    <script src="<?=base_url('web_files/lib/owlcarousel/owl.carousel.min.js')?>"></script>

    <!-- Contact Javascript File -->
    <script src="<?=base_url('web_files/mail/jqBootstrapValidation.min.js')?>"></script>
    <script src="<?=base_url('web_files/mail/contact.js')?>"></script>

    <!-- Template Javascript -->
    <script src="<?=base_url('web_files/js/main.js')?>"></script>
    </body>
</html>
<!-- Login modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer Login</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="form" id="Login" action="#" method="POST">
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text"name ="username"  required class="form-control" id="username" placeholder=" username ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password"name ="password"  required class="form-control" id="password" placeholder="password ">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary text-left login">Login</button>
                      <button type="button"  class="btn btn-secondary text-right" data-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login Modal -->
<!-- register modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer Register</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="form" id="registerForm" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" name="name" required  type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" required  type="email" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="mobile" required  type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" required  type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country" >
                                <option value="Tanzania" selected>Tanzania</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Rwanda">Rwanda</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" required name="city"  placeholder="Dar Es Salaam">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Username</label>
                        <input class="form-control" name="username" required type="text" placeholder="Username">
                        </div><div class="col-md-6 form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" required type="password" placeholder="">
                        </div>
                       
                        <button type="button" class="btn btn-secondary text-right" data-dismiss="modal" >Close</button>
                      <button type="submit" class="btn btn-primary text-left  register_btn" >Register</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- register Modal -->
<script>
    function loadSwal(message){
        Swal.fire({
            position: 'center',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                location.reload(); // Refresh the current page
        });
    }
$(document).ready(function(){
        updateCart();
    $('.searchProduct').on('click', function(){

        $('#search').submit();
    });
    function updateCart(){
        $.ajax({
            url: "<?=base_url('/Web/countCart/'.$this->session->userdata('id'))?>",
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                $('#cartCount').html(response.count);
            },
            error: function(xhr, status, error) {
            console.log(xhr.responseText);
            }
        });
    }
    $('.add_to_cart').on('click', function(){
        var quantity = $('input[name =quantity]').val();
        var product = $('input[name =product_id]').val();
        $.ajax({
            url: "<?=base_url('/Web/storeCart/'.$this->session->userdata('id'))?>",
            type: 'POST',
            dataType: 'json',
            data:{
                quantity:quantity, product:product
            },
            success: function(response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response,
                    showConfirmButton: false,
                    timer: 1000
                }).then(() => {
                location.reload(); // Refresh the current page
                });
            },
            error: function(xhr, status, error) {
            console.log(xhr.responseText);
            }
        });
    });
        // Handle remove button click
        $('.link_hidden').hide();
        $('.show_link').on('mouseenter', function(){
            $('.link_hidden').show();
        });
        $(window).on('click', function(){
            $('.link_hidden').hide();
        });
        $('.remove').click(function() {
            var row = $(this).closest('tr');
            var id = row.attr('id');
            row.remove();
            $.ajax({
                url: "<?=base_url('/Web/deleteProductCart')?>",
                type: 'POST',
                dataType: 'json',
                data:{
                    id:id,
                },
                success: function(response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response,
                    showConfirmButton: false,
                    timer: 1000
                }).then(() => {
                location.reload(); // Refresh the current page
                });
                },
                error: function(xhr, status, error) {
                console.log(xhr.responseText);
                }
            });
        });

  // Handle update button click
  $('.btn-update-quantity').click(function() {
    // Get the input field associated with the update button
    var inputField = $(this).closest('tr').find('.form-control');
    var row = $(this).closest('tr');
    var id = row.attr('id');
    // Get the input value
    var inputValue = inputField.val();
    $.ajax({
                url: "<?=base_url('/Web/updateProductCart')?>",
                type: 'POST',
                dataType: 'json',
                data:{
                    id:id, quantity:inputValue
                },
                success: function(response) {
                    loadSwal(response);

               },
                error: function(xhr, status, error) {
                console.log(xhr.responseText);
                }
            });
  });
   $('#customerOrder').on('submit', function(e){
        // e.preventDefault();
        var name =  $("input[name =shipping_name]").val();
        var email = $("input[name =shipping_email]").val();
        var address = $("input[name =shipping_address]").val();
        var city = $("input[name =shipping_city]").val();
        var mobile = $("input[name =shipping_phone]").val(); 
        var order =  $("input[name =total_order]").val(); 
        if (order ==0) {
            Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: "Please select at least one product to press an order",
        });
        return false;
        }
         
        if ( $('#shipto').prop('checked') &&(name=='' || email =='' || address =='' || city=='' || mobile == '')) {
            Swal.fire({
            icon: 'warning',
            title: 'warning',
            text: "Please fill all fields/data for shipping address",
        });
        return false;
        }else{
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Order your order is sent',
            showConfirmButton: false,
            timer: 1000
            }).then(() => {
            $('#customerOrder').submit();
            location.reload(); // Refresh the current page
            });

            }

    });

    $('#contactUs').on('submit', function(e){
        e.preventDefault();
        var name =  $("input[name =name]").val();
        var email = $("input[name =email]").val();
        var subject = $("input[name =subject]").val();
        var message = $("textarea[name =message]").val();         
        if (name=='' || email =='' || subject =='' || message=='') {
            Swal.fire({
            icon: 'warning',
            title: 'warning',
            text: "Please fill all fields",
        });
        return false;
        }else{
            $.ajax({
                url: "<?=base_url('Web/saveContact')?>",
                type: 'POST',
                dataType: 'json',
                data:{
                    name:name, 
                    email:email,
                    subject:subject,
                    message:message
                },
            success: function(response){
                console.log(response)
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: response,
            showConfirmButton: false,
            timer: 1000
            }).then(() => {
            location.reload(); // Refresh the current page
            });
        }
    });

            }

    });

    $('#Login').on('submit', function(e){
        e.preventDefault();
    // Get the input field associated with the update button
    var username =  $("input[name =username]").val();
    var password = $("input[name =password]").val();
      $.ajax({
                url: "<?=base_url('Web/Login')?>",
                type: 'POST',
                dataType: 'json',
                data:{
                    username:username, 
                    password:password
                },
                success: function(response) {
                    Swal.fire({
                position: 'center',
                icon: response.icon,
                title: response.message,
                showConfirmButton: false,
                timer: 1500
                }).then(() => {
                location.reload(); // Refresh the current page
                });
              },
                error: function(xhr, status, error) {
                console.log("Error");
                }
            });
  });
  $('#register_customer').on('click', function(e){
        e.preventDefault();
        $('#registerModal').modal('show');
    });
    $('#registerForm').submit(function(e){
        e.preventDefault(); 
        var data = $('#registerForm').serialize();
        $.ajax({
                url: "<?=base_url('Web/register')?>",
                type: 'POST',
                dataType: 'json',
                data:data,
                success: function(response) {
                    Swal.fire({
                    position: 'center',
                    icon: response.icon,
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                    }).then(() => {
                    location.reload(); // Refresh the current page
                    });
              },
                error: function(xhr, status, error) {
                console.log("Error");
                }
            });
    });
  
});    
</script>
