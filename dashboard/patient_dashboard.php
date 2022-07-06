<?php 
   include 'section/header.php';
   
?>          

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Patient Dashboard <i class="fa fa-bed blue_color text-blue"></i></h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                               <div class="full graph_head">
                                  <div class="heading1 margin_0">
                                     <h2><i class="fa fa-list blue_color text-blue"></i> Complains</a></h2>
                                     <p>Let us know your Illness and we will prescribe some Drug to you</p>
                                  </div>
                                  
                               </div>
                               
                            </div>
                         </div>
                     </div>
                     
                     <p>What illness are you having</p>
                     <div class="prescribe" style="margin: 15px auto;">

                     <form action="" method="POST">
                        <select class="form-control custom-select select-form mb-5" name="myissues" id="myissues">
                           <option value="">Choose Illness</option>
                           <?php 
                              $all_illness = $getFromU->listIllness();
                              foreach($all_illness as $an_illness):
                           ?>
                              <option value="<?=$an_illness->id?>"><?=$an_illness->illness_name?></option>
                           <?php 
                              endforeach;
                           ?>
                        </select>
                     </form>

                        </div>
                        <br>
                        <h5>Drug Prescription</h5>

                        <p id="doc_prescription"></p>

                     <br><br><br>
                     <center>
                        If you still have a complain please click here&nbsp;&nbsp;<button type="button" class="btn btn-primary lodgeComplain">Lodge Complain</button>
                        <br><br><br>

                        <?php 

                           if(isset($_POST['subcomplain'])) {

                              $fullComplain = $_POST['full_complain'];

                              if(!empty($fullComplain)) {
                                 $getFromU->create('complaints', array('user_id'=>$user_id, 'fullcomplain'=>$fullComplain));
                                 echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>We will reply to your complain as soon as possible</div>';
                              } else {
                                 echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please fill in your complain to the Complaint Box</div>';
                              }
                           }

                        ?>

                        <form action="" method="POST" class="fullcomplain-form" style="display: none;">
                           <textarea name="full_complain" id="" cols="50" class="p-2" rows="10"></textarea><br><br>
                           <button type="submit" name="subcomplain" class="btn btn-danger">Complain</button>
                        </form>
                        
                     </center>
                     
                  </div>
                  
   <?php 
      include 'section/footer.php';
   ?>
