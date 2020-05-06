<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('include/header');?>
<style>
	.fileDiv {
    position: relative;
    overflow: hidden;
  }
  .box-body{
    /*margin-bottom: 30px !important;*/
  }
  .listuser{
    padding: 10px;
    margin: 2px;
    padding-bottom: 2px;
    background-color: #f9f9f9;
  }
  .listuser:hover{
    background-color: #f6f6f6;
  }
  .bayar{
    padding: 5px;
    padding-left: 13px; 
    padding-right: 13px; 
    padding-bottom: 4px;
    padding-top: 4px;
    font-size: 13px;
    margin-right: 10px;
  }
  .upload_attachmentfile {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
  }
  .btnFileOpen {margin-top: -50px; }

  .direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
    text-align: right;
  }
  .direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
    text-align: right;
  }
  .spiner{}
  .spiner .fa-spin { font-size:24px;}
  .attachmentImgCls{ width:200px; margin-left: -25px; cursor:pointer; }
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



      <!-- Main content -->

      <section class="content">
       <div class="row">



        <div class="col-md-8" id="chatSection">
          <!-- DIRECT CHAT -->
          <div class="box box-warning direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

              <div class="box-tools pull-right">
                <?php if ($this->session->userdata['Admin']['role']=='Client_cs'): ?>
                 <a href="<?= base_url('bayar') ?>" class="btn btn-success btn-flat btn-small bayar">Bayar</a>
                <?php endif ?>
                <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-trash"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                            <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                   </button>-->
                 </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="content">
                 <!-- /.direct-chat-msg -->

                 <div id="dumppy" class="dumppy"></div>

               </div>
               <!--/.direct-chat-messages-->

             </div>
             <!-- /.box-body -->
             <div class="box-footer">
              <!--<form action="#" method="post">-->
                <div class="input-group">
                 <?php
                 $obj=&get_instance();
                 $obj->load->model('UserModel');
                 $profile_url = $obj->UserModel->PictureUrl();
                 $user=$obj->UserModel->GetUserData();
                 ?>

                 <input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
                 <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">

                 <input type="hidden" id="ReciverId_txt">
                 <input type="text" name="message" placeholder="Type Message ..." class="form-control message" disabled="true">
                 <span class="input-group-btn">
                   <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                   <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                     <input type="file" name="file" class="upload_attachmentfile" disabled="true" /></div>
                   </span>
                 </div>
                 <!--</form>-->
               </div>
               <!-- /.box-footer-->
             </div>
             <!--/.direct-chat -->
           </div>




           <div class="col-md-4">
            <!-- USERS LIST -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><?=$strTitle;?></h3>

                <div class="box-tools pull-right">
                  <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="form-group">
                <div class="input-group">
                 <span class="input-group-addon">Cari</span>
                 <input type="text" name="search_text" id="search_text" placeholder="Masukkan nama.." class="form-control" />
               </div>
             </div>
             <div id="result"></div>
             <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>

          <!-- /.row --> 



        </section>

        <!-- /.content --> 

      </div>

      <!-- /.content-wrapper --> 

      <!-- Modal -->
      <div class="modal fade" id="myModalImg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
            </div>

            <!-- Modal footer -->


          </div>
        </div>
      </div>
      <!-- Modal -->

      <?php $this->load->view('include/footer');?>
      <script src="<?=base_url('public/chat/chat.js');?>"></script> 



    </body>
    </html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script>

      $(document).ready(function(){

       load_data();
       function load_data(query)
       {
          $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    })
        $.ajax({
          
          url:"<?= base_url('s/ChatController/fetch'); ?>",
          headers: {'AuthKey': '<?=$this->security->get_csrf_hash();?>'},
          method:"POST",
          data:{query:query},       
          success:function(data){
            $('#result').html(data);
          },
          
          error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText); // munculkan alert
      }
    })

      }

      $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
         load_data(search);
       }
       else
       {
         load_data();
       }
     });
})

  </script>