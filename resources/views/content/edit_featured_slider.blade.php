<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit The Page</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/edit_page/1') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Featured Slider</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/update_featured_slider')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Featured Slider Title</label>
                                        <textarea class="summernote" name="title">{{ $featured_sliders_info->content_misc }}</textarea>
                                        <input type="hidden" name="id" required value="{{ $featured_sliders_info->content_id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category" class="form-control">
                                            @foreach ($all_categories as $category)
                                            {{$category_name = $featured_sliders_info->content_subtitle}}
                                            <option value="{{ $category->category_name }}" {{ $category_name == $category->category_name ? 'selected':'' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" required class="form-control">{{ $featured_sliders_info->content_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Link</label>
                                        <textarea name="link" required class="form-control">{{ $featured_sliders_info->external_link }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Offer Text</label>
                                        <input type="text" name="offer" value="{{ $featured_sliders_info->additional_info }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <br />
                                        <label class="fancy-radio">
                                            <input type="radio" name="status" value="active" {{ $featured_sliders_info->content_status == 'active' ? 'checked' : '' }}>
                                            <span><i></i>Active</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="status" value="inactive" {{ $featured_sliders_info->content_status == 'inactive' ? 'checked' : '' }}>
                                            <span><i></i>Inactive</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slider Image</label>
                                        <input type="file" name="image" id="image" class="dropify">
                                        <input type="hidden" name="previous_image" value="{{ $featured_sliders_info->featured_image }}">
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
        /*Start Active Class*/
        $('#content').click();
        $('#listPages').addClass('active');
        /*End Active Class*/

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $featured_sliders_info->featured_image }}";
        var drEvent = $('#image').dropify({
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