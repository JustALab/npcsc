<?php 
   include '../header_nav.php';
   include '../sidebar.php';
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Apply New PAN</h3>
            <!-- <div class="card-tools">
               <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                 <i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                 <i class="fa fa-times"></i></button>
               </div> -->
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-sm-8 col-sm-offset-2">
                  <div class="form-group">
                     <label>Date :</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" id="date" name="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                     </div>
                     <!-- /.input group -->
                  </div>
                  <div class="form-group">
                     <label>Application type :</label>
                     <select id="application_type" name="application_type" class="form-control">
                        <option value="" selected="selected">Select</option>
                        <option value="New Application">New Application</option>
                        <option value="Correction/Change">Correction/Change</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Category of Applicant :</label>
                     <select class="form-control" id="applicant_category" name="applicant_category">
                        <option value="" selected="selected">Select</option>
                        <option value="Individual">Individual</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Applicant's title :</label>
                     <select class="form-control" id="applicant_title" name="applicant_title">
                        <option value="" selected="selected">Select</option>
                        <option value="Shri">Shri</option>
                        <option value="Smt/Mrs">Smt/Mrs</option>
                        <option value="Kumari/Ms">Kumari/Ms</option>
                        <option value="M/s">M/s</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Applicant Name :</label>
                     <div class="row">
                        <div class="col-4">
                           <input type="text" id="applicant_fname" name="applicant_fname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-4">
                           <input type="text" id="applicant_mname" name="applicant_mname" class="form-control" placeholder="Middle Name">
                        </div>
                        <div class="col-4">
                           <input type="text" id="applicant_lname" name="applicant_lname" class="form-control" placeholder="Last Name">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.card -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
 include '../footer_imports.php';
?>
<script type="text/javascript">
  $(function () {
     //Datemask dd/mm/yyyy
     $('#date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

  });
</script>
<?php 
 include '../footer.php';
?>