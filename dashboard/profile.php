<?php 
   include 'section/header.php';
?>

        <!-- dashboard inner -->
        <div class="midde_cont">
            <div class="container-fluid">
                <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Profile <i class="fa fa-cog blue_color text-blue"></i></h2>
                    </div>
                </div>
                </div>
                <div class="row column1">
                
                <!-- table section -->
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2> <a href="#updateordinance" data-target="#updateordinance" data-toggle="modal" style="color:green;" class="small-box-footer"> My Profile</a></h2>
                            </div>

                        <?php 
                            if(isset($_POST['upload'])) {
                                if(isset($_FILES['image'])) {
                                    if(!empty($_FILES['image']['name'][0])) {
                                        $fileRoot = $getFromU->uploadImage($_FILES['image']);
                                        $upda = $getFromU->query("UPDATE users set profile_pic = '$fileRoot' where id = '$user->id'");
                                        if($upda == true) {
                                            echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Profile Picture Updated Successfully</div>';
                                            echo '<script>window.location="profile"</script>';
                                        } else {
                                            echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Network Issue</div>';
                                        }
                                    }
                                }
                            }
                            if(isset($_POST['remove'])) {
                                $upda = $getFromU->query("UPDATE users set profile_pic = 'deafultpics.jpg' where id = '$user->id'");
                                if($upda == true) {
                                    echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Profile Picture Successfully Remove</div>';
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Network Issue</div>';
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
                                            <label for="exampleFormControlInput1" class="form-label">Profile Picture</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="col mt-4">
                                            <button type="submit" class="btn btn-success" name="upload">Upload Picture</button>
                                            <button class="btn btn-danger" name="remove">Remove</button>
                                        </div>
                                    </div>
                                    
                                </form>

                                <div class="row my-3">
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                                        <input type="text" class="form-control" value="<?=$user->firstname?>" name="fullname" id="exampleFormControlInput1" required readonly>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" name="email" value="<?=$user->email?>" class="form-control" id="exampleFormControlInput1" required readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                        <input type="number" name="contact" value="<?=$user->contact?>" class="form-control" id="exampleFormControlInput1" required readonly>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                                        <input type="text" name="password" value="<?=$user->account_type?>" class="form-control" id="exampleFormControlInput1" required readonly>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <?php 
                                            if($user->account_type == 'doctor') {
                                        ?>
                                        <label for="exampleFormControlInput1" class="form-label">Specialty</label>
                                        <input type="text" name="specialty" value="<?=$user->specialty?>" class="form-control" id="exampleFormControlInput1" required readonly>
                                        <?php 
                                            } else {
                                        ?>
                                        <label for="exampleFormControlInput1" class="form-label">Marital Status</label>
                                        <input type="text" name="specialty" value="<?=$user->marital_status?>" class="form-control" id="exampleFormControlInput1" required readonly>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Gender</label>
                                        <input class="form-control form-control-sm" value="<?=$user->gender?>" name="gender" id="formFileSm" type="text" required readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div>

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
