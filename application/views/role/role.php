 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <?php $this->load->view('include/header');?>


</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('include/topbar');?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('include/sidebar');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Role
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Role</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
       <?php echo  form_open('UserController/editrole');?>
       <select class="form-control" name="as">
        <option value="">--Pilih Peran--</option>
        <option value="Vendor" <?php if($this->session->userdata['Admin']['role']=='Vendor') echo"selected"; ?>>Penjual</option>
        <option value="Client_cs" <?php if($this->session->userdata['Admin']['role']=='Client_cs') echo"selected"; ?> >Pembeli</option>

      </select>
      <small class="text-danger"><?= form_error('as') ?></small><br>
      <button class="btn btn-success" type="submit">Ubah</button>
    </form>
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
