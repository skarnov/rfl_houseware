<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add Outlets</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/list_outlet') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Outlets</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{ URL::to('/save_outlet') }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <label>Outlets name</label>
                                        <input type="text" name="name" required value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" required value="" class="form-control">
                                    </div>
                                                         

                                    <div class="form-group">
                                        <label>phone</label>
                                        <input type="text" name="phone" required value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Outlet category</label>
                                        <select name="outlet_category" id="inputState" class="form-control">
                                            <option value="bestbuy">Best Buy</option>
                                            <option value="exclusive">Exclusive</option>
                                            <option value="carniva">Carniva</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" required value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" name="longitude" required value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Upazilas</label>
                                        <select name="upazilas_id" id="inputState" class="form-control">
                                            @foreach( $upazilas as $upazilass )
                                                <option value="{{ $upazilass->id }}">{{ $upazilass->name }}</option>
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
        $('#content').click();
        $('#outletArea').addClass('active');
        $('#addOutlets').addClass('active');
        /*End Active Class*/
    });
</script>