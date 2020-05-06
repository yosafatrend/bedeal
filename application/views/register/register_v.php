
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="icon" href="<?=base_url('public');?>/assets/img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?=base_url('public');?>/assets/scss/bootstrap.css">
  <link rel="stylesheet" href="<?=base_url('public');?>/assets/css/master-register.css">
</head>
<body class="bg-light text-poppins" id="bg">
  <div class="container-fluid">
    <div class="wrapper">

      <div class="card roundless drop-shadow">
        <div class="row">
          <div class="col d-none d-md-block pr-0">
            <div class="bg-interview h-100 bg-dark">
              <table style="height: 100%; width: 100%;">
                <tbody>
                  <tr>
                    <td class="align-middle text-center">
                      <img width="200px" src="<?=base_url('public');?>/assets/img/handshake.png">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col pl-md-0">
            <div class="container py-4 px-4">
              <p class="h3 text-center mb-5">Daftar Member</p>
              <?php echo  form_open('UserController/regist');?>
              <input class="form-control reg-form border-bottom mb-4" name="full_name" type="text" placeholder="Nama Lengkap" value="<?= set_value('full_name'); ?>">
              <small class="text-danger"><?= form_error('full_name') ?></small>
              <input class="form-control reg-form border-bottom mb-4" name="username" type="text" placeholder="Username" value="<?= set_value('username'); ?>">
              <small class="text-danger"><?= form_error('username') ?></small>
              <input class="form-control reg-form border-bottom mb-4" name="address" type="text" placeholder="Alamat" value="<?= set_value('address'); ?>">
              <small class="text-danger"><?= form_error('address') ?></small>
              <input class="form-control reg-form border-bottom mb-4" name="email" type="text" placeholder="Email" value="<?= set_value('email') ?>">
              <small class="text-danger"><?= form_error('email') ?></small>
              <input class="form-control reg-form border-bottom mb-4" name="password1" type="password" placeholder="Password">
              <small class="text-danger"><?= form_error('password1') ?></small>
              <input class="form-control reg-form border-bottom mb-3" name="password2" type="password" placeholder="Konfirmasi Password">
              <small class="text-info">opsi ini bisa diubah sewaktu-waktu</small>
              <select class="form-control reg-form border-bottom mb-4" name="as">
                <option value="">---Pilih Peran Anda---</option>
                <option value="Vendor">Penjual</option>
                <option value="Client_cs">Pembeli</option>
              </select>
              <small class="text-danger"><?= form_error('as') ?></small>
              <a href="<?=base_url();?>login">Sudah punya akun? Masuk disini.</a>
              <button class="mt-3 btn btn-success btn-block text-white roundmax" type="submit">JOIN</button>
            </form>

          </div>  
        </div>
      </div>
    </div>

  </div>
</div>

<!-- js -->
<script type="text/javascript" src="<?=base_url('public');?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url('public');?>/assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="<?=base_url('public');?>/assets/js/reg.js"></script>
</body>
</html>
