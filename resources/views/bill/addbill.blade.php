@extends('layouts.app')
@section('content')

<div class="col-xl-9 col-lg-8  col-md-12">
    <form class="row g-4" action="{{ url('/savebill') }}" enctype="multipart/form-data"
    method="post">
    {{ csrf_field() }}
		<div class="accordion add-employee" id="accordion-details">
			<div class="card shadow-sm grow ctm-border-radius">
				<div class="card-header" id="basic1">
					<h4 class="cursor-pointer mb-0">
						<a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
						Add	Bill
						</a>
					</h4>
				</div>
				<div class="card-body p-0">
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
					<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
					<div class="row">
                        <input type="hidden" name="bill_id" value="{{ $id }}" />
                        <input type="hidden" name="username" value="{{ $na->name }}" />
                        <div class="col-6 form-group">
                            <label>Service List</label>
                            <input type="text" class="form-control" placeholder="Service List" name="service_list" maxlength="100" required>
                        </div>
                        <div class="col-6 form-group">
                            <label>Paid (Or) Unpaid</label>
                            <select type="text" class="form-control" name="paid_unpaid" maxlength="50" placeholder="Paid (Or) Unpaid" required>
                                <option value="">Select</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                        </div>
                        <div class="col-6 form-group">
                            <label>Service Details</label>
                            <textarea type="text" rows="3" class="form-control" name="service_details" maxlength="100" required placeholder="Service Details"></textarea>
                        </div>
                        <div class="col-6 form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control number" name="amount" placeholder="Amount" required>
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
