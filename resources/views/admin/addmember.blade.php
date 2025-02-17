@extends('layouts.app')
@section('content')

<div class="col-xl-9 col-lg-8  col-md-12">
    <form class="row g-4" action="{{ url('/savemember') }}" enctype="multipart/form-data"
    method="post">
    {{ csrf_field() }}
		<div class="accordion add-employee" id="accordion-details">
			<div class="card shadow-sm grow ctm-border-radius">
				<div class="card-header" id="basic1">
					<h4 class="cursor-pointer mb-0">
						<a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
						Add	Member
						</a>
					</h4>
				</div>
				<div class="card-body p-0">
					<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
					<div class="row">
                        <div class="col-6 form-group">
                            <label>Name</label>
                            <input type="text" maxlength="20" class="form-control" placeholder="Name" id="name" name="name" required type="text">
                        </div>
                        <div class="col-6 form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control number" placeholder="Mobile" name="phone" required maxlength="10">
                        </div>
						<div class="col-6 form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" maxlength="50" placeholder="Email" required>
                        </div>
						<div class="col-6 form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" maxlength="10" required placeholder="Password">
                        </div>
						<div class="col-6 form-group">
                            <label>Profile</label>
                            <input type="file" class="form-control" name="profile" required>
                        </div>
                    </div>
					</div>
				</div>
                <div class="row">
                    <div class="col-12">
                        <div class="submit-section text-center btn-add">
                            <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
			</div>
	</form>
</div>

@endsection
