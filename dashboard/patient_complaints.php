<?php 
   include 'section/header.php'; 
?>

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">

                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Doctor Dashboard <i class="fa fa-bed blue_color text-blue"></i></h2>
                           </div>
                        </div>
                     </div>

                     <div class="row column1">
                        
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                               <div class="full graph_head">
                                  <div class="heading1 margin_0">
                                     <h2><i class="fa fa-list blue_color text-blue"></i> Patients Complaints</a></h2>
                                  </div>
                                  
                               </div>

                               <?php 
                                 if(isset($_POST['doc_reply'])) {
                                    $myreply = $_POST['doctor_reply'];
                                    $reply = 1;
                                    $sender_name = $_POST['sender_name'];
                                    $numb = $_POST['complainnum'];

                                    if(!empty($myreply)) {
                                       $upda = $getFromU->query("UPDATE complaints set doctor_reply = '$myreply', doctor_id = '$user_id', replied = '$reply' where `user_id` = '$sender_name' AND c_id = '$numb'");
                                          if($upda) {
                                             echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Prescription Updated Successfully</div>';
                                          } else {
                                             echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Rubbish</div>';
                                          }
                                    }
                                 }
                               ?>
                               
                               <div class="table_section padding_infor_info">
                                  <div class="table-responsive-sm"><b>Complaints List</b>
                                     <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                           <tr>
                                              <th>S/N</th>
                                              <th>Complaint No.</th>
                                              <th>Patient Name</th>
                                              <th>Patient Complain</th>
                                              <th>My Reply</th>
                                              <th>Complaint Status</th>
                                              <th>Complaint Date</th>
                                              <th>Action</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                             $myComplaints = $getFromU->patientComplaintsDoc();
                                             // var_dump($myComplaints);
                                             $i = 0;
                                             foreach($myComplaints as $myComplaint):
                                                $i++
                                           ?>

                                           <form method="POST">

                                             <tr>
                                                <input type="hidden" name="sender_name" value="<?=$myComplaint->user_id?>">
                                                <input type="hidden" name="complainnum" value="<?=$myComplaint->c_id?>">
                                                <td><?=$i++?></td>
                                                <td><?= $myComplaint->c_id ?></td>
                                                <td><?= $myComplaint->firstname.' '.$myComplaint->othername ?></td>
                                                <td>
                                                   <textarea name="" id="" cols="25" class="form-control" rows="5"><?= $myComplaint->fullcomplain?></textarea>
                                                </td>
                                                <td>
                                                   <textarea name="doctor_reply" id="" cols="25" class="form-control" rows="5"><?= $myComplaint->doctor_reply?></textarea>
                                                </td>
                                                <td>
                                                   <?php 
                                                      echo '<a href="#book" style="color:white;" class="small-box-footer p-2 badge bg-danger">Pending</a>';
                                                   ?>
                                                   
                                                </td>
                                                <td><?=$myComplaint->datecomplained?></td>
                                                <td>
                                                   <button type="submit" class="btn btn-success" name="doc_reply">Send Reply</button>
                                                </td>
                                             </tr>

                                           </form>

                                           <?php endforeach; ?>
                                        </tbody>
                                     </table>
                                  </div>
                               </div>
                            </div>
                         </div>
                     </div>
                     
                     
                  </div>
                  
                  
   <?php 
      include 'section/footer.php';
   ?>
