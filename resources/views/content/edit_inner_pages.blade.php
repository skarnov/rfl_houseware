<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit The Page</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_inner_pages') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Pages</span></a></li>
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
                <h3>{{ $page_info->page_name }}</h3>
                <div class="card">
                    <div class="body">
                        <form id="basic-form" method="POST" action="{{url('/update_inner_pages')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $page_info->page_id }}">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="page_short_description" required class="form-control">{{ $page_info->page_short_description }}</textarea>
                                    </div>
                                </div>                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="page_description" class="form-control news">{{ $page_info->page_description }}</textarea>
                                    </div>
                                </div>
                        
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Page Cover Image</label>
                                        <input type="file" name="image" id="image" class="dropify">
                                        <input type="hidden" name="previous_image" value="{{ $page_info->image }}">
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

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}";
        var drEvent = $('#image').dropify({
            defaultFile: imagenUrl
        });

        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = imagenUrl;
        drEvent.destroy();
        drEvent.init();

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