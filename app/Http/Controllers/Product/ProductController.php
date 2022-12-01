<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * This function allow users to add product to the table.
     * @param Request $request
     * @return array
     */
    public function createProduct (Request $request)
    {
        $param = $request->all();
        $name = !empty($param['name']) ? $param['name'] : '';
        $price = !empty($param['price']) ? $param['price'] : '';
        $active = !empty($param['active']) ? $param['active'] : [];
        $categories = !empty($param['categories']) ? $param['categories'] : [];

        $response = [
            'status' => 200
        ];

        if (!empty($name) && !empty($price) && !empty($categories)) {
            $product = Products::create([
                'name' => $name,
                'price' => $price,
                'active' => $active['value']
            ]);
            $productId = $product->id;

            foreach ($categories as $category) {
                CategoryProduct::create([
                    'product_id' => $productId,
                    'category_id' => (int)$category['id'],
                    'active' => $active['value']
                ]);
            }

        } else {
            $response['status'] = 400;
        }

        return $response;
    }

}

