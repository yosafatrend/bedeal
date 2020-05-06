<div class="box-body no-padding carousel-inner" id="result" role="listbox" style="height:307px; overflow:  auto;" >

                <ul class="media-list clearfix">

                  <?php if(!empty($users)){
                    foreach($users as $v):
                      ?>
                      <a class="" href="#">
                        <li class="media listuser selectVendor" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                          <div class="media-left">
                            <a href="#">
                             <img width="50px" src="<?=$v['picture_url'];?>" alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                           </a>
                         </div>
                         <div class="media-body">
                          <h4 class="judul-utama"><?=$v['name'];?></h4>
                          
                        </div>
                      </li>
                    </a>



                  <?php endforeach;?>

                <?php }else{?>
                  <li>
                   <a class="users-list-name" href="#">Data tidak ada</a>
                 </li>
               <?php } ?>


             </ul>
             <!-- /.users-list -->
           </div>