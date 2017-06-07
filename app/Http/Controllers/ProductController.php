<?php

    namespace App\Http\Controllers;

    use App\Product;
    use App\Traits\ProductTrait;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Redirect;
    use League\Flysystem\File;

    class ProductController extends Controller {

        use ProductTrait;

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index() {

            $products = Product::orderBy('created_at' , 'asc')->get();

            return $this->convertToJson($products);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create() {

            return view('products.form', compact('products'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request) {

            $this->validate($request, [
                'product_name' => 'required|string|max:30',
                'quantity_in_stock' => 'required|integer|max:1000000',
                'price_per_item' => 'required|integer|max:5000',
            ]);

            $total_value_numbers = $request->quantity_in_stock * $request->price_per_item;
            $data = Product::create(['product_name' => $request->product_name,
                'quantity_in_stock' => $request->quantity_in_stock,
                'price_per_item' => $request->price_per_item,
                'total_value_numbers' => $total_value_numbers
            ]);

            $data->save();

            $this->handleJson($data);


//
//        return Redirect::route('products.index');
        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id) {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id) {
            $product = Product::findOrFail($id);

            return view('products.edit', compact('product'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id) {
            $this->validate($request, [
                'product_name' => 'required|string|max:30' . $id,
                'quantity_in_stock' => 'required|integer|max:1000000' . $id,
                'price_per_item' => 'required|integer|max:5000' . $id,
            ]);

            $product = Product::findOrFail($id);

            $total_value_numbers = $request->quantity_in_stock * $request->price_per_item;
            $product->update(['product_name' => $request->product_name,
                'quantity_in_stock' => $request->quantity_in_stock,
                'price_per_item' => $request->price_per_item,
                'total_value_numbers' => $total_value_numbers
            ]);

            return Redirect::route('products.create');

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id) {
            Product::destroy($id);

            return Redirect::route('products.index');

        }
    }
