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
                                    <!--  <h2> <a href="#adddoctor" data-target="#adddoctor" data-toggle="modal" style="color:green;" class="small-box-footer"><i class="fa fa-plus-square blue_color text-blue"></i> Add</a></h2> -->
                                  </div>
                                  
                               </div>
                               
                               <div class="table_section padding_infor_info">

                               <?php 
                                    if(isset($_POST['submit'])) {
                                       $ill = $_POST['illness'];
                                       $prescription = $_POST['prescription'];
                                       if(!empty($ill) && !empty($prescription)) {
                                          // $getFromU->updateIllness('illnesses', $ill, array('treatment' => $prescription));
                                          $upda = $getFromU->query("UPDATE illnesses set treatment = '$prescription' where id = '$ill'");
                                          if($upda) {
                                             echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Prescription Updated Successfully</div>';
                                          } else {
                                             echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Network Issue</div>';
                                          }
                                       } else {
                                          echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Fill in all Fields</div>';
                                       }
                                    }
                               ?>


                                  <div class="table-responsive-sm"><b>Add more Drugs and Advice for Patient to use</b>
                                  <br><br>
                                       
                                     <form method="POST">
                                        <label for="">Name of Illness</label><br>
                                       
                                        <select class="form-control custom-select select-form mb-5" name="illness" id="myissues">
                                             <option value=""></option>
                                          <?php 
                                             $all_illness = $getFromU->listIllness();
                                             foreach($all_illness as $an_illness):
                                          ?>
                                             <option value="<?=$an_illness->id?>"><?=$an_illness->illness_name?></option>
                                          <?php endforeach; ?>
                                          </select>
                                        <br><br>
                                        <label for="">Prescription</label>
                                        
                                        <textarea name="prescription" class="form-control p-3" id="doc_prescription" cols="30" rows="10" required>
                                        </textarea>
                                             
                                        <br>
                                        <center><button type="submit" name="submit" class="btn btn-info">Submit</button></center>
                                     </form>
                                  </div>
                               </div>
                            </div>
                         </div>

                         <p id=""></p>

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

