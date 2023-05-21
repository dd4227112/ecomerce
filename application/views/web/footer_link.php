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
<script>
    $(document).ready(function(){
        updateCart();
    });
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
    $(document).ready(function() {
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
    });

    $(document).ready(function() {
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
        function loadSwal(message){
            Swal.fire({
                position: 'center',
                    icon: 'success',
                    title: message,
                    showConfirmButton: false,
                    timer: 1000
                }).then(() => {
                location.reload(); // Refresh the current page
                });
        }
});


    
</script>
