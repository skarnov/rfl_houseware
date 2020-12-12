<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">All Outlet</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/add_outlets') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-plus-square"></i><span>&nbsp;Add Outlet</span></a></li> 
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
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>
                                        <th>Outlet</th>                                  
                                        <th>Name</th>                                  
                                        <th>Upazila</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                @foreach ($all_outlet as $outlet)
                                    <tr>
                                        <td>{{ ucfirst($outlet->outlet_category) }}</td>
                                        <td>{{ $outlet->name }}</td>
                                        <td>{{ $outlet->Uname }}</td>
                                        <td>{{ $outlet->phone }}</td>
                                        <td><a href="edit_outlets/{{ $outlet->id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
                                            <a href="javascript:;" data-id="{{ $outlet->id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a></td>
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
                        window.location.href = "{{ URL::to('/delete_outlet/') }}/" + id;
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
        $('#outletarea').addClass('active');
        $('#list_outlet').addClass('active');
        /*End Active Class*/
    });
</script>