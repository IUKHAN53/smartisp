@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Office Used Product</h4>
                <form class="form p-t-20">
                    <div class="form-group">
                        <label>Select Franchise</label>
                        <select class="custom-select form-control required" id="category"
                                name="category">
                            <option value="">--Select Franchise--</option>
                            @foreach($franchise as $f)
                                <option value="{{$f['id']}}">{{$f['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="add_block mt-3">
                        <label>Hardware</label><br>
                        <a href="#" class="btn-copy btn btn-outline-primary">Add Item</a>
                        <div class="block">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputuname">Product</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="ti-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                           placeholder="Username" aria-label="Username"
                                                           aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Quantity</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon2"><i
                                                                        class="ti-email"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                           placeholder="Email"
                                                           aria-label="Email"
                                                           aria-describedby="basic-addon2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Comments</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon2"><i
                                                                        class="ti-email"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                           placeholder="Email"
                                                           aria-label="Email"
                                                           aria-describedby="basic-addon2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <a href="#" class="remove btn btn-outline-danger"><i class="fas fa-cross"></i>Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(".btn-copy").on('click', function () {
            $(".block").clone().appendTo(".add_block");
        })
        $('body').on('click', '.remove', function () { // use event delegation because you're adding to the DOM
            $(this).parent('.block').remove();
        });
    </script>

@endpush
