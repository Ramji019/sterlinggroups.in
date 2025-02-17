@extends('layouts.app')
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <a href="">
                            <div class="card-icon bg-success">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <div class="card-right">
                                <h4 class="card-title">Admin</h4>
                                <p class="card-text">{{ $admcount }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <a href="">
                            <div class="card-icon bg-success">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <div class="card-right">
                                <h4 class="card-title">Member</h4>
                                <p class="card-text">{{ $memscount }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
