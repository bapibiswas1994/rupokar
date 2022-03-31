<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class CartHelper
{

    //Base Url
    public static function baseUrl()
    {
        $url = config('app.url');
        return $url;
    }

    public static function add_to_cart()
    {

        //return $getDta;

    }

    public static function show_cart($cart_id)
    {
        $get_all_cart_item = Cart::with('cart_items')
            ->where('id', '=', $cart_id)
            ->get()
            ->toArray();
        return $get_all_cart_item;

    }

    public static function remove_item_from_cart($cart_id, $product_id)
    {
        $get_cart_product = CartItem::where('cart_id', '=', $cart_id)->where('product_id', '=', $product_id)->first();
        $is_delete = $get_cart_product->destroy();

        return $is_delete;

    }

    public static function showCart($cart_id)
    {
        $base_url = self::baseUrl();

        // $allCartItem = DB::SELECT("SELECT
        //         ct.id as cart_id,ct.user_id,
        //         ci.id as cart_item_id,ci.product_id,ci.product_quantity,ci.seller_id as cart_seller_id,ci.is_service_installation_available,ci.is_rms_service_available,
        //         pm.product_title,
        //         CONCAT('$base_url','/',att.path,'/',att.filename) AS imageurl,
        //         tc.delivery_rate AS delivery_charge,tc.service_installation_charges,tc.rms_service_charges,
        //         sm.*
        //     FROM cart ct
        //     INNER JOIN cart_item ci
        //         ON ct.id = ci.cart_id
        //     INNER JOIN  products_master pm
        //         ON pm.id = ci.product_id
        //     INNER JOIN products_images_relation pir
        //         ON pm.id = pir.product_id
        //     INNER JOIN attachments att
        //         ON att.id = pir.attachment_id
        //     INNER JOIN products_category_relations pcr
        //         ON pcr.product_id = pm.id
        //     INNER JOIN tbl_categories tc
        //         ON tc.id = pcr.category_id
        //     INNER JOIN(
        //         SELECT id AS stock_id,
        //             MIN(portal_listing_price) portal_listing_price,
        //             product_id,
        //             mrp_price,
        //             sell_price,
        //             seller_id
        //         FROM
        //             stock_management
        //         GROUP BY
        //             product_id
        //     ) sm
        //         ON sm.product_id = ci.product_id
        //     INNER JOIN sellers sl
        //         ON sl.id = sm.seller_id
        //     WHERE  ct.id = $cart_id");

        // return $allCartItem;

        $allCartItem = Cart::join('cart_item', 'cart_item.cart_id', '=', 'cart.id')
            ->join('products_master', 'products_master.id', '=', 'cart_item.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')

            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')

            ->join('stock_management', 'stock_management.product_id', "=", 'products_master.id')

            ->select(
                DB::raw("CONCAT('$base_url','/',attachments.path,'/',attachments.filename) AS imageurl"),
                DB::raw('max(stock_management.portal_listing_price) as portal_listing_price'),
                'cart.id as cart_id',
                'cart.user_id',
                'cart_item.id as cart_item_id',
                'cart_item.product_id',
                'cart_item.product_quantity',
                'cart_item.seller_id as cart_seller_id',
                'cart_item.is_service_installation_available',
                'cart_item.is_rms_service_available',
                'tbl_categories.cat_title',
                'tbl_categories.delivery_rate AS delivery_charge',
                'tbl_categories.service_installation_charges',
                'tbl_categories.rms_service_charges',
                'tbl_brands.brand_title',
                'products_master.product_title',
                'products_master.product_slug',
                'sellers.shop_name as seller_business_name',
                'stock_management.mrp_price',
                'stock_management.sell_price',
                'stock_management.seller_id',
            )
            ->groupBy('stock_management.product_id')
            ->where('cart.id', $cart_id)
            ->get();

        return $allCartItem;

    }

}
