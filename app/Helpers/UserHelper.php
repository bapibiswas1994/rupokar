<?php

namespace App\Helpers;

use App\Customer;
use App\Models\Orders\Order;
use App\UserAddress;
use App\Wishlist;
use App\Customerservicerequest;

class UserHelper
{
    // register

    //login

    //logout

    //profile
    public static function getUserProfileInfo($user_id)
    {
        $getDta = Customer::with('address')
            ->where('id', '=', $user_id)
            ->get()
            ->toArray();
        return $getDta;

    }

    public static function getAllAddress($user_id)
    {
        $getDta = UserAddress::where('user_id', '=', $user_id)
            ->get()
            ->toArray();
        return $getDta;

    }

    public static function getAllWishlist($user_id)
    {
        // $getDta = Wishlist::with('product','categories_relations')
        //     ->where('user_id', '=', $user_id)
        //     ->get()
        //     ->toArray();

        $getDta = Wishlist::join('products_master', 'products_master.id', '=', 'wishlists.product_id')
            ->join('products_category_relations', 'products_category_relations.product_id', '=', 'products_master.id')
            ->join('tbl_categories', 'tbl_categories.id', '=', 'products_category_relations.category_id')
            ->join('products_brands_relations', 'products_brands_relations.product_id', '=', 'products_master.id')
            ->join('tbl_brands', 'tbl_brands.id', '=', 'products_brands_relations.brand_id')
            ->join('products_images_relation', 'products_images_relation.product_id', '=', 'products_master.id')
            ->join('attachments', 'attachments.id', '=', 'products_images_relation.attachment_id')
            ->join('sellers', 'sellers.id', '=', 'products_master.seller_id')
            ->join('stock_management', 'stock_management.product_id', '=', 'products_master.id')
            ->select(
                'tbl_categories.cat_title',
                'tbl_brands.brand_title',
                'products_master.product_title',
                'attachments.filename',
                'attachments.path',
                'sellers.shop_name',
                'products_master.*'
            )
            ->where('products_images_relation.featured', 1)
            ->where('tbl_brands.brand_status', 1)
            ->where('tbl_categories.cat_status', 1)
            ->where('products_master.status', 1)
            ->where('products_master.is_approved', 1)
            ->where('wishlists.user_id', $user_id)
            ->get()
            ->toArray();

        return $getDta;

    }

    public static function getAllOrders($user_id)
    {
        $getDta = Order::with('address')
            ->where('user_id', '=', $user_id)
            ->get()
            ->toArray();
        return $getDta;

    }

    public static function getAllCustomerServiceRequest($user_id)
    {
        $getDta = Customerservicerequest::where('user_id', '=', $user_id)
            ->get()
            ->toArray();
        return $getDta;
    }


}

// $get_product = DB::SELECT('SELECT
//             pm.id,pm.product_title,
//             sm.*
//         FROM
//             products_master pm
//         INNER JOIN products_images_relation pir
//             ON pm.id = pir.product_id
//         INNER JOIN attachments att
//             ON att.id = pir.attachment_id
//         INNER JOIN products_category_relations pcr
//             ON pcr.product_id = pm.id
//         INNER JOIN tbl_categories tc
//             ON tc.id = pcr.category_id
//         INNER JOIN products_brands_relations pbr
//             ON pbr.product_id = pm.id
//         INNER JOIN tbl_brands tb
//             ON tb.id = pbr.brand_id
//         INNER JOIN(
//             SELECT id as sm_id,
//                 MIN(portal_listing_price) portal_listing_price,
//                 product_id,
//                 mrp_price,
//                 sell_price,
//                 seller_id
//             FROM
//                 stock_management
//             GROUP BY
//                 product_id
//             ) sm
//             ON sm.product_id = pm.id

//         and pir.featured = 1
//         and tc.cat_status = 1
//         and tb.brand_status = 1
//         and pm.status = 1
//         and pm.is_approved = 1
//         and pm.deleted_at is null
//         order by pm.menu_order asc');
