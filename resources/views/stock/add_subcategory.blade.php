<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Add New Subcategory</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/manage_subcategories') }}" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Subcategories</span></a></li>
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
                        <form id="basic-form" method="POST" action="{{url('/save_subcategory')}}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" required class="form-control">
                                            <option value="">Select One</option>
                                            {{ $category_id = old('category_id') }}
                                            @foreach ($all_categories as $category)
                                            <option value="{{ $category->category_id }}" {{ $category_id == $category->category_id ? 'selected':'' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Subcategory Name</label>
                                        <input type="text" name="category_name" required value="{{ old('category_name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
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
        /*Start Active Class*/
        $('#product').addClass('active show');
        $('#categoryArea').addClass('active');
        $('#addSubcategory').addClass('active');
        /*End Active Class*/
    });
</script>