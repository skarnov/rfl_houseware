<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add Address</h2>
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
                        
                        <form id="basic-form" method="POST" action="{{ URL::to('/save_address') }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <input type="hidden" value="1" name="id">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" required value="{{ $address->address }}" class="form-control">
                                    </div>
                             
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" required value="{{ $address->phone }}" class="form-control">
                                    </div>
                             
                             
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" required value="{{ $address->email }}" class="form-control">
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
        $('#address').addClass('active');
        /*End Active Class*/
    });
</script>