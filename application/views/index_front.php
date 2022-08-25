<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--

Template 2092 Shelf

http://www.tooplate.com/view/2092-shelf

-->
<title><?= $tittle; ?></title>

<!-- load stylesheets -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/front/font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/tooplate-style.css">  
<!-- Flipbook StyleSheet -->
<link href="<?= base_url(); ?>assets/front/dflip/css/dflip.min.css" rel="stylesheet" type="text/css">

<!-- Icons Stylesheet -->
<link href="<?= base_url(); ?>assets/front/dflip/css/themify-icons.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
  .tm-site-header {
    background: url('<?= base_url();?>assets/list_picture/<?= $dataPhoto->name_pict; ?>') no-repeat;
  }

  .bdyImg {
   background: url('<?= base_url();?>assets/list_picture/<?= $photoBody->name; ?>') repeat; 
  }

</style>
<script src="<?= base_url(); ?>assets/front/js/jquery-1.11.3.min.js"></script>
<!-- Templatemo style -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?= base_url(); ?>assets/front/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="<?= base_url(); ?>assets/front/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>

  <body>

    <div class="container">
        <header class="tm-site-header">

            <h1 class="tm-site-name"><?= $dataWebsite->header_tittle; ?></h1>
            <p class="tm-site-description"><?= $dataWebsite->header_descript; ?></p>

            <nav class="navbar navbar-expand-md tm-main-nav-container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tmMainNav" aria-controls="tmMainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse tm-main-nav" id="tmMainNav">
                    <ul class="nav nav-fill tm-main-nav-ul">
                        <?php $cek = $tittle == 'BULETIN PFID' ? 'active':''; ?>
                        <li class="nav-item"><a class="nav-link <?= $cek; ?>" href="<?= base_url();?>Fron">Home</a></li>
                        <?php $cek = $tittle == 'Kritik & Saran' ? 'active':''; ?>
                        <li class="nav-item"><a class="nav-link <?= $cek; ?>" href="<?= base_url();?>Kritik">Kritik & Saran</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"></a></li>
                    </ul>
                </div>
            </nav>

        </header>
        <div class="tm-main-content bdyImg">
            <?php $this->load->view($content); ?>
        </div>
        <footer>
           &copy;<span >Buletin-PFID</span> || visitors : <?= $dataWebsite->jml_pengunjung; ?>
       </footer>    
   </div>

   <!-- load JS files -->
   <!-- jQuery (https://jquery.com/download/) -->
   <script src="<?= base_url(); ?>assets/front/js/popper.min.js"></script>                <!-- Popper (https://popper.js.org/) -->
   <script src="<?= base_url(); ?>assets/front/js/bootstrap.min.js"></script>  
    <script id="dsq-count-scr" src="//buletin-pfid.disqus.com/count.js" async></script>           <!-- Bootstrap (
    https://getbootstrap.com/) -->
    <!-- Flipbook main Js file -->
    <script src="<?= base_url(); ?>assets/front/dflip/js/dflip.min.js" type="text/javascript"></script>
    <script type="text/javascript"></script>
    <script>     

        $(document).ready(function(){

                // Update the current year in copyright
                $('.tm-current-year').text(new Date().getFullYear());

            });

        </script>             

    </body>
    </html>