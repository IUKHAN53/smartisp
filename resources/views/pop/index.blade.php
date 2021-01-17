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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pop List</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="{{route('pop.create')}}" role="button" title="" data-toggle="tooltip"
                   data-original-title="Add"><i class="ti-plus"></i>Add new Pop</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>POP Name</th>
                        <th>Mobile Number</th>
                        <th>Address</th>
                        <th>Profiles(Price)</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $d['pop']->popname }}</td>
                            <td>{{ $d['pop']->mobile }}</td>
                            <td>{{ $d['pop']->address }}</td>
                            <td>
                                @foreach($d['profiles'] as $p)
                                    <label class="badge badge-success">{{ \App\Package::all()->find($p->package_id)->name }}
                                        <span class="small">({{$p->price}})</span> </label>
                                @endforeach
                            </td>
                            <td>
                                <form id="delete_form" action="{{ route('franchise.destroy', $d['pop']->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="btn btn-outline-cyan" role="button"
                                   href="{{ route('franchise.edit',$d['pop']->id)}}" title="" data-toggle="tooltip"
                                   data-original-title="Edit Network"><i class="ti-pencil"></i></a>
                                <a class="btn btn-outline-danger" role="button" onclick="del()" title=""
                                   data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
                                <a class="btn btn-outline-info" role="button" data-toggle="modal" title="" data-target=".bd-example-modal-lg"
                                   data-original-title="Add User"><i class="fa fa-user-plus"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modal"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add user to Pop</h4>
                                    <form id="userform">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Enter Name" id="name">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control"
                                                   placeholder="Enter username">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Enter Email Address">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password"
                                                   class="form-control"
                                                   placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control"
                                                   type="password"
                                                   name="password_confirmation"
                                                   placeholder="Confirm Password"
                                                   id="pcq-burst-threshold">
                                        </div>
                                        <button class="btn btn-success" id="userform_submit">Add new
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
            $('#userform_submit').click(function (event) {
                event.preventDefault()
                var datastring = $("#userform").serialize();
                $('#userform').html('Sending..');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: "/pop/createuser",
                    data: {
                        name : $('#name').val(),
                        kind : $('#kind').val(),
                        pcq_rate : $('#pcq-rate').val(),
                        pcq_burst_rate : $('#pcq-burst-rate').val(),
                        pcq_burst_threshold : $('#pcq-burst-threshold').val(),
                        pcq_burst_time : $('#pcq-burst-time').val(),
                        dst : $('#dst').val(),
                        src : $('#src').val(),
                    },
                    success: function (response) {
                        $('#modal').modal('toggle');
                        Swal.fire('Good job!',
                            response,
                            'success')
                    },
                });
            });
        }
    </script>
@endsection
