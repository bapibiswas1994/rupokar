<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\CategoryHelper;
use App\Helpers\ProductHelper;

class CategoryController extends Controller
{
    private $categoryHelper;
    private $productHelper;
    //simple DI
    public function __construct(CategoryHelper $categoryHelper, ProductHelper $productHelper)
    {
        $this->productHelper = $productHelper;
        $this->categoryHelper = $categoryHelper;
    }

    public function getItemByCategory(Request $request, $cat_slug = null, $sub_cat_slug = null)
    {
        try {

            dd('work-in-progress');
            $sql_cond_part = '';
            $values = [];
            $ss = '';
            $page = $request->input('page') > 0 ? $request->input('page') + 0 : 1;
            $per_page = 27;
            $offset = ($page - 1) * $per_page;
            $limit = $page * $per_page;

            $catSlug = $sub_cat_slug ? $sub_cat_slug : $cat_slug;
            $getCat = Category::where('slug', $catSlug)->first();

            //For Seo and Brathcome
            $top_cat_id = $this->categoryHelper->getParentCategory($getCat->id);
            $getPCat = Category::find($top_cat_id);

            dd($getCat, $getPCat);

            $cats = array($getCat->id);
            if ($cats && is_array($cats)) {

                $catIds[] = $cats[0] + 0;
                $childCats = $this->categoryHelper->getCategories($cats[0]);

                if (count($childCats) > 0) {
                    foreach ($childCats as $cat) {
                        $catIds[] = $cat->id;
                    }
                }

                $sql_cond_part .= ' and pcr.category_id in (' . implode(",", $catIds) . ') ';
            }

            $allProduct = $this->productHelper->getAllProducts($sql_cond_part, $offset, $per_page, $values);
            dd($allProduct);

            $allProductCount = $this->productHelper->allProducts($sql_cond_part);
            $resCount = count($allProductCount);

            if (count($allProduct) > 0) {
                $sp = ($offset + 1);
                $ep = $limit < $resCount ? $limit : $resCount;
                $resText = "(Showing " . $sp . " - " . $ep . " product of $resCount products)";
            } else {
                $resText = "No Results Found!";
            }

            // ($result, $data['count'], $limit, $page, ['path' => action('MyController@index')]);
            $resPaginator = new \Illuminate\Pagination\LengthAwarePaginator($allProduct, $resCount, $per_page, $page, ['path' => $request->url()]);
            $resPaginator = $resPaginator->appends($request->except('page'));
            return view('user.product-listing', compact('allProduct', 'ss', 'resText', 'resPaginator', 'getCat'));
        } catch (\Throwable $th) {
            return view('404');
        }
    }
    //productByParentCat
    public function productByParentCat(Request $request, $cat_slug = null, $sub_cat_slug = null)
    {
        //dd($request->all(), $cat_slug);

        try {

            $sql_cond_part = '';
            $values = [];
            $ss = '';
            $page = $request->input('page') > 0 ? $request->input('page') + 0 : 1;
            $per_page = 10;
            $offset = ($page - 1) * $per_page;
            $limit = $page * $per_page;

            $catSlug = $sub_cat_slug ? $sub_cat_slug : $cat_slug;
            $cat_id = Category::where('cat_slug', $catSlug)->first();

            //For Seo and Brathcome
            $getCat = Category::find($cat_id->id);
            $top_cat_id = app('App\Http\Controllers\Admin\CategoryController')->getParentCategory($getCat->id);
            $getPCat = Category::find($top_cat_id);
            //dd($getPCat);

            $cats = array($cat_id->id);
            if ($cats && is_array($cats)) {

                $catIds[] = $cats[0] + 0;
                $childcats = app('App\Http\Controllers\Admin\CategoryController')->getCategories($cats[0]);

                if (count($childcats) > 0) {
                    foreach ($childcats as $cat) {
                        $catIds[] = $cat->id;
                    }
                }

                $sql_cond_part .= ' and pcr.category_id in (' . implode(",", $catIds) . ') ';
            }

            $allproduct = $this->productHelper->getAllProducts($sql_cond_part, $offset, $per_page, $values);


            $allproductcount = $this->productHelper->allProducts($sql_cond_part);
            $resCount = count($allproductcount);

            if (count($allproduct) > 0) {
                $sp = ($offset + 1);
                $ep = $limit < $resCount ? $limit : $resCount;
                $resText = "(Showing " . $sp . " - " . $ep . " product of $resCount products)";
            } else {
                $resText = "No Results Found!";
            }

            // ($result, $data['count'], $limit, $page, ['path' => action('MyController@index')]);
            $resPaginator = new \Illuminate\Pagination\LengthAwarePaginator($allproduct, $resCount, $per_page, $page, ['path' => $request->url()]);
            $resPaginator = $resPaginator->appends($request->except('page'));

            $get_cat_loc_meta = '';
            $get_location = '';

            return view('user.product-listing', compact('allproduct', 'ss', 'resText', 'resPaginator', 'get_location', 'getCat', 'get_cat_loc_meta'));
        } catch (\Throwable $th) {
            //dd($th);
            return view('404');
        }
    }

    public function productByBrand($brand_slug, Request $request)
    {
        $brand = Brand::where('brand_slug', $brand_slug)->first();
        //dd($brand);

        $sql_cond_part = '';
        $values = [];
        $ss = '';

        $brands = array($brand->id);

        $s = $request->input('s');

        $page = $request->input('page') > 0 ? $request->input('page') + 0 : 1;
        $per_page = 10;
        $offset = ($page - 1) * $per_page;
        $limit = $page * $per_page;

        if ($brands && is_array($brands)) {
            $sql_cond_part .= ' and pbr.brand_id in (' . implode(",", $brands) . ') ';
        }

        if ($s) {
            $sql_cond_part .= ' and pm.product_title rlike :search ';
            $values['search'] = $s;
            $ss = $s;
        }

        $allproduct = $this->productHelper->getAllProducts($sql_cond_part, $offset, $per_page, $values);
        //dd($allproduct);

        $allproductcount = $this->productHelper->allProducts($sql_cond_part);
        $resCount = count($allproductcount);

        if (count($allproduct) > 0) {
            $sp = ($offset + 1);
            $ep = $limit < $resCount ? $limit : $resCount;
            $resText = "(Showing " . $sp . " - " . $ep . " product of $resCount products)";
        } else {
            $resText = "No Results Found!";
        }

        // ($result, $data['count'], $limit, $page, ['path' => action('MyController@index')]);
        $resPaginator = new \Illuminate\Pagination\LengthAwarePaginator($allproduct, $resCount, $per_page, $page, ['path' => $request->url()]);
        $$resPaginator = $resPaginator->appends($request->except('page'));

        return view('user.brand-listing', compact('allproduct', 'ss', 'resText', 'resPaginator', 'brand'));
    }

    public function productDetails($product_slug)
    {

        $getProduct = ProductMaster::where('product_slug', '=', $product_slug)->first();
        $product = $this->productHelper->productDetails($getProduct->id);

        $getCat = Category::find($product->cat_id);
        $getPCat = '';
        if ($getCat->parent_id > 0) {
            $top_cat_id = app('App\Http\Controllers\Admin\CategoryController')->getParentCategory($getCat->id);
            $getPCat = Category::find($top_cat_id);
        }
        $cats = array($getCat->id);
        $sql_cond_part = '';
        if ($cats && is_array($cats)) {

            $catIds[] = $cats[0] + 0;
            $childcats = app('App\Http\Controllers\Admin\CategoryController')->getCategories($cats[0]);

            if (count($childcats) > 0) {
                foreach ($childcats as $cat) {
                    $catIds[] = $cat->id;
                }
            }

            $sql_cond_part .= ' and pcr.category_id in (' . implode(",", $catIds) . ') ';
        }

        $allSimilarProduct = $this->productHelper->allProducts($sql_cond_part);
        $all_recommended_products = $this->productHelper->get_list_of_recommended_product_by_cat_ids($product->cat_id);
        $product_meta = $this->productHelper->getMetasStruct($getProduct->id);
        $product_image = $this->productHelper->getAllProductImages($getProduct->id);

        $schema_object = new \stdClass();
        $schema_object->product_name = $product->product_title;
        $schema_object->description = $product->product_shortdesc;
        $schema_object->brand_title = $product->brand_title;
        $schema_object->images = $product_image;
        $get_schema_string = $this->createSchema($schema_object);

        $get_location = null;
        $get_cat_loc_meta = null;

        //dd($product_meta);
        return view('user.product-details', compact('product', 'getProduct', 'product_meta', 'product_image', 'getPCat', 'get_schema_string', 'allSimilarProduct', 'all_recommended_products', 'get_cat_loc_meta', 'get_location'));
    }

    public function productFeaturedImage($product_id)
    {
        $prodImage = DB::table('products_images_relation')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->where('products_images_relation.product_id', $product_id)
            ->where('products_images_relation.featured', 1)
            ->select('attachments.filename', 'attachments.path')
            ->first();

        return $prodImage;
    }
}
