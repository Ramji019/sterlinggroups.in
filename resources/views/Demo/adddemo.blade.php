@extends('layouts.app')
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="accordion add-employee" id="accordion-details">
            <div class="card shadow-sm grow ctm-border-radius">
                <div class="card-header" id="basic1">
                    <h4 class="cursor-pointer mb-0">
                        <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#basic-one" aria-expanded="true">
                            Add Demonitian
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
                    <div class="employee-office-table">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>&nbsp;&nbsp;&nbsp;Rs/Coins</th>
                                        <th>Count</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demo as $key => $d)
                                        <tr>
                                            <div class="set">
                                            <td>{{ $key + 1 }}</td>
                                            <td><input class="n1" class="form-control number" value="{{ $d->rs_coin }}" readonly /></td>

                                            <input name="parent_id[]" type="hidden" value="1" />

                                            <input name="service_id[]" type="hidden" value="{{ $d->id }}" />

                                            @if (count($d->payment) > 0)
                                                @foreach ($d->payment as $key1 => $payment)
                                                    <td> <input type="text" maxlength="6" class="form-control number" placeholder="RS/COINS" value="{{ $payment->count }}"
                                                            name="count[]" required></td>

                                                @endforeach
                                            @else

                                             <td> <input class="n2" class="w-50 p-2" type="text" maxlength="4" class="form-control number" placeholder="RS/COINS" name="count[]" required></td>

                                             <td> <input class="result" type="text" maxlength="4"
                                                  class="form-control w-50 p-2" name="name" readonly></td>
                                                  
                                            @endif
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                </div>
            </div>
        @endsection
        @push('page_scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
          
                // function myFunction() {
                //     alert("hi");
                //     first = Number($('#val1').val());
                //     second = Number($('#mySelect').val());
                //     if (first && second && !isNaN(first) && !isNaN(second)) {
                //         $('#val2').val(first * second);
                //     } else {
                //         $('#val2').val(0);
                //     }
                // }

                $(function() {
                    alert("hi");
                $('input').on('input', function() {
                    // Find the closest set and recalculate it
                    // var set =  $('#space_bet3').parent('tr').prev().find('td').attr("id");
                    var set = $(this).closest('.set');
                    // $('.set').closest('td').prev('td').children('td').attr('id');
                    // Get your values
                    var n1 = parseInt(set.find('.n1').val() || 0);
                    alert(n1);
                    var n2 = parseInt(set.find('.n2').val() || 0);
                    alert(n2);
                    // Set their result
                    set.find('.result').val(n1 * n2);
                });
                });

                
            </script>
        @endpush
