<?php include('header.php');?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2 style="margin-bottom:10px !important;">All Products</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-plus-square"></i><span>&nbsp;Add New Product</span></a></li>                            
                        </ul>
                    </div>            
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong><i class="panel-title-icon fa fa-filter"></i>&nbsp;Filter</strong></h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6">
                                    <p> <b>Product Category</b> </p>
                                    <select class="form-control show-tick ms">
                                        <option>Select One</option>
                                        <option>Mustard</option>
                                        <option>Ketchup</option>
                                        <option>Relish</option>
                                    </select>
                                </div>
								 <div class="col-lg-3 col-md-6">
                                    <p> <b>Product Name</b> </p>
                                    <select class="form-control show-tick ms">
                                        <option>Select One</option>
                                        <option>Mustard</option>
                                        <option>Ketchup</option>
                                        <option>Relish</option>
                                    </select>
                                </div>
                              
                                <div class="col-lg-3 col-md-6">
                                    <p> <b>Product Status</b> </p>
                                    <select class="form-control show-tick ms">
                                        <option>Select One</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
								 <div class="col-lg-3 col-md-6">
                                    <p> <b>Product Status</b> </p>
                                    <select class="form-control show-tick ms">
                                        <option>Select One</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                                </div>
								  <div class="row clearfix m-t-10">
								     <div class="col-lg-3 col-md-6">
									 <button type="button" class="btn btn-simple btn-sm btn-success btn-filter">Filter</button>
									 <button type="button" class="btn  btn-simple btn-sm btn-danger btn-filter">Clear</button>
									</div>
								</div>
                        </div>
                    </div>
                </div>
            </div>
		  <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
						<span>
						Displaying Passengers <strong>from 1 to 21</strong> out of total <strong>21</strong></span><hr />
                                <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Product Status</th>
                                            <th>Product Attribute</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td><img src="assets/images/xs/avatar3.jpg" class="width35" alt=""></td>
                                            <td><span>Water Bottol</span>  </td>
											<td><span>Bottol</span></td>
                                            <td><span>BDT 500</span></td>
                                            <td><span class="badge badge-success">Active</span>
											<!--- <span class="badge badge-danger">Inactive</span> !----> </td>
                                            <td><span class="badge badge-success">Featured</span>
											<!---<span class="badge badge-danger">Inactive</span> !----></td>
                                            <td>
                                              
                                               <a href="javascript:void(0);" class="btn btn-sm btn-outline-success"><i class="icon-pencil"></i></a>
                                               <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
										  <tr>
                                            <td><img src="assets/images/xs/avatar3.jpg" class="width35" alt=""></td>
                                            <td><span>Water Bottol</span>  </td>
											<td><span>Bottol</span></td>
                                            <td><span>BDT 500</span></td>
                                            <td><span class="badge badge-success">Active</span>
											<!--- <span class="badge badge-danger">Inactive</span> !----> </td>
                                            <td><span class="badge badge-success">Featured</span>
											<!---<span class="badge badge-danger">Inactive</span> !----></td>
                                            <td>
                                              
                                               <a href="javascript:void(0);" class="btn btn-sm btn-outline-success"><i class="icon-pencil"></i></a>
                                               <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
										<tr>
                                            <td><img src="assets/images/xs/avatar3.jpg" class="width35" alt=""></td>
                                            <td><span>Water Bottol</span>  </td>
											<td><span>Bottol</span></td>
                                            <td><span>BDT 500</span></td>
                                            <td><span class="badge badge-success">Active</span>
											<!--- <span class="badge badge-danger">Inactive</span> !----> </td>
                                            <td><span class="badge badge-success">Featured</span>
											<!---<span class="badge badge-danger">Inactive</span> !----></td>
                                            <td>
                                              
                                               <a href="javascript:void(0);" class="btn btn-sm btn-outline-success"><i class="icon-pencil"></i></a>
                                               <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row clearfix">
			 <div class="col-lg-12 col-md-12 col-sm-12">
				<nav>
					<ul class="pagination">
						<li class="page-item disabled">
						<a class="page-link" href="javascript:void(0);" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
						<li class="page-item active">
						<a class="page-link" href="javascript:void(0);">2 <span class="sr-only">(current)</span></a>
						</li>
						<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
						<li class="page-item">
						<a class="page-link" href="javascript:void(0);">Next</a>
						</li>
					</ul>
				</nav>
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