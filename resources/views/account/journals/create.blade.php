@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card m-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 margin-tb">
                        <div class="pull-left">
                            <h3 class="text-muted">Add Journal</h3>
                        </div>
                    </div>
{{--                    <div class="col-md-2">--}}
{{--                        <button class="btn btn-info float-right" id="addj">Add Journal</button>--}}
{{--                    </div>--}}
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <form action="{{route('journals.store')}}" method="POST" id="forms">
                    @csrf
                    <div id="journals">
                        <div class="table-responsive">
                            <table id="maintable" class="table muted-bordered-table">
                                <thead>
                                <tr>
                                    <th>Accounts</th>
                                    <th>Transaction Type</th>
                                    <th>Amount</th>
                                    <th>Transaction Date</th>
                                    <th>Notes</th>
                                    <th>Add/Remove Row</th>
                                </tr>
                                </thead>
                                <tbody id="tablebody">
                                <tr>
                                    <td>
                                        <select class="form-control custom-select" data-placeholder="Choose an Account"
                                                tabindex="1" name="account[]" required>
                                            <option>--Choose an account--</option>
                                            @foreach($account as $ac)
                                                <option value="{{$ac->id}}">{{$ac->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control custom-select" data-placeholder="Choose Type"
                                                tabindex="1" name="type[]" required>
                                            <option>--Type of transaction--</option>
                                            <option value="d">Debit</option>
                                            <option value="c">Credit</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" id="ammount" name="amount[]" class="form-control" required>
                                    </td>
                                    <td rowspan="0">
                                        <input type="date" id="date" name="date" class="form-control" required>
                                    </td>
                                    <td rowspan="0">
                                        <textarea rows="6" type="text" id="note" name="notes"
                                                  class="form-control" required></textarea>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-info" id="addtr"><i class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control custom-select" data-placeholder="Choose an Account"
                                                tabindex="1" name="account[]" required>
                                            <option>--Choose an account--</option>
                                        @foreach($account as $ac)
                                                <option value="{{$ac->id}}">{{$ac->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control custom-select" data-placeholder="Choose a Category"
                                                tabindex="1" name="type[]" required>
                                            <option>--Type of transaction--</option>
                                            <option value="d">Debit</option>
                                            <option value="c">Credit</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" id="amount" name="amount[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger" id="remtr" onclick="deleteRowFunction(this);"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="float-right btn btn-lg btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#addtr").click(function () {
            $("#maintable").each(function () {
                var tds = '<tr>';
                jQuery.each($('tr:last td', this), function () {
                    tds += '<td>' + $(this).html() + '</td>';
                });
                tds += '</tr>';
                if ($('tbody', this).length > 0) {
                    $('tbody', this).append(tds);
                } else {
                    $(this).append(tds);
                }
            });
        });
        $("#addj").click(function () {
            var jo = $('#journals');
            var j = jo.clone();
            $('#forms').append(j).after(jo);
        });

        function deleteRowFunction(btndel) {
            if (typeof (btndel) == "object") {
                $(btndel).closest("tr").remove();
            } else {
                return false;
            }
        }
    </script>
@endsection
