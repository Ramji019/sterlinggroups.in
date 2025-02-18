@extends('layouts.app')
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong> {{ session('success') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong> {{ session('error') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="flex-row list-group list-group-horizontal-lg" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class=" active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                        role="tab" aria-controls="v-pills-home" aria-selected="true">UnPaid</a>&nbsp;

                    <a class="list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                        role="tab" aria-controls="v-pills-profile" aria-selected="false">Paid</a>&nbsp;

                    @if (Auth::user()->role_id == 1)
                        <a class="list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-svn"
                            role="tab" aria-controls="v-pills-svn" aria-selected="false">All</a>&nbsp;
                    @endif

                </div>
            </div>
        </div>

        <div class="card shadow-sm ctm-border-radius grow">
            <div class="card-body align-center">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-0 d-inline-block">UnPaid</h4>
                            <div class="card shadow-sm grow ctm-border-radius">
                                <div class="card-body align-center">
                                    <li class="nav-item pl-3">
                                        <a href="{{ url('/client/clients') }}"
                                            class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i
                                                class="fa fa-plus"></i> Add Bill</a>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Paid(or)Unpaid</th>
                                            <th>UTR NO</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unbill as $b)
                                            <tr>
                                                <td>{{ $b->id }}</td>
                                                <td>{{ $b->name }}</td>
                                                <td>{{ $b->amount }}</td>
                                                <td class="text-success">{{ $b->paid_unpaid }}</td>
                                                <td class="text-danger">{{ $b->utrno }}</td>
                                                @if (Auth::user()->role_id == 1)
                                                    <td>
                                                        <a onclick="updatepaid('{{ $b->id }}','{{ $b->paid_unpaid }}')"
                                                            class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3"><i
                                                                class="fab fa-dribbble"></i>
                                                        </a>
                                                @endif
                                                @if (Auth::user()->role_id == 3)
                                                    <td>
                                                        @if ($b->paid_unpaid == 'unpaid')
                                                            <a onclick="paybill('{{ $b->id }}','{{ $b->amount }}')"
                                                                class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3"><i
                                                                    class="fab fa-dribbble"></i>
                                                            </a>
                                                        @else
                                                            <button type="button"
                                                                class="btn btn-success ctm-border-radius text-white text-center mb-2 mr-3"
                                                                data-dismiss="modal">Paid</button>
                                                        @endif
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-0 d-inline-block">Paid</h4>
                        </div>
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Paid(or)Unpaid</th>
                                            @if (Auth::user()->role_id == 3)
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paybill as $b)
                                            <tr>
                                                <td>{{ $b->id }}</td>
                                                <td>{{ $b->name }}</td>
                                                <td>{{ $b->amount }}</td>
                                                <td class="text-success">{{ $b->paid_unpaid }}</td>
                                                @if (Auth::user()->role_id == 3)
                                                    <td>
                                                        @if ($b->paid_unpaid == 'unpaid')
                                                            <a onclick="paybill('{{ $b->id }}','{{ $b->amount }}')"
                                                                class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3"><i
                                                                    class="fab fa-dribbble"></i>
                                                            </a>
                                                        @else
                                                            <button type="button"
                                                                class="btn btn-success ctm-border-radius text-white text-center mb-2 mr-3"
                                                                data-dismiss="modal">Paid</button>
                                                        @endif
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-svn" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-0 d-inline-block">All</h4>
                        </div>
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Service List</th>
                                            <th>Service Details</th>
                                            <th>Amount</th>
                                            <th>Paid(or)Unpaid</th>
                                            <th>UTR NO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bill as $b)
                                            <tr>
                                                <td>{{ $b->id }}</td>
                                                <td>{{ $b->name }}</td>
                                                <td>{{ $b->service_list }}</td>
                                                <td>{{ $b->service_details }}</td>
                                                <td>{{ $b->amount }}</td>
                                                <td class="text-success">{{ $b->paid_unpaid }}</td>
                                                <td class="text-danger">{{ $b->utrno }}</td>
                                                @if (Auth::user()->role_id == 3)
                                                    <td>
                                                        @if ($b->paid_unpaid == 'unpaid')
                                                            <a onclick="paybill('{{ $b->id }}','{{ $b->amount }}')"
                                                                class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3"><i
                                                                    class="fab fa-dribbble"></i>
                                                            </a>
                                                        @else
                                                            <button type="button"
                                                                class="btn btn-success ctm-border-radius text-white text-center mb-2 mr-3"
                                                                data-dismiss="modal">Paid</button>
                                                        @endif
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="paybill" role="document">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body style-add-modal">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Pay Bill</h4>
                    <form method="post" action="{{ url('/payamount') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="request_id" id="request_id" />
                        <div class="form-group">
                            <label>Amount</label>
                            <input style="text-align: center" readonly class="form-control" id="amount"
                                type="text">
                        </div>
                        <div class="form-group">
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="/upload/qr/qrimgramji.jpeg" class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>UTR NO</label>
                            <input required style="text-align: center" class="form-control" type="text"
                                placeholder="UTR NO" name="utrno" maxlength="15">
                        </div>
                        <div class="col-12">
                            <div class="submit-section text-center btn-add">
                                <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updatepaid">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Payment Update</h4>
                    <form method="post" action="{{ url('/updatepayment') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="paid_id" id="paid_id" />
                        <div class="form-group">
                            <select name="paid_unpaid" id="paidid" type="text" class="form-control"
                                placeholder="Office Name">
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="btn btn-theme text-white ctm-border-radius float-right button-1">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        function paybill(id, amount) {
            $("#request_id").val(id);
            $("#amount").val(amount);
            $("#paybill").modal("show");
        }

        function updatepaid(id, paid_unpaid) {
            $("#paid_id").val(id);
            $("#paidid").val(paid_unpaid);
            $("#updatepaid").modal("show");
        }
    </script>
@endpush
