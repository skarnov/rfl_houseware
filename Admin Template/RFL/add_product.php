<?php include('header.php');?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2 style="margin-bottom:10px !important;">Add New Product</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="product_list.php" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Products</span></a></li>                            
                        </ul>
                    </div>            
                </div>
            </div>
         	<div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <form id="basic-form" method="post">
								<div class="row clearfix">
									 <div class="col-md-6">
										<div class="form-group">
											<label>Product Name</label>
											<input type="text" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Product Category</label>
											<select class="form-control show-tick ms">
												<option>Select One</option>
												<optgroup label="Picnic">
												<option>Mustard</option>
												<option>Ketchup</option>
												<option>Relish</option>
												</optgroup>
												<optgroup label="Camping">
												<option>Tent</option>
												<option>Flashlight</option>
												<option>Toilet Paper</option>
												</optgroup>
											</select>
										</div>
										<div class="form-group">
											<label>Product Size</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Product Dimension</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Product Color</label>	
											<div class="input-group colorpicker"> 
												<input type="text" class="form-control" value="#00AABB">
												<div class="input-group-append">
													<span class="input-group-text"><span class="input-group-addon"> <i></i> </span></span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Product Price</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Product Summary </label>
											<textarea class="form-control" rows="5" cols="30" required></textarea>
										</div>
										<div class="form-group">
											<label>Product Material Information </label>
											<textarea class="form-control" rows="5" cols="30" required></textarea>
										</div>
										<div class="form-group">
											<label>Product Care Instruction</label>
											<textarea class="form-control" rows="5" cols="30" required></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Product Featured Image</label>
											<input type="file" class="dropify" required>
										</div>
										<div class="row clearfix">
											<div class="col-lg-6 col-md-6">
												<div class="form-group">
													<label>Product Gallery Image</label>
													<input type="file" class="dropify" required>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="form-group">
													<label>Product Gallery Image</label>
													<input type="file" class="dropify" required>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="form-group">
													<label>Product Gallery Image</label>
													<input type="file" class="dropify" required>
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="form-group">
													<label>Product Featured Image</label>
													<input type="file" class="dropify" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Product Gallery Yotube video URL</label>
											<input type="text" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Product Attributes</label>
											<br/>
											<label class="fancy-checkbox">
												<input type="checkbox" name="checkbox" required data-parsley-errors-container="#error-checkbox">
												<span>Option 1</span>
											</label>
											<label class="fancy-checkbox">
												<input type="checkbox" name="checkbox">
												<span>Option 2</span>
											</label>
											<label class="fancy-checkbox">
												<input type="checkbox" name="checkbox">
												<span>Option 3</span>
											</label>
											<p id="error-checkbox"></p>
										</div>
										<div class="form-group">
											<label>Product Status</label>
											<br />
											<label class="fancy-radio">
												<input type="radio" name="gender" value="male" required data-parsley-errors-container="#error-radio">
												<span><i></i>Publish</span>
											</label>
											<label class="fancy-radio">
												<input type="radio" name="gender" value="female">
												<span><i></i>Unpublish</span>
											</label>
											<p id="error-radio"></p>
										</div>
										
										<button style="float:right" type="button" class="btn btn-success"><i class="fa fa-save"></i> <span>Save & Submit</span></button>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
	</div>
</div>
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script> 
<script src="assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script> 
<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> 
<script src="assets/vendor/nouislider/nouislider.js"></script> 
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/forms/advanced-form-elements.js"></script>
<script src="assets/vendor/dropify/js/dropify.min.js"></script>
<script src="assets/js/pages/forms/dropify.js"></script>
</body>
</html>