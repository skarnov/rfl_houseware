<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add New Offer</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_offers') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Offers</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/save_offer')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serial</label>
                                        <input type="text" name="serial" value="{{ old('serial') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Offer Image</label>
                                        <input type="file" name="image" required class="dropify">
                                    </div>
                                    <div class="form-group">
                                        <label>Offer Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Offer Link</label>
                                        <textarea name="external_link" required class="form-control">{{ old('external_link')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Offer Status</label>
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
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
        $('#offerArea').addClass('active');
        $('#addOffer').addClass('active');
        /*End Active Class*/
    });
</script>