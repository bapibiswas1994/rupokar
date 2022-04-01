<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create', ['category' => null]);
    }

    public function store(Request $request)
    {
        try {

            $category = new Category();
            $category->parent_id = $request->input('parent_id') > 0 ? $request->input('parent_id') : 0;
            $category->cat_title = $request->input('title');
            $category->cat_short_desc = $request->input('sdesc');
            $category->cat_long_desc = $request->input('ldesc');
            $category->cat_image = $request->input('cat_image');

            if ($request->hasfile('cat_image')) {
                $file = $request->file('cat_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('admin-assets/Uploads/categoryimages/', $filename);
                $category->cat_image = $filename;
            } else {
                $category->cat_image = '';
            }

            $category->meta_keywords = $request->input('metakey');
            $category->meta_description = $request->input('metadesc');

            $category->save();

            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
            //return redirect()->back()->with('success', 'Category Added Successfully!');
        } catch (\Throwable $th) {

            $notification = array(
                'message' => 'Category Added Error!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function edit(Category $category)
    {
        return view('admin.category.create', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->parent_id = $request->input('parent_id') > 0 ? $request->input('parent_id') : 0;
        $category->cat_title = $request->input('title');
        $category->cat_short_desc = $request->input('sdesc');
        $category->cat_long_desc = $request->input('ldesc');

        $old_img = $request->input('old_image');
        $category->cat_image = $request->input('cat_image');
        if ($request->hasfile('cat_image')) {
            $file = $request->file('cat_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('admin-assets/Uploads/categoryimages/', $filename);
            $category->cat_image = $filename;
            File::delete(public_path('admin-assets/Uploads/categoryimages/' . $old_img));
        } else {

            $category->cat_image = $old_img;
        }

        $category->meta_keywords = $request->input('metakey');
        $category->meta_description = $request->input('metadesc');

        $category->save();

        return redirect()->back()->with('success', 'Category Update Successfully!');
    }

    public function show($id)
    {
        $category = Category::find($id);
        $allcat = $this->getCategories(0, $id);
        return view('admin.category.show', compact('category', 'allcat'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // $image_path = "admin-assets/Uploads/categoryimages/".$category->cat_image;
        // if (file_exists($image_path)) {
        //     @unlink($image_path);
        // }
        // $category->delete();
        $category->cat_status = 0;
        $category->save();
        return redirect()->back()->with('success', 'Category Deleted Successfully!');
    }
}
