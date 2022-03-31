<?php

namespace App\Helpers;

use App\BestOfCategories;
use App\EditorChoice;
use App\FeaturedProduct;
use App\Helpers\CategoryHelper;
use App\Models\ComboProduct;
use App\MonthsBestSellers;
use App\ProductImageRelation;
use App\ProductMeta;
use App\ProductOnDiscount;
use App\RecommendedProductRelation;
use App\RenewableMix;
use App\SmartHomePicks;
use Illuminate\Support\Facades\DB;

class ProductHelper
{
    //Base Url
    public static function baseUrl()
    {
        $url = config('app.url');
        return $url;
    }

    //All Product BY Category(parent and child) and brand wise
    public function allProducts($sql_cond_part)
    {

        $base_url = self::baseUrl();

        $allproduct = DB::SELECT("SELECT
            pm.id,pm.product_title,pm.product_shortdesc,pm.product_longdesc,
            pm.product_slug,pm.type,pm.total_wattage,pm.meta_keywords,pm.meta_description,
            pm.status AS product_status,pm.is_approved,
            sm.*,sl.shop_name AS seller_business_name,
            att.path,att.filename,CONCAT('$base_url','/',att.path,'/',att.filename) AS imageurl,
            tb.brand_title,
            tc.id AS cat_id,tc.cat_title,tc.hsncode,tc.is_service_available,tc.service_installation_charges,
            tc.is_rms_available,tc.rms_service_charges,tc.gst_rate,tc.product_listing_rate,tc.delivery_rate AS delivery_charge
        FROM
            products_master pm
        INNER JOIN products_images_relation pir
            ON pm.id = pir.product_id
        INNER JOIN attachments att
            ON att.id = pir.attachment_id
        INNER JOIN products_category_relations pcr
            ON pcr.product_id = pm.id
        INNER JOIN tbl_categories tc
            ON tc.id = pcr.category_id
        INNER JOIN products_brands_relations pbr
            ON pbr.product_id = pm.id
        INNER JOIN tbl_brands tb
            ON tb.id = pbr.brand_id
        INNER JOIN(
            SELECT id AS stock_id,
                MIN(portal_listing_price) portal_listing_price,
                product_id,
                mrp_price,
                sell_price,
                seller_id
            FROM
                stock_management
            GROUP BY
                product_id
        ) sm
            ON sm.product_id = pm.id
        INNER JOIN sellers sl
            ON sl.id = sm.seller_id
        AND pir.featured = 1
        AND tc.cat_status = 1
        AND tb.brand_status = 1
        AND pm.is_approved = 1
        AND pm.status = 1
        AND pm.deleted_at is null
        $sql_cond_part
        ORDER BY pm.menu_order ASC");

        return $allproduct;
    }

    //Product Details Full Complet
    public static function productDetails($product_id)
    {

        $base_url = self::baseUrl();

        $get_product = DB::SELECT("SELECT
            pm.id,pm.product_title,pm.product_shortdesc,pm.product_longdesc,
            pm.product_slug,pm.type,pm.total_wattage,pm.meta_keywords,pm.meta_description,
            pm.status AS product_status,pm.is_approved,
            sm.*,sl.shop_name AS seller_business_name,
            att.path,att.filename,CONCAT('$base_url','/',att.path,'/',att.filename) AS imageurl,
            tb.brand_title,
            tc.id AS cat_id,tc.cat_title,tc.hsncode,tc.is_service_available,tc.service_installation_charges,
            tc.is_rms_available,tc.rms_service_charges,tc.gst_rate,tc.product_listing_rate,tc.delivery_rate AS delivery_charge
        FROM
            products_master pm
        INNER JOIN products_images_relation pir
            ON pm.id = pir.product_id
        INNER JOIN attachments att
            ON att.id = pir.attachment_id
        INNER JOIN products_category_relations pcr
            ON pcr.product_id = pm.id
        INNER JOIN tbl_categories tc
            ON tc.id = pcr.category_id
        INNER JOIN products_brands_relations pbr
            ON pbr.product_id = pm.id
        INNER JOIN tbl_brands tb
            ON tb.id = pbr.brand_id
        INNER JOIN(
            SELECT id AS stock_id,
                MIN(portal_listing_price) portal_listing_price,
                product_id,
                mrp_price,
                sell_price,
                seller_id
            FROM
                stock_management
            GROUP BY
                product_id
        ) sm
        ON
            sm.product_id = pm.id
        INNER JOIN sellers sl
            ON sl.id = sm.seller_id
        WHERE
            pm.id =" . $product_id);

        $product_details = $get_product[0];

        return $product_details;
    }

    //Product all specification Full Complet
    public function getMetasStruct($product_id, $parent = 0, $notIn = array(0))
    {
        $metas = ProductMeta::where('product_id', $product_id)
            ->where('parent_id', $parent)
            ->orderBy('id', 'asc')
            ->whereNotIn('id', [$notIn])
            ->take(2000)
            ->get();

        $metasSubMetas = [];

        foreach ($metas as $meta) {
            $meta->children = $this->getMetasStruct($product_id, $meta->id, $notIn);
            $metasSubMetas[] = $meta;
        }

        return $metasSubMetas;
    }

    //Product all image with full url Full Complet
    public function getAllProductImages($product_id)
    {
        $base_url = self::baseUrl();

        $allProductImages = ProductImageRelation::join('attachments', 'attachments.id', 'products_images_relation.attachment_id')
            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                'attachments.*',
                'products_images_relation.featured'
            )
            ->where('products_images_relation.product_id', $product_id)
            ->get();

        return $allProductImages;
    }

    //======================//

    public function getAllCategories()
    {
        //return app('App\Http\Controllers\Admin\CategoryController')->getCategories();
        return CategoryHelper::getCategories();
    }

    public function get_all_recommended_product_id_by_cat_id($id)
    {

        return RecommendedProductRelation::where('category_id', '=', $id)->select('product_id')->get()->toArray();
    }

    public function get_all_recommended_product()
    {

        //fetch all distinct category id
        $all_cat_ids = DB::SELECT('SELECT DISTINCT category_id from recommended_product_releation');

        $all_recommended_products = array();

        for ($i = Count($all_cat_ids) - 1; $i >= 0; $i--) {

            $current_cat_id = $all_cat_ids[$i]->category_id;

            // echo $current_cat_id;

            $get_product_by_cat_id = $this->get_list_of_recommended_product_by_cat_ids($current_cat_id);

            //dd($get_product_by_cat_id[0]->cat_title);

            $cat_object = new \stdClass();

            //set the category name by fetch first object category name from array of products objects
            $cat_object->category_name = $get_product_by_cat_id[0]->cat_title;
            $cat_object->total_products_count = count($get_product_by_cat_id);
            $cat_object->products = $get_product_by_cat_id;

            array_push($all_recommended_products, $cat_object);

        }

        return $all_recommended_products;

    }

    public function get_list_of_recommended_product_by_cat_ids($cat_id)
    {
        $sql_qre = 'SELECT       pm.*,
                                rpr.id as rpm_id,
                                tbl_categories.cat_title,
                                tbl_brands.brand_title,
                                pm.status  AS product_status,
                                attachments.filename,
                                attachments.path,
                                rpr.status AS recommended_product_status,
                                sellers.first_name,
                                sellers.last_name,
                                sm.*
                                FROM   recommended_product_releation rpr
                                INNER JOIN products_master pm
                                        ON pm.id = rpr.product_id
                                INNER JOIN tbl_categories
                                        ON tbl_categories.id = rpr.category_id
                                INNER JOIN products_brands_relations
                                        ON products_brands_relations.product_id = pm.id
                                INNER JOIN tbl_brands
                                        ON tbl_brands.id = products_brands_relations.brand_id
                                INNER JOIN products_images_relation
                                        ON products_images_relation.product_id = pm.id
                                INNER JOIN attachments
                                        ON attachments.id = products_images_relation.attachment_id
                                INNER JOIN sellers
                                        ON sellers.id = pm.seller_id
                                INNER JOIN(SELECT id as sm_id,
                                            MIN(portal_listing_price) portal_listing_price,
                                            product_id,
                                            mrp_price,
                                            sell_price,
                                            seller_id
                                            FROM
                                                stock_management
                                            GROUP BY
                                                product_id
                                        ) sm
                                        ON
                                        sm.product_id = pm.id
                                WHERE  tbl_categories.id = ' . $cat_id . '
                                AND products_images_relation.featured = 1
                                AND tbl_categories.cat_status = 1
                                ORDER  BY rpr.id DESC ';

        $allproduct = DB::select($sql_qre);

        return $allproduct;

    }

    public function getAllProducts($sql_cond_part, $offset, $per_page, $values = null)
    {

        $selectQry = 'SELECT pm.id, pm.product_title,pm.product_slug,pm.menu_order,pm.status,pm.type,
        sm.product_id,sm.seller_id,sm.mrp_price,sm.sell_price,sm.product_quantity,sm.portal_listing_price,sm.status as stock_status,
        att.path, att.filename, pcr.category_id,tc.cat_title, pbr.brand_id,tb.brand_title ';

        $sqlQuery = ' FROM `products_master` pm
                        inner join products_images_relation pir
                                on pm.id = pir.product_id
                        inner join attachments att
                                on att.id = pir.attachment_id
                        inner join products_category_relations pcr
                                on pcr.product_id = pm.id
                        inner join tbl_categories tc
                                on tc.id = pcr.category_id
                        inner join products_brands_relations pbr
                                on pbr.product_id = pm.id
                        inner join tbl_brands tb
                                on tb.id = pbr.brand_id

                        inner join (
                                SELECT DISTINCT MIN(sell_price) AS sellPrice,product_id,status as smStatus,seller_id,mrp_price,sell_price,portal_listing_price,product_quantity,status

                                FROM   stock_management
                                GROUP BY
                                        product_id
                                ) as sm
                                ON pm.id = sm.product_id


                        and pir.featured = 1
                        and tc.cat_status = 1
                        and tb.brand_status = 1
                        and sm.status = 1
                        and pm.status = 1
                        and pm.is_approved = 1
                        and pm.deleted_at is null
                        ' . $sql_cond_part . '
                        order by pm.menu_order asc ';

        $limitQry = ' limit ' . $offset . ', ' . $per_page . ' ';

        //$allproduct = DB::select($selectQry . $sqlQuery . $limitQry);
        $allproduct = DB::select($selectQry . $sqlQuery . $limitQry, $values);

        return $allproduct;
    }

    public function listOfActiveProduct()
    {
        //  this helper is for generate xml file .But it can be use for other purpose
        //  Whatever attaribute is needed just append it
        // It will return all list of  product which are currently active
        $sql_qre = 'SELECT     pm.id,
                                pm.product_title,
                                pm.product_shortdesc,
                                pm.price,
                                pm.sell_price,
                                pm.admin_sell_price,
                                attachments.filename,
                                attachments.path,
                                tb.brand_title,
                                pm.product_slug
                        FROM   products_master pm
                                INNER JOIN products_brands_relations
                                        ON products_brands_relations.product_id = pm.id
                                INNER JOIN tbl_brands tb
                                        ON tb.id = products_brands_relations.brand_id
                                INNER JOIN products_images_relation
                                        ON products_images_relation.product_id = pm.id
                                INNER JOIN attachments
                                        ON attachments.id = products_images_relation.attachment_id
                        WHERE  pm.deleted_at IS NULL
                        ORDER  BY pm.id DESC ';

        $allproduct = DB::select($sql_qre);

        return $allproduct;
    }

    //======================//

    public static function allFeaturedProduct($count = null)
    {

        $base_url = self::baseUrl();

        $allFeaturedProducts = FeaturedProduct::join('products_master', 'products_master.id', '=', 'featured_product.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')

            ->leftJoin('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->join('sellers', 'sellers.id', '=', 'stock_management.seller_id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'featured_product.status',
                'featured_product.menu_order as menuOrder',
                'featured_product.id as fpid',
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.id',
                'products_master.product_title',
                'products_master.product_slug',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('featured_product.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('products_master.status', 1)
            ->where('stock_management.status', 1)
            ->orderBy('menuOrder', 'ASC')
            ->groupBy('stock_management.product_id')
            ->take($count)
            ->get();

        return $allFeaturedProducts;

        // $privilaged_users = User::leftJoin('orders', 'orders.user_id',"=", 'users.id')
        //             ->select('name','phone_number',DB::raw('max(orders.total) as orders_total'))
        //             ->groupBy('orders.user_id')
        //             ->get();

        // $get_product_min_value = StockManagement::select(['*', DB::raw('MIN(portal_listing_price) AS portal_listing_price')])
        // ->where('product_id', $product->id)
        // ->groupBy('product_id')
        // ->first();
    }

    public static function allMonthsBestProduct($count = null)
    {
        $base_url = self::baseUrl();

        $allProducts = MonthsBestSellers::join('products_master', 'products_master.id', '=', 'months_best_sellers.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')

            ->leftJoin('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'months_best_sellers.status',
                'months_best_sellers.menu_order as menuOrder',
                'months_best_sellers.id as tdpid',
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.id',
                'products_master.product_title',
                'products_master.product_slug',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('months_best_sellers.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('products_master.status', 1)
            ->where('stock_management.status', 1)
            ->groupBy('stock_management.product_id')
            ->orderBy('menuOrder', 'ASC')
            ->take($count)
            ->get();

        return $allProducts;
    }

    public static function allProductOnDiscountProduct($count = null)
    {
        $base_url = self::baseUrl();

        $allProducts = ProductOnDiscount::join('products_master', 'products_master.id', '=', 'product_on_discount.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')

            ->leftJoin('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'product_on_discount.status',
                'product_on_discount.menu_order as menuOrder',
                'product_on_discount.id as bspid',
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.id',
                'products_master.product_title',
                'products_master.product_slug',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('product_on_discount.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('products_master.status', 1)
            ->where('stock_management.status', 1)
            ->groupBy('stock_management.product_id')
            ->orderBy('menuOrder', 'ASC')
            ->take($count)
            ->get();

        return $allProducts;
    }

    public static function allSmartHomePicksProduct($count = null)
    {
        $base_url = self::baseUrl();

        $allProducts = SmartHomePicks::join('products_master', 'products_master.id', '=', 'smart_home_picks.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')

            ->leftJoin('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'smart_home_picks.status',
                'smart_home_picks.menu_order as menuOrder',
                'smart_home_picks.id as tdpid',
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.id',
                'products_master.product_title',
                'products_master.product_slug',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('smart_home_picks.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('products_master.status', 1)
            ->where('stock_management.status', 1)
            ->groupBy('stock_management.product_id')
            ->orderBy('menuOrder', 'ASC')
            ->take($count)
            ->get();
        return $allProducts;
    }

    public static function allRenewableMixProduct($count = null)
    {
        $base_url = self::baseUrl();

        $allProducts = RenewableMix::join('products_master', 'products_master.id', '=', 'renewable_mix.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')

            ->leftJoin('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'renewable_mix.status',
                'renewable_mix.menu_order as menuOrder',
                'renewable_mix.id as bspid',
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.id',
                'products_master.product_title',
                'products_master.product_slug',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('renewable_mix.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('products_master.status', 1)
            ->where('stock_management.status', 1)
            ->groupBy('stock_management.product_id')
            ->orderBy('menuOrder', 'ASC')
            ->take($count)
            ->get();

        return $allProducts;
    }

    public static function allBestOfCategoriesProduct($count = null)
    {
        $base_url = self::baseUrl();

        $allProducts = BestOfCategories::join('products_master', 'products_master.id', '=', 'best_of_categories.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')

            ->leftJoin('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'best_of_categories.status',
                'best_of_categories.menu_order as menuOrder',
                'best_of_categories.id as bspid',
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.id',
                'products_master.product_title',
                'products_master.product_slug',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('best_of_categories.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('products_master.status', 1)
            ->where('stock_management.status', 1)
            ->groupBy('stock_management.product_id')
            ->orderBy('menuOrder', 'ASC')
            ->take($count)
            ->get();
        return $allProducts;
    }

    public static function allEditorChoiceProduct($count = null)
    {
        $base_url = self::baseUrl();

        $allProducts = EditorChoice::join('products_master', 'products_master.id', '=', 'editor_choice.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')

            ->leftJoin('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'editor_choice.status',
                'editor_choice.menu_order as menuOrder',
                'editor_choice.id as bspid',
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.id',
                'products_master.product_title',
                'products_master.product_slug',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('editor_choice.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('products_master.status', 1)
            ->where('stock_management.status', 1)
            ->groupBy('stock_management.product_id')
            ->orderBy('menuOrder', 'ASC')
            ->take($count)
            ->get();
        return $allProducts;
    }

    //======================//

    //Poroduct Stock min price
    public static function productStockMinPrice($product_id)
    {
        $get_product = DB::SELECT('SELECT
                pm.id,pm.product_title,
                sm.*
            FROM
                products_master pm
            INNER JOIN(
                SELECT id as sm_id,
                    MIN(portal_listing_price) portal_listing_price,
                    product_id,
                    mrp_price,
                    sell_price,
                    seller_id
                FROM
                    stock_management
                GROUP BY
                    product_id
            ) sm
            ON
                sm.product_id = pm.id
            WHERE

            pm.id =' . $product_id);

        $product_stock_min_price = $get_product[0];

        return $product_stock_min_price;
    }

    public static function getAllComboProducts($product_id)
    {
        $getComboProduct = ComboProduct::join('products_master', 'products_master.id', '=', 'sm_combo_product.combo_product_id')
            ->select('products_master.product_title', 'sm_combo_product.*')
            ->where('master_product_id', '=', $product_id)
            ->get();
        return $getComboProduct;
    }

}
