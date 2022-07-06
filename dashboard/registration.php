<?php 
   include 'section/header.php';
?>

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Registration <i class="fa fa-cog blue_color text-blue"></i></h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        
                        <!-- table section -->
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                               <div class="full graph_head">
                                  <div class="heading1 margin_0">
                                     <h2> <a href="#updateordinance" data-target="#updateordinance" data-toggle="modal" style="color:green;" class="small-box-footer"><i class="fa fa-edit green_color text-blue"></i> Update</a></h2>
                                  </div>

                                  <?php 
                                    if(isset($_POST['reg'])) {
                                       $name = $_POST['fullname'];
                                       $email = $_POST['email'];
                                       $contact = $_POST['contact'];
                                       $password = md5($_POST['password']);
                                       $specialty = $_POST['specialty'];
                                       $gender = $_POST['gender'];
                                       $status = $_POST['status'];
                                       if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                          echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Invalid Email Address</div>';
                                       } else {
                                          if($getFromU->checkMail($email) === true) {
                                             echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Email Address already used</div>';
                                           } else {
                                 
                                               if($getFromU->checkNumber($contact) === true) {
                                                echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Phone Number existing</div>';
                                               } else {
                                                if(isset($_FILES['image'])) {
                                                   if(!empty($_FILES['image']['name'][0])) {
                                                      $fileRoot = $getFromU->uploadImage($_FILES['image']);
                                                      $getFromU->create('users', array('firstname'=>$name, 'account_type'=>$status, 'paid' => 1, 'email'=>$email, 'password' => $password, 'gender'=>$gender, 'contact'=>$contact, 'specialty' => $specialty, 'profile_pic' => $fileRoot));
                                                      echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Registration Successful</div>';
                                                   }
                                                }
                                               }
                                          }
                                       }
                                    }
                                  ?>
                                  
                               </div>
                               <div class="table_section padding_infor_info">
                                  <div class="table-responsive-sm">
                                     <table id="example1" class="table table-bordered table-striped">
                                       <form method="POST" enctype="multipart/form-data">
                                          
                                       <div class="row my-3">
                                          <div class="col">
                                             <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                                             <input type="text" class="form-control" name="fullname" id="exampleFormControlInput1" required>
                                          </div>
                                          <div class="col">
                                             <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                             <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required>
                                          </div>
                                        </div>

                                        <div class="row mb-3">
                                          <div class="col">
                                             <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                             <input type="number" name="contact" class="form-control" id="exampleFormControlInput1" required>
                                          </div>
                                          <div class="col">
                                             <label for="exampleFormControlInput1" class="form-label">Password</label>
                                             <input type="password" name="password" class="form-control" id="exampleFormControlInput1" required>
                                          </div>
                                        </div>


                                        <div class="row mb-3">
                                          <div class="col">
                                             <label for="exampleFormControlInput1" class="form-label">Specialty</label>
                                             <select name="specialty" id="" class="form-control" id="specialty" required>
                                                <option value="">Specialty</option>
                                                <?php 
                                                   $all_specialties = $getFromU->listSpecialty();
                                                      foreach($all_specialties as $all_specialty):
                                                ?>
                                                <option value="<?=$all_specialty->specialty ?>"><?=$all_specialty->specialty ?></option>
                                                <?php 
                                                   endforeach;
                                                ?>
                                             </select>
                                          </div>
                                          <div class="col">
                                             <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Image</label>
                                                <input class="form-control form-control-sm" name="image" id="formFileSm" type="file" required>
                                              </div>
                                          </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                          <div class="col">
                                             <label for="exampleFormControlInput1" class="form-label">Gender</label>
                                             <select name="gender" id="" class="form-control" required>
                                                <option value=""></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                             </select>
                                          </div>
                                          <div class="col">
                                             <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Status</label>
                                                <select name="status" id="" class="form-control" required>
                                                   <option value=""></option>
                                                   <option value="doctor">Doctor</option>
                                                   <option value="admin">Admin</option>
                                                </select>
                                              </div>
                                          </div>
                                        </div>
                                          <center>
                                             <button class="btn btn-info" type="submit" name="reg">Register</button>
                                          </center>
                                        
                                        <div>

                                       </form>
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
