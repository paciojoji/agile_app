<!DOCTYPE html>

<html lang="en">

   <head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="description" content="Agile App"/>
    <meta name="author" content="Joji Pacio">

    <meta name="keywords" content="Agile App" />
    
    <link href="<?=base_url();?>assets/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/sweetalert/sweetalert.css" rel="stylesheet">            

    <!-- Main styles for this application-->
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">    
  
    <title><?php echo isset($title) ? $title : 'Agile App' ; ?></title>

    <script type="text/javascript">
        window.App = {
            "baseUrl": "<?= base_url() ?>",            
            "removeDOM": "",
        };        
    </script>  

   </head>

   <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    
    <?=$template['partials']['header'];?>
    
    <div class="app-body">

      <?php endif; ?>

      <main class="main">
        <?=$template['body']; ?>
      </main>

   
    </div>

    <!-- CoreUI and necessary plugins-->
    <script src="<?=base_url();?>assets/vendors/jquery/js/jquery.min.js"></script>
    
    <script src="<?=base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/pace-progress/js/pace.min.js"></script>
    
    <script src="<?=base_url();?>assets/vendors/@coreui/coreui/js/coreui.min.js"></script>
    <script src="<?=base_url();?>assets/vendors/@coreui/coreui/js/coreui.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-select.min.js"></script>
    
    <script src="<?=base_url();?>assets/vendors/toast-master/js/jquery.toast.js"></script>

    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>

    <script src="<?=base_url();?>assets/vendors/sweetalert/jquery.sweet-alert.custom.js"></script>

    <script src="<?=base_url();?>assets/js/main.js"></script>

    <!-- vue -->
    <script src="<?=base_url();?>assets/js/vue.js"></script>
    <script src="<?=base_url();?>assets/js/vue-tables-2.min.js"></script>
    <!-- axios -->
    <script src="<?=base_url();?>assets/js/axios.min.js"></script>
    <script src="<?=base_url();?>assets/js/global.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>    

    <?php echo $template['metadata']; ?>

   </body>

</html>
