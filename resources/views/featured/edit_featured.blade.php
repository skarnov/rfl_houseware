<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit New Featured</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_featured') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Featured</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/update_featured')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $featured_info->id }}" name="id">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{ $featured_info->title }}" required value="{{ old('title') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file"  id="featuredImage" name="image" class="dropify">
                                        <input type="hidden" name="previous_image" value="{{ $featured_info->featured_image }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Page</label>
                                        <select name="pages" class="form-control">
                                            <option value="our-brands"  {{ $featured_info->pages == 'our-brands' ? 'selected' : '' }}>Our Brands</option>
                                            <option value="partners" {{ $featured_info->pages == 'partners' ? 'selected' : '' }}>Partners</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                        <option value="active" {{ $featured_info->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $featured_info->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
        var imagenUrl = "{{ URL::to('/uploads/files/thumbnails') }}{{'/'}}{{ $featured_info->featured_image }}";
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
        $('#listPages').addClass('active');
        $('#addfeatured').addClass('active');
        /*End Active Class*/
    });
</script>