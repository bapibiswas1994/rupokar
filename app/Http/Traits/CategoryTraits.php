<?php

namespace App\Http\Traits;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

trait CategoryTraits
{

    //Return Parent Category using recursive function
    public function getParentCategory($catId)
    {
        $cat = Category::find($catId);

        if ($cat->parent_id > 0) {
            return self::getParentCategory($cat->parent_id);
        } else {
            return $cat->id;
        }
    }

    //Return Chiild Category under parent category using recursive function
    public function getCategories($parent = 0, $notIn = array(0))
    {

        $base_url = config('app.url');
        $url = $base_url . '/admin-assets/Uploads/brandimages/';

        $cats = Category::select(
            DB::raw("CONCAT('$url',image) AS image_url"),
            'id',
            'parent_id',
            'title',
            'slug',
            'image',
            'status',
            'short_desc',
            'long_desc',
            'meta_key',
            'meta_desc'
        )
            ->where('status', 1)
            ->where('parent_id', $parent)
            ->orderBy('id', 'asc')
            ->whereNotIn('id', [$notIn])
            //->take(20)
            ->get();

        $catsSubCats = [];

        foreach ($cats as $cat) {
            $cat->chields = $this->getCategories($cat->id, $notIn);
            $catsSubCats[] = $cat;
        }

        return $catsSubCats;
    }

    public function getManageCategories()
    {
        $allManageCategory = Category::where('parent_id', '<>', 0)
            ->select('categories.*')
            ->get()
            ->toArray();
        return $allManageCategory;
    }
}
