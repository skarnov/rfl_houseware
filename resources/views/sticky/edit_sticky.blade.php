<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">Edit Sticky Content</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="btn  btn-simple btn-sm btn-info btn-filter"><i class="fa fa-list-ul"></i><span>&nbsp;All Sticky Content</span></a></li>
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
                
               <?php 
                if ( $sicky_items->status == 'on'){
                    $checked = 'checked';
                }else{
                    $checked = '';
                }
               ?>
                <div class="card">
                    <div class="body">
                        <form id="basic-form" method="POST" action="{{ URL::to('/update_sticky') }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" class="form-control" value="{{ $sicky_items->id }}">
                                    <div class="form-group">
                                        <label>Add Sticky</label>
                                        <input type="text" name="text" class="form-control" value="{{ $sicky_items->text }}" required>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="status" class="form-check-input" id="active" <?php echo $checked; ?>>
                                        <label class="form-check-label" for="exampleCheck1">If you want active text</label>
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
        $('#content').click();
        $('#sticky').addClass('active');
        $('#add_sticky').addClass('active');
        /*End Active Class*/
    });
</script>