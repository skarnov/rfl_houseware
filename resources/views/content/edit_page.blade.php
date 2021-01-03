<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit The {{ $page_info->page_name }} Page</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/content') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Pages</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
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
                <!-- End of Show Error -->
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="col-md-12">
                                    <form id="home" method="POST" action="{{url('/update_page_attr')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $page_attribute->fk_page_id }}">
                                        <div class="card-title">
                                            <h3>Page Description</h3>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Page Title</label>
                                                    <input type="text" name="page_title" required value="{{ $page_attribute->page_title }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Page Sub-Title</label>
                                                    <input type="text" name="page_subtitle" required value="{{ $page_attribute->page_subtitle }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Page Sub-Title Bold</label>
                                                    <input type="text" name="page_subtitle_bold" required value="{{ $page_attribute->page_subtitle_bold }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Short Description</label>
                                                    <textarea name="page_description" required class="form-control">{{ $page_attribute->page_description }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Intro Image (Size: 1031x239)</label>
                                                    <input type="file" name="intro_image" id="introImage" class="dropify">
                                                    <input type="hidden" name="previous_image" value="{{ $page_attribute->featured_image }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-title">
                                            <h3>Product Section - 1</h3>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="product_section_one_title" required value="{{ $product_section_one->page_title }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-Title</label>
                                                    <input type="text" name="product_section_one_subtitle" required value="{{ $product_section_one->page_subtitle }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-Title Bold</label>
                                                    <input type="text" name="product_section_one_subtitle_bold" required value="{{ $product_section_one->page_subtitle_bold }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-title">
                                            <h3>Product Section - 2</h3>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="product_section_two_title" required value="{{ $product_section_two->page_title }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-Title</label>
                                                    <input type="text" name="product_section_two_subtitle" required value="{{ $product_section_two->page_subtitle }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-Title Bold</label>
                                                    <input type="text" name="product_section_two_subtitle_bold" required value="{{ $product_section_two->page_subtitle_bold }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input type="text" name="product_section_two_page_link" required value="{{ $product_section_two->featured_image }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-title">
                                            <h3>Catalog Area</h3>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="catalog_title" required value="{{ $catalog_info->page_title }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Short Description</label>
                                                    <input type="text" name="catalog_description" required value="{{ $catalog_info->page_subtitle }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <span>Update Home Page</span></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <div class="row clearfix">
                                        <div class="table mt-5">
                                            <div class="card-title">
                                                <h3>Featured Slider</h3>
                                            </div>
                                            <span>
                                                Displaying Pages <strong>from {{ $featured_sliders->currentPage() }} to {{ $featured_sliders->count() }}</strong> out of total <strong>{{ $featured_sliders->total() }}</strong>
                                            </span><hr />        
                                            <a href="{{ URL::to('/add_featured_slider') }}/{{ $id }}" target="_blank" class="btn btn-simple btn-sm btn-success btn-filter"><i class="fa fa-plus-circle"></i><span>&nbsp;Add Featured Slider</span></a>
                                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                                <thead>
                                                    <tr>
                                                        <th>Slider Name</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($featured_sliders as $slider)
                                                    <tr>
                                                        <td><span> {!! $slider->content_misc !!}</span></td>
                                                        <td><span> {{ $slider->content_subtitle }}</span></td>
                                                        <td>
                                                            @if ($slider->content_status == 'active')
                                                            <span class="badge badge-success">Active</span>
                                                            @endif
                                                            @if ($slider->content_status == 'inactive')
                                                            <span class="badge badge-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ URL('/') }}/edit_featured_slider/{{ $slider->content_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
                                                            <a href="javascript:;" data-id="{{ $slider->content_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ml-2">
                                <form id="tab" method="POST" action="{{url('/update_page_tab')}}" enctype="multipart/form-data">
                                    @csrf
                                    <?php
                                    $i = 1;
                                    foreach ($home_tab as $tab) :
                                        ?>
                                        <div class="card-title">
                                            <h3>Tab - <?php echo $i ?></h3>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id_<?php echo $i ?>" value="<?php echo $tab->attribute_id ?>">
                                                <div class="form-group">
                                                    <label>Icon (Size: 41x41)</label>
                                                    <input type="file" id="tab_icon_<?php echo $i ?>" name="tab_icon_<?php echo $i ?>" class="dropify">
                                                    <input type="hidden" name="tab_previous_image_<?php echo $i ?>" value="<?php echo $tab->featured_image ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="tab_title_<?php echo $i ?>" required value="<?php echo $tab->page_title ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Short Summery</label>
                                                    <textarea name="short_summery_<?php echo $i ?>" class="form-control"><?php echo $tab->page_description ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Button Link</label>
                                                    <input type="text" name="button_link_<?php echo $i ?>" required value="<?php echo $tab->page_subtitle ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    endforeach
                                    ?>
                                    <div class="form-group">
                                        <button style="float:right" type="submit" class="btn btn-secondary"><i class="fa fa-edit"></i> <span>Update Tab</span></button>
                                    </div>
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
        /*Start Active Class*/
        $('#content').click();
        $('#listPages').addClass('active');
        $('#pages').addClass('active');
        /*End Active Class*/

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $page_attribute->featured_image }}";
        var drEvent = $('#introImage').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $home_tab[0]->featured_image }}";
        var drEvent = $('#tab_icon_1').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $home_tab[1]->featured_image }}";
        var drEvent = $('#tab_icon_2').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $home_tab[2]->featured_image }}";
        var drEvent = $('#tab_icon_3').dropify({
            defaultFile: imagenUrl
        });

        var imagenUrl = "{{ URL::to('/uploads/') }}{{'/'}}{{ $home_tab[3]->featured_image }}";
        var drEvent = $('#tab_icon_4').dropify({
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
        $(document).on("click", ".show-alert", function (e) {
            var id = $(this).attr("data-id");
            bootbox.confirm({
                message: "Are you sure you want to delete this item?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result == true) {
                        window.location.href = "{{ URL::to('/delete_featured_slider/') }}/" + id;
                    }
                }
            });
        });
    });
</script>