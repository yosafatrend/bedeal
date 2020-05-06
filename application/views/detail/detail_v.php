 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <?php $this->load->view('include/header');?>

 <style>
.detail{
	padding-top: 50px;
	font-size: 20px;
}

 </style>
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
				<h1>Detail Transaksi
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i>Detail Transaksi</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container detail">
					<div class="col-md-4">
					<?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>	
					<p><b>Penjual</b> : <?php echo 	$detail_bayar['usern_target'] ?></p>
					<p><b>Bank</b> : <?php echo $detail_bayar['bank_target'] ?></p>
					<p><b>No Rekening</b> : <?php echo $detail_bayar['norek_target'] ?>	</p>
					<p><b>AN Rekening</b> : <?php echo $detail_bayar['an_rek'] ?>	</p>
					<p><b>Tanggal</b> : <?php echo $detail_bayar['tanggal'] ?>	</p>
					</div>
					<div class="col-md-4">
					<p><b>Bukti Pembayaran</b> : </p>	
					<img src="<?php echo base_url("uploads/bukti_pembayaran/$detail_bayar[bukti]") ?>" width="250">				
					</div>
					<div class="col-md-4">
					<p><b>Bukti Pengiriman</b> : </p>
					<?php if ($detail_bayar['bukti_pengiriman']!= ""): ?>
					<img src="<?php echo base_url("uploads/bukti_pengiriman/$detail_bayar[bukti_pengiriman]") ?>" width="250">				
					<?php endif ?>
					<?php if ($detail_bayar['bukti_pengiriman']== ""): ?>
						<p><small>Penjual belum mengirim bukti pengiriman.</small></p>
					<?php endif ?>
					</div>
					<?php endif ?>
					<?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>	
					<p><b>Pembeli</b> : <?php echo 	$detail_bayar['username'] ?></p>
					<p><b>Bank</b> : <?php echo $detail_bayar['bank'] ?></p>
					<p><b>No Rekening</b> : <?php echo $detail_bayar['no_rek'] ?>	</p>
					<p><b>Tanggal</b> : <?php echo $detail_bayar['tanggal'] ?>	</p>
					</div>
					<div class="col-md-4">
					<p><b>Bukti Pembayaran</b> : </p>	
					<img src="<?php echo base_url("uploads/bukti_pembayaran/$detail_bayar[bukti]") ?>" width="250">				
					</div>	
					<div class="col-md-4">
					<p><b>Bukti Pengiriman</b> : </p>
					<?php if ($detail_bayar['bukti_pengiriman']!= ""): ?>
					<img src="<?php echo base_url("uploads/bukti_pengiriman/$detail_bayar[bukti_pengiriman]") ?>" width="250">				
					<?php endif ?>
					<?php if ($detail_bayar['bukti_pengiriman']== ""): ?>
						<p><small>Anda belum mengirim bukti pengiriman.</small></p>
					<?php endif ?>
					</div>
					<?php endif ?>
					<?php if ($this->session->userdata['Admin']['role']=='Admin'): ?>	
					<p><b>Penjual</b> : <?php echo 	$detail_bayar['usern_target'] ?></p>
					<p><b>Pembeli</b> : <?php echo 	$detail_bayar['username'] ?></p>
					<p><b>Bank</b> : <?php echo $detail_bayar['bank'] ?></p>
					<p><b>AN Rekening</b> : <?php echo $detail_bayar['an_rek'] ?>	</p>
					<p><b>No Rekening</b> : <?php echo $detail_bayar['no_rek'] ?>	</p>
					<p><b>Tanggal</b> : <?php echo $detail_bayar['tanggal'] ?>	</p>
					</div>
					<div class="col-md-4">
					<p><b>Bukti Pembayaran</b> : </p>
					<img src="<?php echo base_url("uploads/bukti_pembayaran/$detail_bayar[bukti]") ?>" width="250">	
				</div>
				
					<?php endif ?>

					</div>
				</div>
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
