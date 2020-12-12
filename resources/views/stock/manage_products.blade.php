<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">All Products</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/add_product') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-plus-square"></i><span>&nbsp;Add Product</span></a></li> 
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
                                <div class="col-lg-3 col-md-6">
                                    <p><b>Product Category</b></p>
                                    <select name="category" class="form-control filterDropDown">
                                        <option value="">Select One</option>
                                        @foreach ($all_categories as $category)
                                        {{ $category_id = isset($_GET['category']) ? $_GET['category'] : '' }}
                                        <option value="{{ $category->category_id }}" {{ $category_id == $category->category_id ? 'selected':'' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <p><b>Product Name</b></p>
                                    <input type="text" name="name" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}" class="form-control filterText"/>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <p><b>Product Attribute</b></p>
                                    <select name="attribute" class="form-control filterDropDown">
                                        <option value="">Select One</option>
                                        {{$attribute = isset($_GET['attribute']) ? $_GET['attribute'] : ''}}
                                        <option value="new-arrival" {{ $attribute == 'new-arrival' ? 'selected':'' }}>New Arrival</option>
                                        <option value="featured" {{ $attribute == 'featured' ? 'selected':'' }}>Featured</option>
                                        <option value="top-sale" {{ $attribute == 'top-sale' ? 'selected':'' }}>Top-Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix m-t-10">
                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-simple btn-sm btn-success btn-filter">Filter</button>
                                    <a href="{{ URL::to('/manage_products') }}" class="btn  btn-simple btn-sm btn-danger btn-filter">Clear</a>
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
                                Displaying Products <strong>from {{ $all_products->firstItem() }} to {{ $all_products->lastItem() }}</strong> out of total <strong>{{ $all_products->total() }}</strong>
                            </span><hr />
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Attribute</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="filterResult">
                                    @foreach ($all_products as $product)
                                    <tr>
                                        <td>
                                            @if ($product->product_image)
                                            <img class="img-thumbnail table-image" src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $product->product_image }}" alt="{{ $product->product_name }}" title="{{ $product->product_name }}">
                                            @else
                                            <img class="img-thumbnail table-image" src="{{ URL::to('/assets/noImage.png') }}" title="No Image Available">
                                            @endif
                                        </td>
                                        <td><span> {{ $product->product_name }}</span></td>
                                        <td><span> {{ $product->category_name }}</span></td>
                                        <td class="text-capitalize"><span> {{ $product->product_attribute }}</span></td>
                                        <td>
                                            @if ($product->product_status == 'active')
                                            <span class="badge badge-success">Active</span>
                                            @endif
                                            @if ($product->product_status == 'inactive')
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="edit_product/{{ $product->product_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
                                            <a href="javascript:;" data-id="{{ $product->product_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>
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
                    {{ $all_products->links() }}
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
                        url: "{{url('/filter_products')}}",
                        data: $('#filterForm').serialize(),
                        beforeSend: function () {
                            $("#filterResult").html('<h1>Searching...</h1>');
                        },
                        success: function (data)
                        {
                            $("#rowCount").hide();
                            $("#filterResult").html(data);
                        }
                    });
                };
        $form.find('.filterDropDown').on('change', hideShow);
        $form.find('.filterText').on('keyup', hideShow);

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
                        window.location.href = "{{ URL::to('/delete_product/') }}/" + id;
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
        $('#productArea').addClass('active');
        $('#productList').addClass('active');
        /*End Active Class*/
    });
</script>