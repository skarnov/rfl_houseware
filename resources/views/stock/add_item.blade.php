<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add New Item</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_items') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Items</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/save_item')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Subcategory</label>
                                        <select name="subcategory_id" required class="form-control">
                                            <option value="">Select One</option>
                                            {{ $item_id = old('subcategory_id') }}
                                            @foreach ($all_subcategories as $category)
                                            <option value="{{ $category->subcategory_id }}" {{ $item_id == $category->subcategory_id ? 'selected':'' }}>{{ $category->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input type="text" name="category_name" required value="{{ old('category_name') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Title</label>
                                        <textarea name="subnews" class="form-control news"></textarea>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Featured Image (Recommended Size: 1920x359)</label>
                                        <input type="file" name="image" class="dropify">
                                    </div>
                                    <div class="form-group">
                                        <label>Serial</label>
                                        <input type="number" name="serial" value="{{ old('serial') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Status</label>
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
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.news",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            height : "480",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    });
</script>
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#product').addClass('active show');
        $('#categoryArea').addClass('active');
        $('#addItem').addClass('active');
        /*End Active Class*/
    });
</script>