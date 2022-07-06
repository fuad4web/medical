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
                                     <h2><i class="fa fa-list blue_color text-blue"></i> My Appointment</a></h2>
                                  </div>
                                  
                               </div>
                               
                               <div class="table_section padding_infor_info">
                                  <div class="table-responsive-sm"><b>Doctor List</b>
                                     <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                           <tr>
                                              <th>S/N</th>
                                              <th>Complaint No.</th>
                                              <th>Doctor Name</th>
                                              <th>My Complain</th>
                                              <th>Doctor Reply</th>
                                              <th>Complaint Status</th>
                                              <th>Complaint Date</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                             $myComplaints = $getFromU->patientComplaints($user_id);
                                             $i = 0;
                                             foreach($myComplaints as $myComplaint):
                                                $i++
                                           ?>

                                           <tr>
                                              <td><?=$i++?></td>
                                              <td><?= $myComplaint->c_id ?></td>
                                              <td><?= $myComplaint->firstname.' '.$myComplaint->othername ?></td>
                                              <td>
                                                 <textarea name="" id="" cols="25" class="form-control" rows="5"><?= $myComplaint->fullcomplain?></textarea>
                                              </td>
                                              <td>
                                                 <textarea name="" id="" cols="25" class="form-control" rows="5"><?= $myComplaint->doctor_reply?></textarea>
                                              </td>
                                              <td>
                                                 <?php 
                                                   if($myComplaint->replied == 0) {
                                                      echo '<a href="#book" style="color:white;" class="small-box-footer p-2 badge bg-danger">Pending</a>';
                                                   } else {
                                                      echo '<a href="#book" style="color:white;" class="small-box-footer p-2 badge bg-success">Replied</a>';
                                                   }
                                                 ?>
                                                
                                              </td>
                                              <td><?=$myComplaint->datecomplained?></td>
                                           </tr>

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
