<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['ChatModel','OuthModel','UserModel']);
		$this->SeesionModel->not_logged_in();
		$this->load->helper('string');
	}
	public function index(){
		
		$data['strTitle']='';
		$data['strsubTitle']='';
		$list=[];
		if($this->session->userdata['Admin']['role'] == 'Client_cs'){
			$list = $this->UserModel->VendorsList();
			$data['strTitle']='Semua Penjual';
			$data['strsubTitle']='Penjual';
			$data['chatTitle']='Pilih Obrolan dengan Penjual';
		}else{
			$list = $this->UserModel->ClientsListCs();
			$data['strTitle']='Semua Pembeli';
			$data['strsubTitle']='Pembeli';
			$data['chatTitle']='Pilih Obrolan dengan Pembeli';

		}
		$vendorslist=[];
		foreach($list as $u){
			$vendorslist[]=
			[
				'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
				'name' => $u['name'],
				'picture_url' => $this->UserModel->PictureUrlById($u['id']),
			];
		}
		$data['vendorslist']=$vendorslist;

		$this->parser->parse('construction_services/chat_template',$data);
	}

	public function fetch(){
		$list=[];
		if($this->session->userdata['Admin']['role'] == 'Client_cs'){
			$list = $this->UserModel->VendorsList();
		}else{
			$list = $this->UserModel->ClientsListCs();
		}
		$vendorslist=[];
		// foreach($list as $u){
		// 	$vendorslist[]=
		// 	[
		// 		'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
		// 		'name' => $u['name'],b
		// 		'picture_url' => $this->UserModel->PictureUrlById($u['id']),
		// 	];
		// }
		// $data['vendorslist']=$vendorslist;
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data1 = $this->ChatModel->fetch_data1($query);
		$data = $this->ChatModel->fetch_data($query);
		$output .= '
		<script src="'.base_url("public/chat/chat.js").'"></script>
		<div class="box-body no-padding carousel-inner" id="result" role="listbox" style="height:307px; overflow:  auto;" >
		<ul class="media-list clearfix">
		';
		if ($data1->num_rows() > 0){
			foreach($data as $u){
				$output .= '
				
				<a class="" href="#">
				<li class="media listuser selectVendor" id="'.$this->OuthModel->Encryptor('encrypt', $u['id']).'" title="'.$u['name'].'" >
				<div class="media-left">
				<a href="#" >
				
				<img width="50px" src="'.$this->UserModel->PictureUrlById($u['id']).'" alt="'.$u['name'].'" title="'.$u['name'].'">
				
				</a>
				</div>
				
				<div class="media-body">
				<h4 class="judul-utama">'.$u['name'].'<small> ('.$u['username'].')</small></h4>

				</div>
				</li>
				</a>
				';

			}

		}
		else{
			$output .='<li>
			<a class="users-list-name" href="#">No Data Found...</a>
			</li>';
		}
		$output .= '</ul>
          	</div>';
		echo $output;
	}
	
	public function send_text_message(){
		$post = $this->input->post();
		$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
			$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];

		}else{
			$messageTxt = reduce_multiples($post['messageTxt'],' ');
		}	

		$data=[
			'sender_id' => $this->session->userdata['Admin']['id'],
			'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']),
			'message' =>   $messageTxt,
			'attachment_name' => $attachment_name,
			'file_ext' => $file_ext,
			'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
				];

				$query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}

				echo json_encode($response);
			}
			public function ChatAttachmentUpload(){


				$file_data='';
				if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
					$config['upload_path']          = './uploads/attachment';
					$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('attachmentfile'))
					{
						echo json_encode(['status' => 0,
							'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
					}
					else
					{
						$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
						return $file_data;
					}
				}

			}

			public function get_chat_history_by_vendor(){
				$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );

				$Logged_sender_id = $this->session->userdata['Admin']['id'];

				$history = $this->ChatModel->GetReciverChatHistory($receiver_id);
		//print_r($history);
				foreach($history as $chat):

					$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
					$sender_id = $chat['sender_id'];
					$userName = $this->UserModel->GetName($chat['sender_id']);
					$userPic = $this->UserModel->PictureUrlById($chat['sender_id']);

					$message = $chat['message'];
					$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));

					?>
					<?php
					$messageBody='';
            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
            		$classBtn = 'right';
            		if($Logged_sender_id==$sender_id){$classBtn = 'left';}

            		$attachment_name = $chat['attachment_name'];
            		$file_ext = $chat['file_ext'];
            		$mime_type = explode('/',$chat['mime_type']);

            		$document_url = base_url('uploads/attachment/'.$attachment_name);

            		if($mime_type[0]=='image'){
            			$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
            		}else{
            			$messageBody='';
            			$messageBody.='<div class="attachment">';
            			$messageBody.='<h4>Attachments:</h4>';
            			$messageBody.='<p class="filename">';
            			$messageBody.= $attachment_name;
            			$messageBody.='</p>';

            			$messageBody.='<div class="pull-'.$classBtn.'">';
            			$messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
            			$messageBody.='</div>';
            			$messageBody.='</div>';
            		}


            	}else{
            		$messageBody = $message;
            	}
            	?>



            	<?php if($Logged_sender_id!=$sender_id){?>     
            		<!-- Message. Default to the left -->
            		<div class="direct-chat-msg">
            			<div class="direct-chat-info clearfix">
            				<span class="direct-chat-name pull-left"><?=$userName;?></span>
            				<span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>
            			</div>
            			<!-- /.direct-chat-info -->
            			<img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
            			<!-- /.direct-chat-img -->
            			<div class="direct-chat-text">
            				<?=$messageBody;?>
            			</div>
            			<!-- /.direct-chat-text -->

            		</div>
            		<!-- /.direct-chat-msg -->
            	<?php }else{?>
            		<!-- Message to the right -->
            		<div class="direct-chat-msg right">
            			<div class="direct-chat-info clearfix">
            				<span class="direct-chat-name pull-right"><?=$userName;?></span>
            				<span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>
            			</div>
            			<!-- /.direct-chat-info -->
            			<img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
            			<!-- /.direct-chat-img -->
            			<div class="direct-chat-text">
            				<?=$messageBody;?>
                          	<!--<div class="spiner">
                             	<i class="fa fa-circle-o-notch fa-spin"></i>
                             </div>-->
                         </div>
                         <!-- /.direct-chat-text -->
                     </div>
                     <!-- /.direct-chat-msg -->
                 <?php }?>

                 <?php
             endforeach;

         }
         public function chat_clear_client_cs(){
         	$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );

         	$messagelist = $this->ChatModel->GetReciverMessageList($receiver_id);

         	foreach($messagelist as $row){

         		if($row['message']=='NULL'){
         			$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
         		}
         	}

         	$this->ChatModel->TrashById($receiver_id); 


         }


     }