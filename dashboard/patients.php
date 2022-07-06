<?php 
   include 'section/header.php';
?>

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Patient Management <i class="fa fa-bed blue_color text-blue"></i></h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                               <div class="full graph_head">
                                  <div class="heading1 margin_0">
                                     <!-- <h2> <a href="#adddoctor" data-target="#adddoctor" data-toggle="modal" style="color:green;" class="small-box-footer"><i class="fa fa-plus-square blue_color text-blue"></i> Add</a></h2> -->
                                  </div>
                                  
                               </div>
                               
                               <div class="table_section padding_infor_info"> 
                                   
                               <?php 
                                 if(isset($_POST['delete_patient'])) {
                                    $id = $_POST['pateee'];
                                    $oyadelete = $getFromU->deleteSomeone($id);
                                    if($oyadelete == false) {
                                       echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Deleted Successfully</div>';
                                    }
                                 }
                               ?>
                               
                                  <div class="table-responsive-sm"><b>Patient List</b>
                                  <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                           <tr>
                                              <th>S/N</th>
                                              <th>Image</th>
                                              <th>Email Address</th>
                                              <th>Patient Name</th>
                                              <th>Patient Phone No</th>
                                              <th>Marital Status</th>
                                              <th>Gender</th>
                                              <th>Action</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                             $all_patients = $getFromU->listPatient();
                                             $i = 0;
                                             foreach($all_patients as $all_patient):
                                                $i++;
                                           ?>
                                           <form method="POST">
                                             <tr>
                                                   <input type="hidden" name="pateee" value="<?=$all_patient->id?>">
                                                <td><?=$i?></td>
                                                <td><img src="profileImage/<?=$all_patient->profile_pic?>" width="35" height="35" class="rounded-circle" alt="<?=$all_patient->othername?>"></td>
                                                <td><?=$all_patient->email?></td>
                                                <td>
                                                   <?php if($all_patient->gender == 'Male') {
                                                   echo 'Mr '.$all_patient->firstname;
                                                   } elseif($all_patient->gender == 'Female') {
                                                      echo 'Mrs '.$all_patient->firstname;
                                                   } else {
                                                      echo 'Animal';
                                                   } ?>
                                                </td>
                                                <td><?=$all_patient->contact?></td>
                                                <td><?=$all_patient->marital_status?></td>
                                                <td><?=$all_patient->gender?></td>
                                                <?php 
                                                   if($user->account_type == 'doctor') {
                                                ?>
                                                <td><a href="chat?user_id=<?=$all_patient->id?>"><span class="badge badge-danger text-white p-1">Chat</span></a></td>
                                                <?php } else { ?>
                                                   <td><span class="badge badge-info p-1">
                                                      <button onclick="confirm('Are you sure you want to delete this away from Record?') || event.stopImmediatePropagation()" type="submit" name="delete_patient" class="btn btn-primary"><i class="fa fa-trash-o red_color text-blue fa-1x"></i></button>
                                                   </span></td>
                                                <?php } ?>
                                             </tr>
                                           </form>
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
                     
                     
 <div id="adddoctor" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
     <div class="modal-content" style="height:auto">
               <div class="modal-header"><h3 style="font-family:san-serif; color:green;">Add Doctor</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title"></h4>
               </div>
               <div class="modal-body">
         <form class="form-horizontal" method="post" action="" enctype='multipart/form-data'>
         <div class="form-group">
            <div class="row">
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Email address</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" required >
               </div>
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Password</label>
                  <input type="password" class="form-control" id="exampleFormControlInput1" required>
               </div>
             </div>

             <div class="row">
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Name</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" required>
               </div>
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Phone No</label>
                  <input type="number" class="form-control" id="exampleFormControlInput1" required>
               </div>
             </div>



             <div class="row">
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Address</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" >
               </div>
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Date Of Birth</label>
                  <input type="date" class="form-control" id="exampleFormControlInput1" >
               </div>
             </div>

             <div class="row">
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Degree</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" >
               </div>
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Doctor Speciality</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" >
               </div>
             </div>

             <div class="row">
               <div class="col">
                  <label for="formFileSm" class="form-label">Doctor Image <Picture></Picture></label>
                  <input class="form-control form-control-sm" id="formFileSm" type="file">
               </div>
               
             </div>

 
         </div>
               <div class="modal-footer">
     <button type="submit" name="del" class="btn btn-primary"><i class="fa fa-plus white_color text-blue"></i> Add</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
         </form>
             </div>
       
         </div><!--end of modal-dialog-->
  </div>
  <!--end of modal--> 
 
 
                     
                  </div>

                  <?php
                     include 'section/footer.php';
                  ?>
