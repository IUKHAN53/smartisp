@extends('layouts.template')

@section('content')
    <div class="col-12 pt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Billing</h4>
                <h6 class="card-subtitle"> Edit Billing Details</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url('billing/edit/').'/'.$user->reference_no}}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="name">Customer Number : Full name</label>
                        <input type="text" id="name" class="form-control"
                               value="{{$user->reference_no}} : {{$user->full_name}}"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label for="bill">Monthly Bill : Due Date</label>
                        <input type="text" class="form-control" id="bill"
                               value="{{$user->billing->monthly_bill}} : {{$bill->due_date}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="disc">Discount</label>
                        <input type="text" class="form-control" id="disc" name="discount"
                               value="{{$user->billing->perm_discount}}" placeholder="Enter Discount">
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea class="form-control" name="notes" id="notes"
                                  placeholder="What is discount for! ">{{$user->billing->discount_notes}}</textarea>
                    </div>
                    <input type="submit" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
@endsection
