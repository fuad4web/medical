<?php 
   include 'section/header.php';
?>


               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Admin Management <i class="fa fa-bed blue_color text-blue"></i></h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="heading1 margin_0">
                           <h2> <a href="#adddoctor" data-target="#adddoctor" data-toggle="modal" style="color:green;" class="small-box-footer"><i class="fa fa-plus-square blue_color text-blue"></i> Add More Illness</a></h2>
                           
                        <?php 
                           if(isset($_POST['addillness'])) {
                              $illness = $_POST['illnessss'];
                              if(!empty($illness)) {
                                 if($getFromU->checkIllness($illness) == true) {
                                    echo '<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Illness Existing</div>';
                                 } else {
                                    $getFromU->create('illnesses', array('illness_name' => $illness));
                                    echo '<div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Added Successfully</div>';
                                 }
                              }
                           }

                           if(isset($_POST['delete_illness'])) {
                              $illness_id = $_POST['illnessuid'];
                              $getFromU->deleteIllness($illness_id);
                           }
                        ?>
 
                        </div>
                        
                        <div class="table_section padding_infor_info">
                                  <div class="table-responsive-sm"><b>Illness List</b>
                                     <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                           <tr>
                                              <th>S/N</th>
                                              <th>Illness Name</th>
                                              <th>Action</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                             $all_illness = $getFromU->listIllness();
                                             $i = 0;
                                             foreach($all_illness as $an_illness):
                                                $i++;
                                           ?>
                                           
                                           <tr>
                                              <form method="POST">
                                                 <input type="hidden" name="illnessuid" value="<?=$an_illness->id?>">
                                                <td><?=$i?></td>
                                                <td><?=$an_illness->illness_name?></td>
                                                <td><span class="badge badge-info p-1">
                                             
                                                   <!-- <a href="#updateordinance" style="color:red;" class="small-box-footer"><i class="fa fa-edit red_color fa-1x text-blue"></i></a>
                                                   &nbsp;&nbsp; -->
                                                   <button onclick="confirm('Are you sure you want to delete this away from Record?') || event.stopImmediatePropagation()" type="submit" name="delete_illness" class="btn btn-primary"><i class="fa fa-trash-o red_color text-blue fa-1x"></i></button>

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
                        

      <div id="adddoctor" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
         <div class="modal-dialog">
            <div class="modal-content" style="height:auto">
               <div class="modal-header"><h3 style="font-family:san-serif; color:green;">Add Illness</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title"></h4>
               </div>
               <div class="modal-body">
                  <form class="form-horizontal" method="post" action="" enctype='multipart/form-data'>
                     <div class="form-group">
                        <div class="col">
                           <label for="exampleFormControlInput1" class="form-label">Name of Drug</label>
                           <input type="text" class="form-control" name="illnessss" placeholder="Illness Name" id="exampleFormControlInput1" required >
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" name="addillness" class="btn btn-primary"><i class="fa fa-plus white_color text-blue"></i> Add</button>
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
