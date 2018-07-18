<?php session_start();
   if($_SESSION['user_type'] == 'ADMIN'){
     echo '<script>history.go(-1);</script>';
     exit();
   }
   include '../header_nav.php';
   include '../sidebar.php';
   include '../../services/constants.php';
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
   <!-- Default box -->
   <form id="gst_registration_form" name="gst_registration_form">
      <br />
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">GST Registration</h3>
            <div class="card-tools">
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label id="registration_type_label">Select Registration Type</label>
                     <select id="registration_type" name="registration_type" class="form-control required">
                        <option value=""  selected="selected">Select</option>
                        <option value="Proprietorship/Ownership Firm">Proprietorship/ Ownership Firm</option>
                        <option value="Partnership Firm">Partnership Firm</option>
                        <option value="Limited Liability Partnership">Limited Liability Partnership</option>
                        <option value="Private Limited Company">Private Limited Company</option>
                     </select>
                  </div>
               </div>
            </div>
            <div id="resgitration_type_fields_div">
               <div class="row" id="no_of_people_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="no_of_people_label">Number of Partners/ Directors</label>
                        <select id="no_of_people" name="no_of_people" class="form-control required">
                           <option value="2" selected="selected">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="authorised_person_name_label">Name of the Authorised Partner</label>
                        <input type="text" id="authorised_person_name" name="authorised_person_name" class="form-control required">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="authorised_person_phone_label">Phone Number of the Authorised Partner</label>
                        <input type="Number" id="authorised_person_phone" name="authorised_person_phone" class="form-control required">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="authorised_person_email_label">E-mail of the Authorised Partner</label>
                        <input type="email" id="authorised_person_email" name="authorised_person_email" class="form-control required">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="business_name_label">Name of the Partnership Firm</label>
                        <input type="text" id="business_name" name="business_name" class="form-control required">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="business_address_label">Address of the Partnership Firm</label>
                        <textarea class="form-control" rows="5" id="business_address" name="business_address"></textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="business_nature_label">Nature of Products or Services</label>
                        <input type="text" id="business_nature" name="business_nature" class="form-control required">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="business_description">Brief Description of the Business / Service</label>
                        <textarea class="form-control required" rows="5" id="business_description" name="business_description"></textarea>
                     </div>
                  </div>
               </div>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Upload Documents</th>
                        <th>PAN Card</th>
                        <th>Colour Photo</th>
                        <th>Select Address Proof of Partners</th>
                        <th>Upload Address Proof of Partners</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr id="row_1">
                        <td>Partner 1</td>
                        <td><input type="file" class="required" id="pan_card_1" name="pan_card_1" ></td>
                        <td><input type="file" class="required" id="colour_photo_1" name="colour_photo_1" ></td>
                        <td>
                           <select id="address_proof_type_1" name="address_proof_type_1" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_1" name="address_proof_1" ></td>
                     </tr>
                     <tr id="row_2">
                        <td>Partner 2</td>
                        <td><input type="file" class="required" id="pan_card_2" name="pan_card_2" ></td>
                        <td><input type="file" class="required" id="colour_photo_2" name="colour_photo_2" ></td>
                        <td>
                           <select id="address_proof_type_2" name="address_proof_type_2" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_2" name="address_proof_2" ></td>
                     </tr>
                     <tr id="row_3">
                        <td>Partner 3</td>
                        <td><input type="file" class="required" id="pan_card_3" name="pan_card_3" ></td>
                        <td><input type="file" class="required" id="colour_photo_3" name="colour_photo_3" ></td>
                        <td>
                           <select id="address_proof_type_3" name="address_proof_type_3" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_3" name="address_proof_3" ></td>
                     </tr>
                     <tr id="row_4">
                        <td>Partner 4</td>
                        <td><input type="file" class="required" id="pan_card_4" name="pan_card_4" ></td>
                        <td><input type="file" class="required" id="colour_photo_4" name="colour_photo_4" ></td>
                        <td>
                           <select id="address_proof_type_4" name="address_proof_type_4" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_4" name="address_proof_4" ></td>
                     </tr>
                     <tr id="row_5">
                        <td>Partner 5</td>
                        <td><input type="file" class="required" id="pan_card_5" name="pan_card_5" ></td>
                        <td><input type="file" class="required" id="colour_photo_5" name="colour_photo_5" ></td>
                        <td>
                           <select id="address_proof_type_5" name="address_proof_type_5" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_5" name="address_proof_5" ></td>
                     </tr>
                     <tr id="row_6">
                        <td>Partner 6</td>
                        <td><input type="file" class="required" id="pan_card_6" name="pan_card_6" ></td>
                        <td><input type="file" class="required" id="colour_photo_6" name="colour_photo_6" ></td>
                        <td>
                           <select id="address_proof_type_6" name="address_proof_type_6" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_6" name="address_proof_6" ></td>
                     </tr>
                     <tr id="row_7">
                        <td>Partner 7</td>
                        <td><input type="file" class="required" id="pan_card_7" name="pan_card_7" ></td>
                        <td><input type="file" class="required" id="colour_photo_7" name="colour_photo_7" ></td>
                        <td>
                           <select id="address_proof_type_7" name="address_proof_type_7" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_7" name="address_proof_7" ></td>
                     </tr>
                     <tr id="row_8">
                        <td>Partner 8</td>
                        <td><input type="file" class="required" id="pan_card_8" name="pan_card_8" ></td>
                        <td><input type="file" class="required" id="colour_photo_8" name="colour_photo_8" ></td>
                        <td>
                           <select id="address_proof_type_8" name="address_proof_type_8" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_8" name="address_proof_8" ></td>
                     </tr>
                     <tr id="row_9">
                        <td>Partner 9</td>
                        <td><input type="file" class="required" id="pan_card_9" name="pan_card_9" ></td>
                        <td><input type="file" class="required" id="colour_photo_9" name="colour_photo_9" ></td>
                        <td>
                           <select id="address_proof_type_9" name="address_proof_type_9" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_9" name="address_proof_9" ></td>
                     </tr>
                     <tr id="row_10">
                        <td>Partner 10</td>
                        <td><input type="file" class="required" id="pan_card_10" name="pan_card_10" ></td>
                        <td><input type="file" class="required" id="colour_photo_10" name="colour_photo_10" ></td>
                        <td>
                           <select id="address_proof_type_10" name="address_proof_type_10" class="form-control required">
                              <option value="" selected="selected">Select</option>
                              <option value="Voters ID" >Voters ID</option>
                              <option value="Driving License">Driving License</option>
                              <option value="Aadhaar Card">Aadhaar Card</option>
                              <option value="Passport">Passport</option>
                           </select>
                        </td>
                        <td><input type="file" class="required" id="address_proof_10" name="address_proof_10" ></td>
                     </tr>
                  </tbody>
               </table>
               <br>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="business_place_proof_label">Select Address Proof of Place of Business</label>
                        <select id="business_place_proof" name="business_place_proof" class="form-control required">
                           <option value="" selected="selected">Select</option>
                           <option value="Own Premises" >Own Premises</option>
                           <option value="Rent Premises">Rent Premises</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row" id="property_tax_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="property_tax_receipt_label">Property Tax Payment Receipt</label><br>
                        <input type="file" class="required" id="property_tax_receipt" name="property_tax_receipt" >
                     </div>
                  </div>
               </div>
               <div class="row" id="rental_agreement_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="rental_agreement_label">Rental Agreement</label><br>
                        <input type="file" class="required" id="rental_agreement" name="rental_agreement" >
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="eb_card_label">EB Card</label><br>
                        <input type="file" class="required" id="eb_card" name="eb_card" >
                     </div>
                  </div>
               </div>
               <div class="row" id="bank_document_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="bank_document_label">Bank Statement / Passbook Address Page / Cancelled Cheque Leaf</label>
                        <input type="file" class="required" id="bank_document" name="bank_document" >
                     </div>
                  </div>
               </div>
               <div class="row" id="tin_tax_certificate_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="tin_tax_certificate_label">TIN Certificate / Service Tax Certificate of existing business - if any</label>
                        <input type="file" class="required" id="tin_tax_certificate" name="tin_tax_certificate" >
                     </div>
                  </div>
               </div>
               <div class="row" id="certificate_incorporation_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="certificate_incorporation_label">Certificate of Incorporation</label><br>
                        <input type="file" class="required" id="certificate_incorporation" name="certificate_incorporation" >
                     </div>
                  </div>
               </div>
               <div class="row" id="authorisation_letter_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="board_resolution_format_label">Authorisation Letter in Specific Format (to be signed by minimum 2 partners)</label>
                        <input type="file" class="required" id="authorisation_letter" name="authorisation_letter" >
                     </div>
                  </div>
               </div>
               <div class="row" id="partnership_deed_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="partnership_deed_label">Partnership Deed </label><br>
                        <input type="file" class="required" id="partnership_deed" name="partnership_deed" >
                     </div>
                  </div>
               </div>
               <div class="row" id="firm_registration_certificate_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="firm_registration_certificate_label">Firm Registration Certificate - if any </label><br>
                        <input type="file" class="required" id="firm_registration_certificate" name="firm_registration_certificate" >
                     </div>
                  </div>
               </div>
               <div class="row" id='board_resolution_format_row'>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="board_resolution_format_label">Board Resolution in Specific Format (to be signed by minimum 2 directors)</label><br>
                        <input type="file" class="required" id="board_resolution_format" name="board_resolution_format" >
                     </div>
                  </div>
               </div>
               <div class="row" id="company_pan_row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label id="company_pan_label">PAN of the Company </label><br>
                        <input type="file" class="required" id="company_pan" name="company_pan" >
                     </div>
                  </div>
               </div>
               <!-- <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label id="tb_amount_label">TB Deduction Amount</label>
                      <input type="Number" class="required" id="tb_amount" name="tb_amount" >
                    </div>
                  </div>
                  </div> -->
            </div>
         </div>
         <div class="card" id="process_controls_card">
            <div class="card-body">
              <div class="card">
                <div class="overlay" id="loading_spinner">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
              <div class="row" id="apply_gst_controls_div">
                <div class="col-sm-4">
                  <button type="button" class="btn btn-block btn-primary" onclick="processGstApplication();">Process</button>
                </div>
                <div class="col-sm-4">
                  <button type="button" onclick="clearFields();" class="btn btn-block btn-secondary">Clear</button>
                </div>
              </div>
            </div>
          </div>
         <input type="hidden" name="action" id="action" value="process_gst">
         <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
         <input type="hidden" name="wallet_id" id="wallet_id" value="<?php echo $_SESSION['wallet_id']; ?>">
   </form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
   include '../footer_imports.php';
   ?>
<script type="text/javascript" src="js/gst_resgistration.js"></script>
<?php 
   include '../footer.php';
   ?>