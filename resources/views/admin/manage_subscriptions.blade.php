<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2 style="margin-bottom:10px !important;">All Subscribers</h2>
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
                                Displaying Subscriptions <strong>from {{ $all_subscriptions->currentPage() }} to {{ $all_subscriptions->count() }}</strong> out of total <strong>{{ $all_subscriptions->total() }}</strong>
                            </span><hr />
                            <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                <thead>
                                    <tr>                                  
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_subscriptions as $subscription)
                                    <tr>
                                        <td><span> {{ $subscription->email }}</span></td>
                                        <td class="text-capitalize"><span> {{ $subscription->subscription_status }}</span></td>
                                        <td>
                                            <a href="javascript:;" data-id="{{ $subscription->newsletter_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>
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
                    {{ $all_subscriptions->links() }}
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
                        window.location.href = "{{ URL::to('/delete_subscription/') }}/" + id;
                    }
                }
            });
        });
    });
</script>
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#appSetting').click();
        $('#SubscriptionList').addClass('active');
        /*End Active Class*/
    });
</script>