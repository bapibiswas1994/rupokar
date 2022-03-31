<?php

namespace App\Helpers;

use App\Customer;
use App\Models\Orders\Order;
use App\UserAddress;
use App\Wishlist;

class OrdersHelper
{

    public static function getAllOrders($user_id)
    {
        // $getDta = Customer::with('orders')
        //     ->where('id', '=', $user_id)
        //     ->get()
        //     ->toArray();
        $getDta = Order::where('user_id', '=', $user_id)
            ->get()
            ->toArray();
        return $getDta;
    }

    public static function getAOrderDetails($order_id)
    {
        $getDta = Order::where('id', '=', $order_id)
            ->first()
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
