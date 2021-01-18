@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5><b>INVOICE</b> <span class="pull-right">#5669626</span></h5>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger">SmartISP.</b></h3>
                                <p class="text-muted m-l-5">E 104, Dharti-2,
                                    <br/> Nr' Viswakarma Temple,
                                    <br/> Talaja Road,
                                    <br/> Bhavnagar - 364002</p>
                            </address>
                        </div>
                        <div class="pull-right text-right">
                            <address>
                                <h3>To,</h3>
                                <h4 class="font-bold">{{$user->full_name}},</h4>
                                <h4 class="text-muted m-l-30">Client ID: {{$user->reference_no}},</h4>
                                <p class="text-muted m-l-30">{{$user->pres_addr}}</p>
                                <p class="text-muted m-l-30">Phone: {{$user->mobile_no}}</p>
                                <p class="text-muted m-l-30">Billing Cycle: {{$user->billing->billing_cycle}}</p>
                                <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{date('d-M-Y')}}</p>
                                <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{$bill->due_date}}</p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Package Name</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Pending Amount</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>{{App\Package::find($user->package_id)->name}}</td>
                                    <td class="text-right">1</td>
                                    <td class="text-right">{{$user->billing->monthly_bill}}</td>
                                    <td class="text-right"> {{$bill->pending_amount}} </td>
                                    <td class="text-right">{{$user->billing->monthly_bill}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">
                            <p>Sub - Total amount: {{$user->billing->monthly_bill}}</p>
                            <p>vat (0%) : 0 </p>
                            <p>Discount : {{$user->billing->perm_discount}} </p>
                            <hr>
                            <h3><b>Total :</b> {{$user->billing->monthly_bill - $user->billing->perm_discount}}</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            <a class="btn btn-danger" href="{{url('/billing/pay/').'/'. $user->reference_no}}"> Proceed to payment </a>
                            <a onclick="window.print()" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
