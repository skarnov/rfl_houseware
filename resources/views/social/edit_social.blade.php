<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add Social</h2>
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
                        
                        <form id="basic-form" method="POST" action="{{ URL::to('/social_update/ ') }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="{{ $social->id  }}">
                                    <div class="form-group">
                                        <label>Font Awesome Icon Class</label>
                                        <input type="text" name="icon_class" value="{{ $social->icon_class }}" required  class="form-control">
                                    </div>
                             
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" name="website_url" required value="{{ $social->website_url }}" class="form-control">
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
        $('#SoicalMedia').addClass('active');
        $('#add_social').addClass('active');
        /*End Active Class*/
    });
</script>