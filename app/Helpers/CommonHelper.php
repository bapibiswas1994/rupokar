<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * @param int $user_id User-id
 *
 * @return string
 */

if (!function_exists('pr')) {
    function pr($array = array()) {
        echo '<pre>';
        print_r($array);
        die;
    }
}

if (!function_exists('dealerCommission')) {
    function dealerCommission($amount, $percentage) {
        return $amount + ($amount - (($amount * $percentage) / 100));
    }
}

if (!function_exists('couponDiscount')) {
    function couponDiscount($product_id) {
        return $data = DB::table('products_master')
        ->select('coupons.*')
        ->leftjoin('products_brands_relations', 'products_master.id', 'products_brands_relations.product_id')
        ->leftjoin('products_category_relations', 'products_master.id', 'products_category_relations.product_id')
        ->leftjoin('tbl_categories', 'products_category_relations.category_id' ,'tbl_categories.id')
        ->leftjoin('coupon_brands', 'products_brands_relations.brand_id', 'coupon_brands.brand_id')
        ->leftjoin('coupon_subcategories', 'products_category_relations.category_id', 'coupon_subcategories.category_id')
        ->leftjoin('coupons', 'tbl_categories.parent_id', 'coupons.category_id')
        ->leftjoin('coupons as c1', 'coupon_subcategories.coupon_id', 'c1.id')
        ->leftjoin('coupons as c2', 'coupon_brands.coupon_id', 'c2.id')
        ->where('products_master.id', $product_id)
        ->orderBy('coupons.amount', 'asc')
        ->groupBy('coupons.id')
        ->first();
    }
}

if (!function_exists('imgUpload')) {
    function imgUpload($rootFolderPath, $file) {
        $realPath = $file->getRealPath();
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getClientMimeType(); // $file->getMimeType();
        $fileName = md5(microtime()) . '.' . $extension;

        \File::makeDirectory($rootFolderPath, $mode = 0777, true, true);
        $img = Image::make($realPath);

        // store web file
        \File::makeDirectory($rootFolderPath . '/web', $mode = 0777, true, true);
        $img->resize(1024, 786, function ($constraint) {
            $constraint->aspectRatio();
        })->save($rootFolderPath . '/web/' . $fileName);

        // store api file
        \File::makeDirectory($rootFolderPath . '/api', $mode = 0777, true, true);
        $img->resize(1080, 676, function ($constraint) {
            $constraint->aspectRatio();
        })->save($rootFolderPath . '/api/' . $fileName);

        // store thumbnail file
        \File::makeDirectory($rootFolderPath . '/thumbnail', $mode = 0777, true, true);
        $img->resize(150, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($rootFolderPath . '/thumbnail/' . $fileName);

        return $fileName;
    }
}

if (!function_exists('unlinkImg')) {
    function unlinkImg($rootFolderPath, $fileName) {
        if (!empty($fileName)) {
            if (file_exists($rootFolderPath . '/web/' . $fileName)) {
                unlink($rootFolderPath . '/web/' . $fileName);
            }
            if (file_exists($rootFolderPath . '/api/' . $fileName)) {
                unlink($rootFolderPath . '/api/' . $fileName);
            }
            if (file_exists($rootFolderPath . '/thumbnail/' . $fileName)) {
                unlink($rootFolderPath . '/thumbnail/' . $fileName);
            }
        }
    }
}


if (!function_exists('getImgPath')) {
    function getImgPath($folder, $fileName, $subFolder = 'web') {
        $name = 'storage/images/'.$folder.'/'.$subFolder.'/'.$fileName;
        return file_exists(public_path($name))?asset($name):'';
    }
}

if (!function_exists('objectToArray')) {
    function objectToArray($obj) {
        return json_decode(json_encode($obj), true);
    }
}