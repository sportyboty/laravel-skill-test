@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Product entry</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/products/'.
                        $product->id) }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                <label for="product_name" class="col-md-4 control-label">Product name</label>

                                <div class="col-md-6">

                                    <input id="product_name" type="text" class="form-control" name="product_name"
                                           value="{{$product->product_name}}" autofocus>


                                    @if ($errors->has('product_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('quantity_in_stock') ? ' has-error' : '' }}">
                                <label for="quantity_in_stock" class="col-md-4 control-label">Quantity in stock</label>

                                <div class="col-md-6">
                                    <input id="quantity_in_stock" type="text" class="form-control"
                                           name="quantity_in_stock"
                                           value="{{$product->quantity_in_stock}}">

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
                                           value="{{$product->price_per_item}}">

                                    @if ($errors->has('price_per_item'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price_per_item') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
