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
                            <h1 class="font-weight-semi-bold text-uppercase mb-3">CONTACT US</h1>
                            <div class="d-inline-flex">
                                <p class="m-0"><a href=""></a></p>
                                <p class="m-0 px-2">Home -</p>
                                <p class="m-0">Contact Us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactUs" novalidate="novalidate" action="#" method="POST">
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" name="message" rows="6" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>For any inquiry, do not hesitate to contact us. We will reply back soon.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Main Store</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, Dar Es salaam, TANZANIA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>ecommercesite@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+255 627 266716</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

        <!-- Footer Start -->
        <?php include('footer.php');?>
        <!-- Footer End -->



        <!-- JavaScript Libraries -->
        <?php include('footer_link.php');?>