<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit The Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_products') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Products</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/update_product')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" onchange="findSubcategories(this.value)" class="form-control">
                                            <option value="">Select One</option>
                                            @foreach ($all_categories as $category)
                                            {{$category_id = $product_info->category_id}}
                                            <option value="{{ $category->category_id }}" {{ $category_id == $category->category_id ? 'selected':'' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Select Subcategory</label>
                                        <select name="subcategory_id" id="selectedSubcategories" onchange="findSubcategoryItems(this.value)" class="form-control">
                                            <option value="{{ $product_info->subcategory_id }}">{{ $product_info->subcategory_name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Item</label>
                                        <select name="item_id" id="selectedItems" class="form-control">
                                            <option value="{{ $product_info->item_id }}">{{ $product_info->item_name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" required value="{{ $product_info->product_name }}" class="form-control">
                                        <input type="hidden" name="id" required value="{{ $product_info->product_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Sizes</label>
                                        <input type="text" name="sizes" value="{{ $product_info->product_sizes }}" placeholder="Please Write All Sizes With Comma Separated" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Dimension</label>
                                        <input type="text" name="dimension" value="{{ $product_info->product_dimension }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Unit/Capacity</label>
                                        <input type="text" name="unit" value="{{ $product_info->product_unit }}" class="form-control">
                                    </div>
                                    <!--                                    <div class="form-group">
                                                                            <label>SKU/Barcode</label>
                                                                            <input type="text" name="barcode" value="{{ $product_info->product_barcode }}" class="form-control">
                                                                        </div>-->


                                    <div class="form-group">
                                        <label>Product Colors (HEX Code)</label>
                                        <input type="text" name="colors" value="{{ $product_info->product_colors }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Summary </label>
                                        <textarea name="summary" class="form-control" rows="5" cols="30">{{ $product_info->product_summary }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Material Information </label>
                                        <textarea name="material" class="form-control" rows="5" cols="30">{{ $product_info->product_material }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Featured Image (Recommended Size: 600x600)</label>
                                        <input type="file" name="image" id="featuredImage" class="dropify">
                                        <input type="hidden" name="previous_image" value="{{ $product_info->product_image }}">
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Product Gallery Image (Recommended Size: 600x600)</label>
                                                <input type="file" name="additional_image" id="additional_image" class="dropify">
                                                <input type="hidden" name="previous_additional_image" value="{{ $product_info->additional_image }}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Product Gallery Image (Recommended Size: 600x600)</label>
                                                <input type="file" name="extra_image" id="extra_image" class="dropify">
                                                <input type="hidden" name="previous_extra_image" value="{{ $product_info->extra_image }}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Product Gallery Image (Recommended Size: 600x600)</label>
                                                <input type="file" name="supplementary_image" id="supplementary_image" class="dropify">
                                                <input type="hidden" name="previous_supplementary_image" value="{{ $product_info->supplementary_image }}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Product Gallery Image (Recommended Size: 600x600)</label>
                                                <input type="file" name="auxiliary_image" id="auxiliary_image" class="dropify">
                                                <input type="hidden" name="previous_auxiliary_image" value="{{ $product_info->auxiliary_image }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="form-group">
                                                                            <label>Product Gallery YouTube Video</label>
                                                                            <textarea name="video" class="form-control">{{ $product_info->product_video }}</textarea>
                                                                        </div>-->
                                    <div class="form-group">
                                        <label>Buy Link</label>
                                        <input type="text" name="external_link" value="{{ $product_info->external_link }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Care Instruction</label>
                                        <textarea name="care" class="form-control" rows="5" cols="30">{{ $product_info->product_care }}</textarea>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Promotional Price</label>
                                        <input type="text" name="promotional_price" value="{{ $product_info->promotional_price }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="text" name="price" value="{{ $product_info->product_price }}" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="number" name="discount" value="{{ $product_info->discount }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea name="description" class="form-control description">{{ $product_info->product_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Barcode Info</label>
                                        <textarea name="barcode" class="form-control description">{{ $product_info->barcode_info }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Attributes</label>
                                        <br />
                                        <label class="fancy-radio">
                                            <input type="radio" name="attribute" value="new-arrival" {{ $product_info->product_attribute == 'new-arrival' ? 'checked' : '' }}>
                                            <span><i></i>New Arrival</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="attribute" value="featured" {{ $product_info->product_attribute == 'featured' ? 'checked' : '' }}>
                                            <span><i></i>Featured</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="attribute" value="top-sale" {{ $product_info->product_attribute == 'top-sale' ? 'checked' : '' }}>
                                            <span><i></i>Top-Sale</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Status</label>
                                        <br />
                                        <label class="fancy-radio">
                                            <input type="radio" name="status" value="active" {{ $product_info->product_status == 'active' ? 'checked' : '' }}>
                                            <span><i></i>Active</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="status" value="inactive" {{ $product_info->product_status == 'inactive' ? 'checked' : '' }}>
                                            <span><i></i>Inactive</span>
                                        </label>
                                        <p id="error-radio"></p>
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
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.description",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            height: "480",
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

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->product_image }}";
        var drEvent = $('#featuredImage').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->additional_image }}";
        var drEvent = $('#additional_image').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->extra_image }}";
        var drEvent = $('#extra_image').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->supplementary_image }}";
        var drEvent = $('#supplementary_image').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->auxiliary_image }}";
        var drEvent = $('#auxiliary_image').dropify({
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
        $('#product').addClass('active show');
        $('#productArea').addClass('active');
        $('#addProduct').addClass('active');
        /*End Active Class*/
    });
</script>