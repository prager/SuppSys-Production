<!doctype html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SupplySys</title>

<link rel="shortcut icon" href="<?php echo base_url() ;?>assets/img/packg.ico" type="image/x-icon" />

<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/components.css">
<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/icons.css">
<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/responsee.css">
<link rel="stylesheet" href="<?php echo base_url() ;?>assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url() ;?>assets/owl-carousel/owl.theme.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' 
rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url() ;?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ;?>assets/js/jquery-ui.min.js"></script>
</head>
<body class="size-1280">
      <!-- HEADER -->
      <header>
         <div class="line">
            <div class="box">
               <div class="s-12 l-2">
                  <img class="s-5 l-12 center" src="<?php echo base_url() ;?>/assets/img/supp-logo.png">
               </div>
            </div>
         </div>
         <!-- TOP NAV -->
         <div class="line">
            <nav class="margin-bottom">
               <div class="top-nav s-12 l-10">
                  <ul>
                     <li><?php echo anchor('public_ctl', 'Home'); ?></li>
                     <!-- <li>
                        <a>Product</a>
                        <ul>
                           <li><a>GSA Maintenance</a></li>
                           <li><a>
                             Unit Supply</a>
                             <ul>
                              <li><a>General</a></li>
                              <li><a>OCIE</a></li>
                             </ul>

                           </li>
                        </ul>
                     </li>-->
                     <li>
                        <a>Categories</a>
                        <ul>
                           <li><?php echo anchor('stock/turn_in', 'Turn-In'); ?></li>
                           <!-- <li><?php echo anchor('stock/boat_gear', 'Boat Gear'); ?></li>
                           <li><?php echo anchor('stock/other', 'Other'); ?></li> -->
                        </ul>
                     </li>
                     <li><?php echo anchor('public_ctl/contact', 'Contact'); ?></li>
                     <li><?php echo anchor_popup('https://github.com/prager/supply/wiki/SuppSys-Supply-System', 'About'); ?></li>
                     <li><?php echo anchor('login/logout', 'Logout'); ?></li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>