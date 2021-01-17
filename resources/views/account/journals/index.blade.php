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
            <form action="/journals/search" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="input-group input-daterange">
                            <input type="date" class="form-control " name="from" value="<?php echo date('Y-m-d'); ?>" required>
                            <div class="input-group-addon">
                                <button class="btn-lg btn-info border-0">To</button>
                            </div>
                            <input type="date" class="form-control " name="to" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn-lg btn-primary">View Journals</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="table color-bordered-table muted-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Transaction Date</th>
                        <th>Accounts Name</th>
                        <th>Dr. Amount</th>
                        <th>Cr. Amount</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($count))
                        @for($i = 1; $i<=$count; $i++)
                            @switch($colors)
                                @case(1)
                                @php $class = 'table-success ' @endphp
                                @break
                                @case(2)
                                @php $class = 'table-info' @endphp
                                @break
                            @endswitch()
                            @php $x = true; @endphp
                            @foreach($entries->where('journal_number',$i) as $e)
                                <tr class="{{$class}}">
                                    @if($x)
                                        <td rowspan="{{count($entries->where('journal_number',$i))}}">{{$i}}</td>
                                        <td rowspan="{{count($entries->where('journal_number',$i))}}">
                                            {{$e->date}}</br>
                                            <span class="small text-info">{{$e->notes}}</span>
                                        </td>
                                        @php $x = false; @endphp
                                    @endif
                                    <td>{{\App\Account::find($e->account_id)->name}}</td>
                                    @if($e->type === 'd')
                                        <td>Dr.</td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if($e->type === 'c')
                                        <td>Cr.</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{$e->amount}}</td>
                                </tr>
                            @endforeach
                            @if($colors < 2)
                                @php $colors++ @endphp
                            @else
                                @php $colors = 1 @endphp
                            @endif
                        @endfor
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
