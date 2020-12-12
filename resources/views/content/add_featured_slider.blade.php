<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add Featured Slider</h2>
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
                        <form id="basic-form" method="POST" action="{{url('/save_featured_slider')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Featured Slider Title</label>
                                        <textarea class="summernote" name="title">{{ old('title') }}</textarea>
                                        <input type="hidden" name="id" value="{{ $id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category" class="form-control">
                                            @foreach ($all_categories as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" required class="form-control">{{ old('description')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Link</label>
                                        <textarea name="link" required class="form-control">{{ old('external_link')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Offer Text</label>
                                        <input type="text" name="offer" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <br />
                                        <label class="fancy-radio">
                                            <input type="radio" checked name="status" value="active">
                                            <span><i></i>Active</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="status" value="inactive">
                                            <span><i></i>Inactive</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slider Image</label>
                                        <input type="file" name="image" required class="dropify" required>
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
        $('#listPages').addClass('active');
        /*End Active Class*/
    });
</script>