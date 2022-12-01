<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /**
     * This function is to return list of categories with given pagination data.
     * @param Request $request
     * @return mixed
     */
    public function getCategoryList (Request $request)
    {
        $param = $request->all();
        $page = !empty($param['page']) ? $param['page'] : 1;
        $limit = !empty($param['limit']) ? $param['limit'] : 10;
        $getAllCategories = !empty($param['all']) ? $param['all'] : 0;

        if ($getAllCategories == 0) {
            $query = DB::table('categories')->where('active', 1);
            $categories = $query->forPage($page, $limit)->get();
        } else {
            $categories = Category::get();
        }




        return $categories;
    }

    /**
     * List nests products under their category
     * @param Request $request
     * @return mixed
     */
    public function getCategoryProducts (Request $request)
    {
        $categories = Category::where('parent_id',0)->get();
        $allCategories = $this->findSubCategories(0);

        return $allCategories;
    }

    /**
     * Recursive function to find nested sub-categories
     * @param $id
     * @return array
     */
    private function findSubCategories ($id)
    {
        $result = [];
        $categories = Category::where('parent_id', $id)->get();

        if(!empty($categories)) {

            if(count($categories) > 0) {

                foreach ($categories as $category) {
                    $subCategories = $this->findSubCategories($category->id);
                    $productsObjects = [];
                    $category->products = CategoryProduct::where('category_id', $category->id)->get();
                    foreach ($category->products as $categoryProduct) {
                        $productsObjects[] = Products::where('id', $categoryProduct->product_id)
                            ->where('active', 1)
                            ->get()->first();
                    }
                    $productsArray = [];
                    foreach ($productsObjects as $product) {
                        $tmp = [
                            'id' => $product->id,
                            'name' => $product->name,
                            'price' => $product->price
                        ];
                        $productsArray[] = json_decode(json_encode($tmp), true);
                    }

                    $tmp = [
                        'id' => $category->id,
                        'name' => $category->name,
                        'children' => $subCategories,
                        'products' => $productsArray
                    ];
                    $result[] = $tmp;
                }
            }
        }
        return $result;
    }

}

