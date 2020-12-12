<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit The Image Album</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_image_albums') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Image Albums</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/update_image_album')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Album Thumbnail Image</label>
                                        <input type="file" id="featuredImage" name="image" class="dropify">
                                    </div>
                                    <div class="form-group"> 
                                        <label>Album Name</label>
                                        <input type="text" name="name" required value="{{ $album_info->content_title }}" class="form-control">
                                        <input type="hidden" name="id" value="{{ $album_info->content_id }}">
                                        <input type="hidden" name="previous_image" value="{{ $album_info->featured_image }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Album Status</label>
                                        <select name="status" required class="form-control">
                                            <option value="active" {{ $album_info->content_status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $album_info->content_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $album_info->featured_image }}";
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
        $('#imageGallery').addClass('active');
        $('#imageAlbumList').addClass('active');
        /*End Active Class*/
    });
</script>