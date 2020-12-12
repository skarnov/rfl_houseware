<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">All Events</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/add_event') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-plus-square"></i><span>&nbsp;Add Event</span></a></li> 
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
                                Displaying Events <strong>from {{ $all_events->firstItem() }} to {{ $all_events->lastItem() }}</strong> out of total <strong>{{ $all_events->total() }}</strong>
                            </span><hr />
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>
                                        <th>Thumbnail</th>                                  
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_events as $event)
                                    <tr>
                                        <td>
                                            @if ($event->featured_image)
                                            <img class="img-thumbnail table-image" src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $event->featured_image }}" alt="{{ $event->content_title }}" title="{{ $event->content_title }}">
                                            @else
                                            <img class="img-thumbnail table-image" src="{{ URL::to('/assets/noImage.png') }}" title="No Image Available">
                                            @endif
                                        </td>
                                        <td><span> {{ $event->content_title }}</span></td>
                                        <td>
                                            @if ($event->content_status == 'active')
                                            <span class="badge badge-success">Active</span>
                                            @endif
                                            @if ($event->content_status == 'inactive')
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="edit_event/{{ $event->content_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
                                            <a href="javascript:;" data-id="{{ $event->content_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>
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
                    {{ $all_events->links() }}
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
                        window.location.href = "{{ URL::to('/delete_event/') }}/" + id;
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
        $('#eventArea').addClass('active');
        $('#eventList').addClass('active');
        /*End Active Class*/
    });
</script>