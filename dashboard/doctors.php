<?php 
   include 'section/header.php';
?>

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Doctor Management <i class="fa fa-bed blue_color text-blue"></i></h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                               <div class="full graph_head">
                                  <div class="heading1 margin_0">
                                     <h2> <a href="#adddoctor" data-target="#adddoctor" data-toggle="modal" style="color:green;" class="small-box-footer"><i class="fa fa-plus-square blue_color text-blue"></i> Add</a></h2>
                                  </div>
                                  
                               </div>

                               <div class="table_section padding_infor_info">
                                  
                               <?php 
                                 if(isset($_POST['delete_doctor'])) {
                                    $id = $_POST['docee'];
                                    $oyadelete = $getFromU->deleteSomeone($id);
                                    if($oyadelete == false) {
                                       echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Deleted Successfully</div>';
                                    }
                                 }
                               ?>
                               
                                  <div class="table-responsive-sm"><b>Doctor List</b>
                                     <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                           <tr>
                                              <th>S/N</th>
                                              <th>Image</th>
                                              <th>Doctor Name</th>
                                              <th>Email Address</th>
                                              <th>Doctor Phone No</th>
                                              <th>Doctor Speciality</th>
                                              <th>Gender</th>
                                              <th>Action</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                             $all_doctors = $getFromU->listDoctor();
                                             $i = 0;
                                             foreach($all_doctors as $all_doctor):
                                                $i++;
                                           ?>
                                           <tr>
                                              <form method="POST">
                                                 <input type="hidden" name="docee" value="<?=$all_doctor->id?>">
                                                <td><?=$i?></td>
                                                <td><img width="30" height="30" src="profileImage/<?=$all_doctor->profile_pic?>" class="rounded-circle" alt=""></td>
                                                <td>Dr <?=$all_doctor->firstname?></td>
                                                <td><?=$all_doctor->email?></td>
                                                <td><?=$all_doctor->contact?></td>
                                                <td><?=$all_doctor->specialty?></td>
                                                <td><?=$all_doctor->gender?></td>
                                                <td><span class="badge badge-info p-1">
                                                   <button onclick="confirm('Are you sure you want to delete this away from Record?') || event.stopImmediatePropagation()" type="submit" name="delete_doctor" class="btn btn-primary"><i class="fa fa-trash-o red_color text-blue fa-1x"></i></button>
                                                </span></td>
                                              </form>
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
