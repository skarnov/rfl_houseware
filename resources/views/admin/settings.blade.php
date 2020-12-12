<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Settings</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin') }}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Basic Info</li>
                    </ul>
                </div>        
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>System Configuration</h2>
                        @if (session('success'))
                        <div class="alert alert-success mt-2">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger mt-2">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6">
                                <form id="basic-form" method="POST" action="{{url('/update_settings')}}" novalidate>
                                    @csrf
                                    @foreach ($config as $v)
                                    <div class="form-group">
                                        <label class="text-capitalize"><?php echo str_replace('_', ' ', $v->config_name) ?></label>
                                        <input type="text" name="{{ $v->config_name }}" value="{{ $v->config_setting }}" class="form-control" required>
                                    </div>
                                    @endforeach
                                    <br>
                                    <button type="submit" class="btn btn-secondary">Update Settings</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form id="logo" method="POST" action="{{url('/update_image_settings')}}" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label>Home Page Logo (Size: 90x90)</label>
                                        <input type="file" name="home_logo" id="homeLogo" class="dropify">
                                        <input type="hidden" name="previous_home_logo" value="<?php echo $image_settings[0]->image_value ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Home Page Inner Logo (Size: 90x90)</label>
                                        <input type="file" name="inner_logo" id="innerLogo" class="dropify">
                                        <input type="hidden" name="previous_inner_logo" value="<?php echo $image_settings[1]->image_value ?>">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-secondary">Update Logo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQ.push(function () {
        $('#basic-form').parsley();
    });
</script>
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#appSetting').click();
        $('#basicInfo').addClass('active');
        /*End Active Class*/

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $image_settings[0]->image_value }}";
        var drEvent = $('#homeLogo').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $image_settings[1]->image_value }}";
        var drEvent = $('#innerLogo').dropify({
            defaultFile: imagenUrl
        });

        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = imagenUrl;
        drEvent.destroy();
        drEvent.init();
    });
</script>