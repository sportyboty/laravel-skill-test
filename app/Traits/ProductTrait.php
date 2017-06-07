<?php

    namespace App\Traits;

    trait ProductTrait {


        public function handleJson($data) {
            $path = public_path('/products.json');

            $file = file_get_contents($path);

            $jsonDecode = json_decode($file, true);

            array_push($jsonDecode['Products'], $data);

            $jsonEncode = json_encode($jsonDecode, true);

            file_put_contents($path, $jsonEncode);
        }

        public function convertToJson($data)
        {
//            return json_encode($data);

            return response()->json($data);
        }
    }