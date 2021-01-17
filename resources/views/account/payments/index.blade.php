@extends('layouts.template')

@section('content')
    <div class="col-sm-12">
        @if($msg = session()->get('success'))
            <script>
                Swal.fire('Good job!',
                    '{{$msg}}',
                    'success')
            </script>
        @endif
        @if($msg = session()->get('failed'))
            <script>
                Swal.fire('Arghhh!',
                    '{{$msg}}',
                    'failed')
            </script>
        @endif
    </div>
    <div class="card m-4">
        <div class="card-body">
            <form action="/ledgers/search" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group input-daterange">
                            <input type="date" class="form-control " name="from" value="<?php echo date('Y-m-d'); ?>"
                                   required>
                            <div class="input-group-addon">
                                <button class="btn-lg btn-dark border-0">To</button>
                            </div>
                            <input type="date" class="form-control " name="to" value="<?php echo date('Y-m-d'); ?>"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn-lg btn-info">Get Transactions</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive table-bordered">
                        <table class="table color-bordered-table muted-bordered-table">
                            <thead>
                            <tr>
                                <th>Cash Receipt</th>
                                <th>Bank</th>
                                <th>Cash</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link" data-toggle="collapse"
                                                            data-target="#collapseOne">1. What is HTML?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                 data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>HTML stands for HyperText Markup Language. HTML is the standard
                                                        markup language for describing the structure of web pages. <a
                                                            href="https://www.tutorialrepublic.com/html-tutorial/"
                                                            target="_blank">Learn more.</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h4>Total Collection</h4></td>
                                <td><h4>0</h4></td>
                                <td><h4>0</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive table-bordered">
                        <table class="table color-bordered-table muted-bordered-table">
                            <thead>
                            <tr>
                                <th>Cash Payment</th>
                                <th>Bank</th>
                                <th>Cash</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h4>Total Spend</h4></td>
                                <td><h4>0</h4></td>
                                <td><h4>0</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive table-bordered">
                        <table class="table color-bordered-table muted-bordered-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Total Receipt</th>
                                <th>Total Payment</th>
                                <th>Balance Breakdown</th>
                                <th>Total Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
