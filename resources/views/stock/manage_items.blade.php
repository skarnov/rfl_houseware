<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">All Items</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/add_item') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-plus-square"></i><span>&nbsp;Add Item</span></a></li> 
                    </ul>
                </div>            
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="panel-title-icon fa fa-filter"></i>&nbsp;Filter</strong></h2>
                    </div>
                    <div class="body">
                        <form id="filterForm">
                            <div class="row clearfix">
                                <div class="col-lg-8 col-md-8">
                                    <p><b>Item Name</b></p>
                                    <input type="text" name="name" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}" class="form-control filterText"/>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <p><b>Search Subcategory</b></p>
                                    <select name="subcategory_id" class="form-control filterDropDown">
                                        <option value="">Select One</option>
                                        @foreach ($all_subcategories as $category)
                                        <option value="{{ $category->subcategory_id }}">{{ $category->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix m-t-10">
                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-simple btn-sm btn-success btn-filter">Filter</button>
                                    <a href="{{ URL::to('/manage_items') }}" class="btn  btn-simple btn-sm btn-danger btn-filter">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
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
                            <span id="rowCount">
                                Displaying Items <strong>from {{ $all_items->firstItem() }} to {{ $all_items->lastItem() }}</strong> out of total <strong>{{ $all_items->total() }}</strong>
                            </span><hr />
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Subcategory Name</th>
                                        <th>Item Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="filterResult">
                                    @foreach ($all_items as $category)
                                    <tr>
                                        <td><span> {{ $category->item_serial }}</span></td>
                                        <td><span> {{ $category->subcategory_name }}</span></td>
                                        <td><span> {{ $category->item_name }}</span></td>
                                        <td>
                                            @if ($category->item_status == 'active')
                                            <span class="badge badge-success">Active</span>
                                            @endif
                                            @if ($category->item_status == 'inactive')
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="edit_item/{{ $category->item_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
<!--                                            <a href="javascript:;" data-id="{{ $category->item_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>-->
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
        <div class="row clearfix" id="pagination">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <nav>
                    {{ $all_items->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
<script>
    jQ.push(function () {
        var $form = $('#filterForm'),
                hideShow = function () {
                    $("#filterResult").html('');
                    $.ajax({
                        type: 'GET',
                        url: "{{url('/filter_item')}}",
                        data: $('#filterForm').serialize(),
                        beforeSend: function () {
                            $("#filterResult").html('<h1>Searching...</h1>');
                        },
                        success: function (data)
                        {
                            $("#pagination").hide();
                            $("#rowCount").hide();
                            $("#filterResult").html(data);
                        }
                    });
                };
        $form.find('.filterDropDown').on('change', hideShow);
        $form.find('.filterText').on('keyup', hideShow);
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
                        window.location.href = "{{ URL::to('/delete_item/') }}/" + id;
                    }
                }
            });
        });
    });
</script>
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#product').addClass('active show');
        $('#categoryArea').addClass('active');
        $('#itemList').addClass('active');
        /*End Active Class*/
    });
</script>