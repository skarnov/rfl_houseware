<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add New Video Album</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_video_albums') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Video Albums</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/save_video_album')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Album Thumbnail Video</label>
                                        <input type="file" name="image" required class="dropify">
                                    </div>
                                    <div class="form-group">
                                        <label>Album Name</label>
                                        <input type="text" name="name" required value="{{ old('name') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Album Status</label>
                                        <select name="status" required class="form-control">
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
        $('#videoGallery').addClass('active');
        $('#videoAlbum').addClass('active');
        /*End Active Class*/
    });
</script>