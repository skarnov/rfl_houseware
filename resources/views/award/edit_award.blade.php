<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit The Award</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_awards') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Awards</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/update_award')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label>Award Name</label>
                                        <input type="text" name="name" required value="{{ $award_info->content_title }}" class="form-control">
                                        <input type="hidden" name="id" value="{{ $award_info->content_id }}">
                                        <input type="hidden" name="previous_image" value="{{ $award_info->featured_image }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Award</label>
                                        <input type="file" id="featuredImage" name="image" class="dropify">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serial</label>
                                        <input type="text" name="serial" value="{{ $award_info->content_serial }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Award Status</label>
                                        <select name="status" required class="form-control">
                                            <option value="active" {{ $award_info->content_status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $award_info->content_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button style="float:right" type="submit" class="btn btn-secondary"><i class="fa fa-save"></i> <span>Edit & Submit</span></button>
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
        var imagenUrl = "{{ URL::to('/uploads/files/thumbnails') }}{{'/'}}{{ $award_info->featured_image }}";
        var drEvent = $('#featuredImage').dropify({
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
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#content').click();
        $('#awardArea').addClass('active');
        $('#addAward').addClass('active');
        /*End Active Class*/
    });
</script>