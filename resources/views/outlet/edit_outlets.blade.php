<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit Outlets</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Outlets</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <!-- Show Error -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- End of Show Error -->


                <div class="card">
                    <div class="body">
                        <form id="basic-form" method="POST" action="{{ URL::to('/update_outlet') }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="{{ $outlet->id }}">
                                    <div class="form-group">
                                        <label>Add Outlets</label>
                                        <input type="text" name="name" value="{{ $outlet->name }}" required value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" required value="{{ $outlet->address }}" class="form-control">
                                    </div>
                                                         

                                    <div class="form-group">
                                        <label>phone</label>
                                        <input type="text" name="phone" required value="{{ $outlet->phone }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Outlet</label>
                                        <select name="outlet_category" id="inputState" class="form-control">
                                            <option value="{{ $outlet->outlet_category }}">Select</option>
                                            <option value="bestbuy">Best Buy</option>
                                            <option value="exclusive">Exclusive</option>
                                            <option value="carniva">Carniva</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" required value="{{ $outlet->latitude }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" name="longitude" required value="{{ $outlet->longitude }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Upazilas</label>
                                        <select name="upazilas_id" id="inputState" class="form-control">
                                            <option value="{{ $outlet->upazila_id }}">Select</option>
                                            @foreach( $upazilas as $upazilass )
                                                <option value="{{ $upazilass->id }}" >{{ $upazilass->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>   

                                    
                                    <div class="form-group">
                                        <button style="float:right" type="submit" class="btn btn-success"><i class="fa fa-save"></i> <span>Save & Submit</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#product').addClass('active show');
        $('#outletarea').addClass('active');
        $('#add_outlets').addClass('active');
        /*End Active Class*/
    });
</script>