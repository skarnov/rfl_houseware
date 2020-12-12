<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">All Image Albums</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/add_image_album') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-plus-square"></i><span>&nbsp;Add Image Album</span></a></li> 
                    </ul>
                </div>            
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
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
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <span>
                                Displaying Albums <strong>from {{ $all_albums->firstItem() }} to {{ $all_albums->lastItem() }}</strong> out of total <strong>{{ $all_albums->total() }}</strong>
                            </span><hr />
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>
                                        <th>Thumbnail</th>                                  
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_albums as $album)
                                    <tr>
                                        <td>
                                            @if ($album->featured_image)
                                            <img class="img-thumbnail table-image" src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $album->featured_image }}" alt="{{ $album->content_title }}" title="{{ $album->content_title }}">
                                            @else
                                            <img class="img-thumbnail table-image" src="{{ URL::to('/assets/noImage.png') }}" title="No Image Available">
                                            @endif
                                        </td>
                                        <td><span> {{ $album->content_title }}</span></td>
                                        <td>
                                            @if ($album->content_status == 'active')
                                            <span class="badge badge-success">Active</span>
                                            @endif
                                            @if ($album->content_status == 'inactive')
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="view_image_album/{{ $album->content_id }}" class="btn btn-sm btn-outline-primary" title="View"><i class="icon-eye"></i></a>
                                            <a href="edit_image_album/{{ $album->content_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
                                            <a href="javascript:;" data-id="{{ $album->content_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <nav>
                    {{ $all_albums->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
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
                        window.location.href = "{{ URL::to('/delete_image_album/') }}/" + id;
                    }
                }
            });
        });
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