 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <?php $this->load->view('include/header');?>

 <style>


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
				<h1><?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>
				Riwayat Pembelian
			<?php endif ?>
			<?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>
				Riwayat Penjualan
			<?php endif ?>
			<?php if ($this->session->userdata['Admin']['role']=='Admin'): ?>
				Semua Transaksi
			<?php endif ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i><?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>
			Riwayat Pembelian	
		<?php endif ?>
		<?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>
			Riwayat Penjualan
		<?php endif ?>
		<?php if ($this->session->userdata['Admin']['role']=='Admin'): ?>
			Semua Transaksi
			<?php endif ?></a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>
			<?= $this->session->flashdata('message'); ?>  
			<div class="alert alert-info"><b>Pastikan konfirmasi pesanan anda jika sudah diterima. Dengan mengkonfirmasi pesanan, uang akan segera dikirim ke penjual.</b></div>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Penjual</th>
						<th>Bank</th>
						<th>No Rekening</th>
						<th>AN Rekening</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($bayar as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['usern_target'] ?></td>
							<td><?php echo $value['bank_target'] ?></td>
							<td><?php echo $value['norek_target'] ?></td>
							<td><?php echo $value['an_rek'] ?></td>
							<td><?php echo $value['tanggal'] ?></td>
							<td><button 
								<?php if ($value['status']=='terkonfirmasi'): ?>
									class="btn btn-xs btn-success"
								<?php endif ?>
								<?php if ($value['status']=='pending'): ?>
									class="btn btn-xs btn-warning"
								<?php endif ?>
								<?php if ($value['status']=='diterima'): ?>
									class="btn btn-xs btn-info"
								<?php endif ?>
								<?php if ($value['status']=='dikirim'): ?>
										class="btn btn-xs btn-primary"
								<?php endif ?>
								
								><?php echo $value['status'] ?></button></td>
								<td>
									<a href="<?= base_url("UserController/detail/$value[id_bayar]") ?>" class="btn btn-info btn-small">Detail</a>
									<?php if ($value['diterima']==0): ?>
										<?php if ($value['status']=='dikirim'): ?>
											<a href="<?= base_url("UserController/confirm/$value[id_bayar]") ?>" class="btn btn-primary btn-small">Barang Diterima</a>
										<?php endif ?>
										<?php if ($value['status']!='dikirim'): ?>
											<a class="btn btn-primary btn-small" disabled>Barang Diterima</a>
										<?php endif ?>
									<?php endif ?>
									<?php if ($value['diterima']==1): ?>
										<a class="btn btn-success btn-small" disabled>Terkonfirmasi</a>
									<?php endif ?>
									
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
			<?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>
				<?= $this->session->flashdata('message'); ?> 
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Pembeli</th>
							<th>Bank</th>
							<th>No. Rek Pembeli</th>
							<th>A/n Rek Pembeli</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($bayar_p as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value['username'] ?></td>
								<td><?php echo $value['bank'] ?></td>
								<td><?php echo $value['no_rek'] ?></td>
								<td><?php echo $value['an_rek_target']; ?></td>
								<td><?php echo $value['tanggal'] ?></td>
								<td>	
									<button 
									<?php if ($value['status']=='terkonfirmasi'): ?>
										class="btn btn-xs btn-success"
									<?php endif ?>
									<?php if ($value['status']=='pending'): ?>
										class="btn btn-xs btn-warning"
									<?php endif ?>
									<?php if ($value['status']=='dikirim'): ?>
										class="btn btn-xs btn-primary"
									<?php endif ?>
									<?php if ($value['status']=='diterima'): ?>
									class="btn btn-xs btn-info"
								<?php endif ?>
									>
									<?php echo $value['status'] ?></button>
								</td>
								<td>
									<a href="<?= base_url("UserController/detail/$value[id_bayar]") ?>" class="btn btn-info btn-small">Detail</a>
									<!-- <?php if ($value['status']=='terkonfirmasi'): ?>
										<a href="<?= base_url("UserController/bukti_pengirim/$value[id_bayar]") ?>" class="btn btn-primary btn-small">Kirim bukti pengiriman</a>
									<?php endif ?>
									<?php if ($value['status']!='terkonfirmasi'): ?>
										<a class="btn btn-primary btn-small" disabled>Kirim bukti pengiriman</a>
									<?php endif ?> -->
									<a href="<?= base_url("UserController/bukti_pengirim/$value[id_bayar]") ?>" class="btn btn-primary btn-small">Kirim bukti pengiriman</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
			<?php if ($this->session->userdata['Admin']['role']=='Admin'): ?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Pembeli</th>
						<th>Bank Pemb.</th>
						<th>No Rek. Pemb</th>
						<th>Penjual</th>
						<th>Bank Penj</th>
						<th>No Rek. Penj</th>
						<th>AN Rek. Penj</th>
						<th>Tanggal</th>
						<th>Diterima</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($bayar_a as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['username'] ?></td>
							<td><?php echo $value['bank'] ?></td>
							<td><?php echo $value['no_rek'] ?></td>
							<td><?php echo $value['usern_target'] ?></td>
							<td><?php echo $value['bank_target'] ?></td>
							<td><?php echo $value['norek_target'] ?></td>
							<td><?php echo $value['an_rek'] ?></td>
							<td><?php echo $value['tanggal'] ?></td>
							<td><?php echo $value['diterima'] ?></td>
							<td><button 
								<?php if ($value['status']=='terkonfirmasi'): ?>
									class="btn btn-xs btn-success"
								<?php endif ?>
								<?php if ($value['status']=='pending'): ?>
									class="btn btn-xs btn-warning"
								<?php endif ?>
								<?php if ($value['status']=='diterima'): ?>
									class="btn btn-xs btn-info"
								<?php endif ?>
								<?php if ($value['status']=='dikirim'): ?>
										class="btn btn-xs btn-primary"
								<?php endif ?>
								
								><?php echo $value['status'] ?></button></td>
								<td>
									<a href="<?= base_url("UserController/detail2/$value[id_bayar]") ?>" class="btn btn-info btn-small">Detail</a>
									<a href="<?= base_url("UserController/confirm2/$value[id_bayar]") ?>" class="btn btn-success btn-small">Konfirmasi</a>

								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
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
