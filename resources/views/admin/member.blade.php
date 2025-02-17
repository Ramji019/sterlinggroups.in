@extends('layouts.app')
@section('content')
    <div class="col-xl-9 col-lg-8 col-md-12">
        {{-- <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
            <div class="card-body">
                <ul class="list-group list-group-horizontal-lg">
                    <li class="list-group-item text-center active button-5"><a href="employees.html" class="text-white">All</a>
                    </li>
                    <li class="list-group-item text-center button-6"><a class="text-dark" href="employees-team.html">Teams</a>
                    </li>
                    <li class="list-group-item text-center button-6"><a class="text-dark"
                            href="employees-offices.html">Offices</a></li>
                </ul>
            </div>
        </div> --}}

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
                        <h4 class="card-title float-left mb-0 mt-2">Member Details</h4>
                        <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                            <li class="nav-item pl-3">
                                <a href="{{ url('/admin/addmember') }}" class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i class="fa fa-plus"></i> Add Member</a>
                            </li>
                        </ul>
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
                                    <th>Email</th>
                                    <th>Password</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mem as $m)
                                    <tr>
                                        <td>{{ $m->id }}</td>
                                        <td>{{ $m->name }}</td>
                                        <td>{{ $m->phone }}</td>
                                        <td>{{ $m->email }}</td>
                                        <td>{{ $m->cpassword }}</td>
                                        {{-- <td>
                                            <a href="{{ url('/bill/addbill', $c->id) }}"
                                                class="btn btn-theme ctm-border-radius text-white btn-sm">Bill
                                        </td> --}}
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
