 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php $this->load->view('include/header');?>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('include/topbar');?>
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('include/sidebar');?>
<?php $role = $this->session->userdata['Admin']['role'] ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          
      <?php //if($this->session->userdata['Admin']['role'] == 'Admin'){?>
      
      <div class="row">
          <?php if ($this->session->userdata['Admin']['role'] == 'Admin'): ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
        
              
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$vendors+$customers?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="<?=base_url('vendor/list');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <?php endif ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
        <?php if ($this->session->userdata['Admin']['role'] != 'Admin'): ?>  
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Chat</h3>

              <p>Mulailah mengobrol</p>
            </div>
            <div class="icon">
              <i class="fa fa-comment"></i>
            </div>
            <a href="<?=base_url('chat');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php endif ?>
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Role</h3>

              <p>Ganti menjadi penjual atau pembeli</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=base_url('role');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <?php if ($this->session->userdata['Admin']['role'] == 'Client_cs'): ?>
          
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Bayar</h3>

              <p>Bayar transaksi anda</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="<?=base_url('bayar');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <?php endif ?>
        <?php if ($this->session->userdata['Admin']['role'] == 'Vendor'): ?>  
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Terima Pemb.</h3>

              <p>Atur penerimaan pembayaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="<?=base_url('bayar');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <?php endif ?>
        <?php if ($this->session->userdata['Admin']['role'] == 'Vendor'): ?>  
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>R. Transaksi</h3>

              <p>Pantau transaksi anda</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="<?=base_url('riwayatp');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <?php endif ?>
        <?php if ($this->session->userdata['Admin']['role'] == 'Client_cs'): ?>  
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>R. Transaksi</h3>

              <p>Pantau transaksi anda</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="<?=base_url('riwayat');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <?php endif ?>
        <?php if ($this->session->userdata['Admin']['role'] != 'Admin'): ?>  
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Laporkan</h3>

              <p>Ada masalah dalam transaksi?</p>
            </div>
            <div class="icon">
              <i class="fa fa-comment"></i>
            </div>
            <a href="<?=base_url('UserController/laporkan');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif ?>
        <?php if ($this->session->userdata['Admin']['role'] == 'Admin'): ?>  
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Laporkan</h3>

              <p>Ada masalah dalam transaksi?</p>
            </div>
            <div class="icon">
              <i class="fa fa-comment"></i>
            </div>
            <a href="<?=base_url('UserController/tampillapor');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif ?>
        </div>
       
       
       <?php //} ?>
        <!-- ./col -->
     
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
       
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php $this->load->view('include/footer');?>

 <!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('public')?>/components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
 





<!-- AdminLTE for demo purposes -->
</body>
</html>
