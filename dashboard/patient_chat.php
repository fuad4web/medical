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
                                     <h2><i class="fa fa-list blue_color text-blue"></i> Doctors List</a></h2>
                                  </div>
                                  
                               </div>
                               
                               <div class="table_section padding_infor_info">
                                  <div class="table-responsive-sm"><b>Doctor List</b>
                                     <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                           <tr>
                                              <th>S/N</th>
                                              <th>Doctor Name</th>
                                              <th>Speciality</th>
                                              <th>Action</th>
                                           </tr>
                                        </thead>
                                        <tbody>

                                           <?php 
                                             $allDoctor = $getFromU->listDoctor();
                                             $i = 0;
                                             foreach($allDoctor as $listDoctor):
                                                $i++
                                           ?>

                                           <tr>
                                              <td><?=$i?></td>
                                              <td>Dr&nbsp;<?=$listDoctor->firstname?></td>
                                              <td><?=$listDoctor->specialty?></td>
                                              <td>
                                                 <!-- <a href="#book" data-target="#book" data-toggle="modal"   style="color:white;"  class="small-box-footer badge bg-success">Book Appointment</a> -->
                                                 <a href="chat?user_id=<?php echo $listDoctor->id ?>" class="btn btn-primary"><i class="fa fa-comment"></i>&nbsp;Chat</a>
                                            </td>
                                           </tr>

                                           <?php 
                                             endforeach;
                                           ?>

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
