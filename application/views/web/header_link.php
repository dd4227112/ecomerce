<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E-commerce products association analysis</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="<?=base_url('web_files/img/ecommerce.png')?>" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="<?php echo base_url('web_files/lib/owlcarousel/assets/owl.carousel.min.css');?>" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?php echo base_url('web_files/css/style.css');?>" rel="stylesheet">
        <script src="<?php echo base_url('web_files/swal/sweetalert2.all.min.js')?>"></script>
        <style>
           .pagination-links {
            margin-top: 20px;
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .pagination-links li {
            display: inline;
            margin-right: 5px;
        }

        .pagination-links a ,  .pagination-links strong{
            text-decoration: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            color: #333;
        }

        .pagination-links strong,
        .pagination-links a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>

    </head>

    <body>