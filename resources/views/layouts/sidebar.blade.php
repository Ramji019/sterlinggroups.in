@if (Auth::user()->role_id == 1)
    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
        <aside class="sidebar sidebar-user">
            <div class="row">
                <div class="col-12">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-md-12 mr-auto text-left">
                                    <div class="custom-search input-group">
                                        <div class="custom-breadcrumb">
                                            <h4 class="text-dark">{{ Auth::user()->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                <div class="user-info card-body">
                    <div class="user-avatar mb-4">
                        <img src="/upload/profile/{{ Auth::user()->profile }}" alt="User Avatar" class="img-fluid rounded-circle"
                            width="100">
                    </div>
                    @if (Auth::check())
                        <div class="user-details">
                            @php
                                $now = \Carbon\Carbon::now();
                            @endphp
                            <h4><b>Welcome : {{ Auth::user()->name }}</b></h4>
                            <p>{{ \Carbon\Carbon::now('Asia/Kolkata')->format('d M Y') }} -
                                {{ \Carbon\Carbon::now('Asia/Kolkata')->format('h:i A') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Sidebar -->
            <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                <div class="card ctm-border-radius shadow-sm border-none grow">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-6 align-items-center text-center">
                                <a href="{{ '/superadmin/dashboard' }}"
                                    class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span
                                        class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span
                                        class="">Dashboard</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="{{ url('/admin/member') }}" class="text-dark p-4 ctm-border-right"><span
                                        class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span
                                        class="">Member</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="" class="text-dark p-4 last-slider-btn ctm-border-right"><span
                                        class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span
                                        class="">Reviews</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="" class="text-dark p-4 ctm-border-right ctm-border-left"><span
                                        class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span
                                        class="">Reports</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="" class="text-dark p-4 ctm-border-right"><span
                                        class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span
                                        class="">Manage</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href=""
                                    class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span
                                        class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span
                                        class="">Settings</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="" class="text-dark p-4 last-slider-btn ctm-border-right"><span
                                        class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span
                                        class="">Profile</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
@endif
@if (Auth::user()->role_id == 2)
    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
        <aside class="sidebar sidebar-user">
            <div class="row">
                <div class="col-12">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-md-12 mr-auto text-left">
                                    <div class="custom-search input-group">
                                        <div class="custom-breadcrumb">
                                            <h4 class="text-dark">{{ Auth::user()->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                <div class="user-info card-body">
                    <div class="user-avatar mb-4">
                        <img src="/upload/profile/{{ Auth::user()->profile }}" alt="User Avatar"
                            class="img-fluid rounded-circle" width="100">
                    </div>
                    @if (Auth::check())
                        <div class="user-details">
                            @php
                                $now = \Carbon\Carbon::now();
                            @endphp
                            <h4><b>Welcome : {{ Auth::user()->name }}</b></h4>
                            <p>{{ \Carbon\Carbon::now('Asia/Kolkata')->format('d M Y') }} -
                                {{ \Carbon\Carbon::now('Asia/Kolkata')->format('h:i A') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Sidebar -->
            <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                <div class="card ctm-border-radius shadow-sm border-none grow">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-6 align-items-center text-center">
                                <a href="{{ '/admin/dashboard' }}"
                                    class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span
                                        class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span
                                        class="">Dashboard</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href=""
                                    class="text-dark p-4 ctm-border-right ctm-border-left"><span
                                        class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span
                                        class="">Bills</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="{{ '/Demo/adddemo' }}"
                                    class="text-dark p-4 ctm-border-right ctm-border-left"><span
                                        class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span
                                        class="">Add Demonite</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="" class="text-dark p-4 last-slider-btn ctm-border-right"><span
                                        class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span
                                        class="">Profile</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
@endif

@if (Auth::user()->role_id == 3)
    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
        <aside class="sidebar sidebar-user">
            <div class="row">
                <div class="col-12">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-md-12 mr-auto text-left">
                                    <div class="custom-search input-group">
                                        <div class="custom-breadcrumb">
                                            <h4 class="text-dark">{{ Auth::user()->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                <div class="user-info card-body">
                    <div class="user-avatar mb-4">
                        <img src="{{ Auth::user()->profile }}" alt="User Avatar" class="img-fluid rounded-circle"
                            width="100">
                    </div>
                    @if (Auth::check())
                        <div class="user-details">
                            @php
                                $now = \Carbon\Carbon::now();
                            @endphp
                            <h4><b>Welcome : {{ Auth::user()->name }}</b></h4>
                            <p>{{ \Carbon\Carbon::now('Asia/Kolkata')->format('d M Y') }} -
                                {{ \Carbon\Carbon::now('Asia/Kolkata')->format('h:i A') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Sidebar -->
            <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                <div class="card ctm-border-radius shadow-sm border-none grow">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-6 align-items-center text-center">
                                <a href="{{ '/members/dashboard' }}"
                                    class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span
                                        class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span
                                        class="">Dashboard</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="{{ url('/members/member') }}"
                                    class="text-dark p-4 ctm-border-right ctm-border-left"><span
                                        class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span
                                        class="">Addmember</span></a>
                            </div>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="employment.html" class="text-dark p-4 last-slider-btn ctm-border-right"><span
                                        class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span
                                        class="">Profile</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
@endif
