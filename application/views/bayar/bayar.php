 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <?php $this->load->view('include/header');?>

 <style>

 	.form-control{
 		margin-bottom: 	9px;
 	}
 	label{
 		font-size: 	15px;
 	}
 	h4{
 		font-size: 20px;
 	}
 	.btn{
 		margin-top: 30px;
 		<?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>
 			width: 10%;
 			<?php else: ?>	
 				width: 100%;
 		<?php endif ?>
 		 
 		
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
				<h1><?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>Bayar<?php endif ?><?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>Terima Pembayaran<?php endif ?>
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i><?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>Bayar<?php endif ?><?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>Terima Pembayaran<?php endif ?></a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>
				
				<div class="container">
					<div class="row">


						<?= form_open_multipart() ?>
						<br>
						<?= $this->session->flashdata('message'); ?>	
						<div class="alert alert-warning">Pastikan telah mengirim pembayaran pada nomor rekening admin.<b> Rek : 6013-0100-6668-1660, A/N : BeDeal, BRI</b></div>
						<div class="col-md-5">
							<h4>Dikirim dari :</h4>

							<label style="margin-top:18px">Username</label>
							<input type="text" name="username" value="<?= $this->session->userdata['Admin']['username'] ?>" class="form-control" >
							<small class="text-danger"><?= form_error('username') ?></small>
							<label>Atas Nama Rekening</label>
							<input type="text" name="an_rek_pemb" value="<?= set_value('an_rek_pemb') ?>" class="form-control">
							<small class="text-danger"><?= form_error('an_rek_pemb') ?></small>
							<label>Bank</label>
							<select class="form-control" name="bank" value="<?= set_value('bank') ?>">
								<option value="">--Pilih Bank--</option>	
								<option value="BRI">BRI</option>
								<option value="BNI">BNI</option>
								<option value="Mandiri">Mandiri</option>
								<option value="BCA">BCA</option>
							</select>
							<small class="text-danger"><?= form_error('bank') ?></small>
							<label>No Rekening</label>
							<input type="number" class="form-control" name="no_rek" value="<?= set_value('no_rek') ?>">
							<small class="text-danger"><?= form_error('no_rek') ?></small>
						</div>
						<div class="col-md-5">
						<h4>Data Penjual :</h4>
							<label style="margin-top:18px">Username</label>
							<input type="text" name="usern_target" class="form-control" value="<?= set_value('usern_target') ?>">
							<small class="text-danger"><?= form_error('usern_target') ?></small>
							<label>Atas Nama Rekening</label>
							<input type="text" name="an_rek" value="<?= set_value('an_rek') ?>" class="form-control">
							<small class="text-danger"><?= form_error('an_rek') ?></small>
							<label>Bank</label>
							<select class="form-control" name="bank_target" value="<?= set_value('bank_target') ?>">
								<option value="">--Pilih Bank--</option>	
								<option value="BRI">BRI</option>
								<option value="BNI">BNI</option>
								<option value="Mandiri">Mandiri</option>
								<option value="BCA">BCA</option>
							</select>
							<small class="text-danger"><?= form_error('bank_target') ?></small>
							<label>No Rekening</label>
							<input type="number" class="form-control" name="norek_target" value="<?= set_value('norek_target') ?>">
							<small class="text-danger"><?= form_error('norek_target') ?></small>
						</div>
						<div class="col-md-10">
							<label>Upload Bukti Transfer</label>
							<input type="file" class="form-control" name="bukti" value="<?= set_value('bukti') ?>">
							<small class="text-danger"><?= form_error('bukti') ?></small>
						</div>
						<div class="col-md-2 col-md-offset-4">
							<button class="btn btn-success" type="submit">Kirim</button>
						</div>
						<?php echo form_close() ?>
					
				</div>
			</div>
			<?php endif ?>
			<?php if ($this->session->userdata['Admin']['role']=='Vendor'): ?>
				
				<div class="container">
					<div class="row">
<?php
            	$obj=&get_instance();
				$obj->load->model('UserModel');
 				$data = $obj->UserModel->ambil_data();
			?>

						<?php echo  form_open('UserController/terimabayar');?>
						<br>	
						<div class="col-md-5">
							<?= $this->session->flashdata('message'); ?>  
							<label>Atas Nama Rekening</label>
							<input type="text" name="an_rek" class="form-control" value="<?= $data['an_rek'] ?>">
							<small class="text-danger"><?= form_error('an_rek') ?></small>
							<label>Bank</label>
							<select class="form-control" name="bank">
								<option>--Pilih Bank--</option>	
								<option value="BRI" 
									<?php if ($data['bank']=='BRI'): ?>
										<?php echo "selected"?>
									<?php endif ?>
								>BRI</option>
								<option value="BNI"
								<?php if ($data['bank']=='BNI'): ?>
										<?php echo "selected"?>
								<?php endif ?>
								>BNI</option>
								<option value="Mandiri"
								<?php if ($data['bank']=='Mandiri'): ?>
										<?php echo "selected"?>
								<?php endif ?>
								>Mandiri</option>
								<option value="BCA"
								<?php if ($data['bank']=='BCA'): ?>
										<?php echo "selected"?>
								<?php endif ?>
								>BCA</option>
							</select>
							<small class="text-danger"><?= form_error('bank') ?></small>
							<label>No Rekening</label>
							<input type="number" class="form-control" name="no_rek" 
								<?php if ($data['no_rek']== 0): ?>
									value=""
								<?php else: ?>
									value="<?= $data['no_rek'] ?>"
								<?php endif ?>
							>
							<small class="text-danger"><?= form_error('no_rek') ?></small>
						</div>
						
						<div class="col-md-12">
							<button class="btn btn-success" type="submit">Simpan</button>
						</div>
						</form>
					
				</div>
			</div>
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
