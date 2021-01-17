{{--<!doctype html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <title>Invoice </title>--}}

{{--    <style>--}}
{{--        .invoice-box {--}}
{{--            max-width: 800px;--}}
{{--            margin: auto;--}}
{{--            padding: 30px;--}}
{{--            border: 1px solid #eee;--}}
{{--            box-shadow: 0 0 10px rgba(0, 0, 0, .15);--}}
{{--            font-size: 16px;--}}
{{--            line-height: 24px;--}}
{{--            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;--}}
{{--            color: #555;--}}
{{--        }--}}

{{--        .invoice-box table {--}}
{{--            width: 100%;--}}
{{--            line-height: inherit;--}}
{{--            text-align: left;--}}
{{--        }--}}

{{--        .invoice-box table td {--}}
{{--            padding: 5px;--}}
{{--            vertical-align: top;--}}
{{--        }--}}

{{--        .invoice-box table tr td:nth-child(2) {--}}
{{--            text-align: right;--}}
{{--        }--}}

{{--        .invoice-box table tr.top table td {--}}
{{--            padding-bottom: 20px;--}}
{{--        }--}}

{{--        .invoice-box table tr.top table td.title {--}}
{{--            font-size: 45px;--}}
{{--            line-height: 45px;--}}
{{--            color: #333;--}}
{{--        }--}}

{{--        .invoice-box table tr.information table td {--}}
{{--            padding-bottom: 40px;--}}
{{--        }--}}

{{--        .invoice-box table tr.heading td {--}}
{{--            background: #eee;--}}
{{--            border-bottom: 1px solid #ddd;--}}
{{--            font-weight: bold;--}}
{{--        }--}}

{{--        .invoice-box table tr.details td {--}}
{{--            padding-bottom: 20px;--}}
{{--        }--}}

{{--        .invoice-box table tr.item td {--}}
{{--            border-bottom: 1px solid #eee;--}}
{{--        }--}}

{{--        .invoice-box table tr.item.last td {--}}
{{--            border-bottom: none;--}}
{{--        }--}}

{{--        .invoice-box table tr.total td:nth-child(2) {--}}
{{--            border-top: 2px solid #eee;--}}
{{--            font-weight: bold;--}}
{{--        }--}}

{{--        @media only screen and (max-width: 600px) {--}}
{{--            .invoice-box table tr.top table td {--}}
{{--                width: 100%;--}}
{{--                display: block;--}}
{{--                text-align: center;--}}
{{--            }--}}

{{--            .invoice-box table tr.information table td {--}}
{{--                width: 100%;--}}
{{--                display: block;--}}
{{--                text-align: center;--}}
{{--            }--}}
{{--        }--}}

{{--        /** RTL **/--}}
{{--        .rtl {--}}
{{--            direction: rtl;--}}
{{--            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;--}}
{{--        }--}}

{{--        .rtl table {--}}
{{--            text-align: right;--}}
{{--        }--}}

{{--        .rtl table tr td:nth-child(2) {--}}
{{--            text-align: left;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="invoice-box">--}}
{{--    <table cellpadding="0" cellspacing="0">--}}
{{--        <tr class="top">--}}
{{--            <td colspan="2">--}}
{{--                <table>--}}
{{--                    <tr>--}}
{{--                        <td class="title">--}}
{{--                            --}}{{--                            <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            Invoice #: 123<br>--}}
{{--                            Created: {{date('d-M-y')}}<br>--}}
{{--                            Due: {{$bill->due_date}}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </td>--}}
{{--        </tr>--}}

{{--        <tr class="information">--}}
{{--            <td colspan="2">--}}
{{--                <table>--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            SmartISP.<br>--}}
{{--                            Bangladesh<br>--}}
{{--                            Sunnyville, CA 12345--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            {{$user->full_name}}<br>--}}
{{--                            <span style="display: block;float: right;">{{$user->pres_addr}}</span><br>--}}
{{--                            {{$user->mobile_no}}<br>--}}
{{--                            {{$user->email}}<br>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr class="heading">--}}
{{--            <td>--}}
{{--                Package--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                Price--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                Quantity--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                Pending Amount--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                Total--}}
{{--            </td>--}}
{{--        </tr>--}}

{{--        <tr class="item">--}}
{{--            <td>--}}
{{--                {{App\Package::find($user->package_id)->name}}--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                {{$user->billing->monthly_bill}}--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                1--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                {{$bill->pending_amount}}--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                {{$user->billing->monthly_bill}}--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr class="total">--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td colspan="3">--}}
{{--                Discount: {{$user->billing->perm_discount}}--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr class="total">--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td colspan="3">--}}
{{--                Vat: 0--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr class="total">--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td colspan="3">--}}
{{--                Total: {{$user->billing->monthly_bill - $user->billing->perm_discount}}--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
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
