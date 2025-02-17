@extends('layouts.app')
@section('content')
    <div class="col-xl-9 col-lg-8 col-md-12">
        <div class="card shadow-sm ctm-border-radius grow">
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
                <div class="card shadow-sm grow ctm-border-radius">
                    <div class="card-body align-center">
                        <h4 class="card-title float-left mb-0 mt-2">Website Details</h4>
                    </div>
                </div>
                <div class="employee-office-table">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Domain</th>
                                    <th>API</th>
                                    <th>Type (Of) Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewweb as $w)
                                    <tr>
                                        <td>{{ $w->id }}</td>
                                        <td>{{ $w->name }}</td>
                                        <td>{{ $w->phone }}</td>
                                        <td>{{ $w->domain }}</td>
                                        <td>{{ $w->api }}</td>
                                        <td>{{ $w->website_name }}</td>
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
@endsection
