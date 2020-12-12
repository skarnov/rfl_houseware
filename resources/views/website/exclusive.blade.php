   <!-- page header start -->
   <section class="page-header">
    <div class="container">
            <div class="page-header-content">
                <h3>Store Locator - Elusive</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/') }}">Home</a></li>
                <li><a href="{{ URL('/exclusiveoutlets') }}">Carnivay</a></li>
            </ul>
        </div>
    </section>
    <!-- page header end -->

    
    <section class="map-section pt--60 pb--60 pt_lg--120 pb_lg--120">
        <div class="container p-0">
            <div class="col-md-12 p-0">
                
            <div class="store-locator">
                <form action="#">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Division</label>
                            <select name="division_list" class="select" id="division_list2">
                            <option data-display="Select District">Select Division</option>
									@foreach($divisions as $division)
										<option value="{{ $division->id }}">{{ $division->name }}</option>
									@endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">District</label>
                            <select class="w-100" name="district_list" id="district_list2">
									<option selected data-display="Select District">Select District</option>
							</select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Upazila</label>
                            <select class="w-100" name="upazila_list" id="upazila_list2">
									<option selected data-display="Select Thana">Select Upazila</option>
								</select>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-md-12 p-0">
                <div class="row news-warp" id="showroom">
                    <div class="col-md-4">
                        <div class="showroom-list">
                            <h5>Showrooms</h5>
                            <div id="showrooms2" class="contentreloader"></div>
                        </div>   
                    </div>
                    <div class="col-md-8">
                        <div id="locatmap2" class="map-details"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
