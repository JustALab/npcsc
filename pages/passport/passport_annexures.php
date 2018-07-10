<?php session_start();
  include '../header_nav.php';
  include '../sidebar.php';
  include '../../services/constants.php';

  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <br />
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Annexures</h3>
      </div>
      <div class="card-body">
         <table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>S.No</th>
        <th>ANNEXURES CODE</th>
        <th>ANNEXURES / AFFIDAVIT</th>
        <th>Download</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>A</td>
        <td>Identity Certificate (Annexure "A")</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureA.pdf" download>Download</a>
      </tr>
      <tr>
        <td>2</td>
        <td>c</td>
        <td>Declaration of ParentGuardian for Minor Passports (one parent not given consent) (Annexure "C")</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureC.pdf" download>Download</a>
      </tr>
      <tr>
        <td>3</td>
        <td>D</td>
        <td>Declaration of ParentGuardian for Minor Passports (Annexure "D")</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureD.pdf" download>Download</a>
      </tr>
      <tr>
        <td>4</td>
        <td>E</td>
        <td> Standard Affidavit (Annexure "E")</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureE.pdf" download>Download</a>
      </tr>
      <tr>
        <td>5</td>
        <td>F</td>
        <td>Affidavit for a passport in lieu of lostdamaged passport (Annexure "F")</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureF.pdf" download>Download</a>
      </tr>
      <tr>
        <td>6</td>
        <td>G</td>
        <td>Prior Intimation Letter(Annexure "G"</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureG.pdf" download>Download</a>
      </tr>
      <tr>
        <td>7</td>
        <td>H</td>
        <td>A Declaration affirming the particulars furnished in the application about the minor. (Annexure "H")</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureH.pdf" download>Download</a>
      </tr>
      <tr>
        <td>8</td>
        <td>I</td>
        <td>No Objection Certificate (Annexure "I"</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AnnexureI.pdf" download>Download</a>
      </tr>
      <tr>
        <td>9</td>
        <td></td>
        <td>Authority Letter</td>
        <td><a href="<?php echo HOMEURL.'/services/'.PASSPORT_ANNEXURES_PATH; ?>AuthorityLetter.pdf" download>Download</a>
      </tr>
      
    </tbody>
  </table>
        
      </div>
      <!-- <div class="card-footer">
        </div> -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
  include '../footer_imports.php';
  ?>  
<script type="text/javascript"></script>
<?php 
  include '../footer.php';
  ?>