@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Product entry</div>
                    <div class="panel-body">


                        <form method="POST" id="myForm" class="form-horizontal" role="form" action="{{url
                            ('/products')}}">
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                <label for="product_name" class="col-md-4 control-label">Product name</label>

                                <div class="col-md-6">

                                    <input id="product_name" type="text" class="form-control" name="product_name"
                                           value="{{ old
                                    ('product_name') }}" autofocus>


                                    @if ($errors->has('product_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('quantity_in_stock') ? ' has-error' : '' }}">
                                <label for="quantity_in_stock" class="col-md-4 control-label">Quantity in
                                    stock</label>

                                <div class="col-md-6">
                                    <input id="quantity_in_stock" type="text" class="form-control"
                                           name="quantity_in_stock"
                                           value="{{ old('quantity_in_stock') }}">

                                    @if ($errors->has('quantity_in_stock'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('quantity_in_stock') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('price_per_item') ? ' has-error' : '' }}">
                                <label for="price_per_item" class="col-md-4 control-label">Price per item</label>

                                <div class="col-md-6">
                                    <input id="price_per_item" type="text" class="form-control"
                                           name="price_per_item"
                                           value="{{ old('price_per_item') }}">

                                    @if ($errors->has('price_per_item'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price_per_item') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <div id="message"></div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button id="bt" class="btn btn-primary">
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Product history</div>
            <div class="panel-body">

                {{--@if($products->count() > 0)--}}


                <table class="table table-hover table-bordered table-striped">

                    <thead>
                    <th>Id</th>
                    <th>Product name</th>
                    <th>Quantity in stock</th>
                    <th>Price per item</th>
                    <th>Create at</th>
                    <th>Total value number</th>
                    <th>Modify</th>
                    </thead>

                    <tbody>

                    <div id="tableMsg"></div>


                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="{{ asset('js/main.js') }}"></script>
@endsection
