<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add Upazila</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/all_upazila') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Upazila</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{ URL::to('/save_upazila') }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                

                                    <div class="form-group">
                                        <label for="inputState">Districts</label>
                                        <select name="districts_id" id="inputState" class="form-control">
                                            @foreach( $district as $districts )
                                                <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                                            @endforeach
                                        </select>
                                        </div> 
                                        <div class="form-group">
                                            <label>Add Upazila</label>
                                            <input type="text" name="name" required value="" class="form-control">
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
        $('#addUpazila').addClass('active');
        /*End Active Class*/
    });
</script>