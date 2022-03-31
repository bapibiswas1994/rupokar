<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $productHelper;

    //simple DI
    // public function __construct(ProductHelper $productHelper)
    // {
    //     $this->productHelper = $productHelper;
    // }

    //Return Parent Category using recursive function
    public function getParentCategory($catId)
    {
        $cat = Category::find($catId);

        if ($cat->parent_id > 0) {
            return $this->getParentCategory($cat->parent_id);
        } else {
            return $cat->id;
        }
    }

    //Return Chiild Category under parent category using recursive function
    public function getCategories($parent = 0, $notIn = array(0))
    {

        $cats = Category::where('status', 1)
            ->where('parent_id', $parent)
            ->orderBy('id', 'asc')
            ->whereNotIn('id', [$notIn])
            ->take(20)
            ->get();

        $catsSubCats = [];

        foreach ($cats as $cat) {
            $cat->chields = $this->getCategories($cat->id, $notIn);
            $catsSubCats[] = $cat;
        }

        return $catsSubCats;
    }

    public function index()
    {
        //dd('catehory');
        $categories = $this->getCategories();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {

        $allcat = $this->getCategories();
        return view('admin.category.create', compact('allcat'));
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

    public function edit($id)
    {
        $category = Category::find($id);
        $allcat = $this->getCategories(0, $id);
        return view('admin.category.edit', compact('category', 'allcat'));
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

    //update view commision rate and service available or not based on category
    public function managecategory()
    {
        $allCategory = Category::where('parent_id', '<>', 0)
            ->select('tbl_categories.*')
            ->get();
        return view('admin.category.cat-manage', compact('allCategory'));
    }
    public function manageCategorySevice()
    {
        $category = Category::find(request('catid'));
        $category->is_service_available = request('service');
        $category->commision_rate = request('commison');
        $category->hsncode = request('hsncode');
        $category->gst_rate = request('gst');
        $category->delivery_rate = request('deliveryrate');
        $category->save();

        return redirect()->back()->with('success', 'Data Updated Successfully!');
    }

    public function serviceInstallation(Request $request)
    {

        try {

            if (request('service_installation') != 0) {
                if (request('service_installation_charges') != null) {
                    $category = Category::find(request('catid'));
                    $category->is_service_available = request('service_installation');
                    $category->service_installation_charges = request('service_installation_charges');
                    $category->save();

                    $notification = array(
                        'message' => 'Updated Successfully!!',
                        'alert-type' => 'success',
                    );
                    return redirect()->back()->with($notification);
                    //return redirect()->back()->with('success', 'Data Updated Successfully!');
                } else {
                    $notification = array(
                        'message' => 'Service and Installation Charges not to be empty',
                        'alert-type' => 'warning',
                    );
                    return redirect()->back()->with($notification);
                    //return redirect()->back()->with('worning', 'Service Installation Charges not to be empty');
                }
            } else {
                //dd($request->all());
                $category = Category::find(request('catid'));
                $category->is_service_available = request('service_installation');
                $category->service_installation_charges = null;
                //dd($category);
                $category->save();
                $notification = array(
                    'message' => 'Updated Successfully',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
                //return redirect()->back()->with('success', 'Data Updated Successfully!');
            }
        } catch (\Throwable $th) {
            $notification = array(
                'message' => $th->getMessage(),
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
            //return redirect()->back()->with('error', $th);
        }
    }

    public function rmsService(Request $request)
    {

        try {

            if (request('rms_service') != 0) {
                if (request('rms_service_charges') != null) {
                    $category = Category::find(request('catid'));
                    $category->is_rms_available = request('rms_service');
                    $category->rms_service_charges = request('rms_service_charges');
                    $category->save();

                    $notification = array(
                        'alert-type' => 'success',
                        'message' => 'Updated Successfully!!',
                    );
                    return redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'alert-type' => 'warning',
                        'message' => 'RMS service charges not to be empty',

                    );
                    return redirect()->back()->with($notification);
                }
            } else {

                $category = Category::find(request('catid'));
                $category->is_rms_available = request('service_installation');
                $category->rms_service_charges = null;
                $category->save();
                $notification = array(
                    'alert-type' => 'success',
                    'message' => 'Updated Successfully',
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Throwable $th) {
            $notification = array(
                'alert-type' => 'error',
                'message' => $th->getMessage(),

            );
            return redirect()->back()->with($notification);
        }
    }

    public function productListingRate(Request $request)
    {
        //dd($request->all());
        try {

            if (request('product_listing_rate') !== null) {
                //dd($request->all());
                $category = Category::find(request('catid'));
                $category->product_listing_rate = request('product_listing_rate');
                $category->save();

                $notification = array(
                    'message' => 'Updated Successfully!!',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Product Listing Rate Empty!!',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $notification = array(
                'message' => $th->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function location()
    {
        $locations = Location::paginate(10);
        return View('admin.category.location', compact('locations'));
    }

    public function saveLocation(Request $request)
    {
        $this->validate($request, [
            'location_name' => 'required|min:2|max:50',
        ]);

        DB::beginTransaction();

        try {
            $location = new Location();
            $location->location_name = request('location_name');
            $isSeved = $location->save();

            if ($isSeved) {

                DB::commit();
                $notification = array(
                    'message' => 'Location Added Successfully',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            } else {

                $notification = array(
                    'message' => 'Location Added Fail!',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            $notification = array(
                'message' => $th->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function categoryLocation()
    {
        $locations = Location::get();
        $all_category = $this->productHelper->getAllCategories();

        //fetch all distinct category id
        //$all_cat_ids = DB::SELECT('SELECT DISTINCT category_id from location_category_relation');
        //dd($all_cat_ids);

        return View('admin.category.category-location-meta', compact('locations', 'all_category'));
    }

    public function saveCategoryLocation(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'location_id' => 'required',
            'category_id' => 'required',
            'meta_key' => 'required',
            'meta_description' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $location_id = request('location_id');
            $category_id = request('category_id');

            $get_data = CategoryLocationRelation::where('category_id', '=', $category_id)
                ->where('location_id', '=', $location_id)
                ->first();

            if (!$get_data) {

                //dd('if',$get_data);

                $cat_loc_rel = new CategoryLocationRelation();
                $cat_loc_rel->location_id = request('location_id');
                $cat_loc_rel->category_id = request('category_id');
                $isSeved = $cat_loc_rel->save();
                if ($isSeved) {

                    $cat_loc_meta = new CategoryLocationMeta();
                    $cat_loc_meta->location_cat_rel_id = $cat_loc_rel->id;
                    $cat_loc_meta->meta_key = request('meta_key');
                    $cat_loc_meta->meta_description = request('meta_description');
                    $isSeved = $cat_loc_meta->save();

                    if ($isSeved) {

                        DB::commit();

                        $notification = array(
                            'message' => 'Category Location Added Successfully',
                            'alert-type' => 'success',
                        );
                        return redirect()->back()->with($notification);
                    } else {

                        $notification = array(
                            'message' => 'Location Added Successfully',
                            'alert-type' => 'error',
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {
                    $notification = array(
                        'message' => 'Location Added Successfully',
                        'alert-type' => 'error',
                    );
                    return redirect()->back()->with($notification);
                }
            } else {
                //dd('else',$get_data);
                $notification = array(
                    'message' => 'Allredy added!',
                    'alert-type' => 'warning',
                );
                return redirect()->back()->with($notification);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            $notification = array(
                'message' => $th->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function viewCategoryLocation($id)
    {

        $sql_qre = 'SELECT
        tc.cat_title,
        lcm.id,
        lcm.meta_key,
        lcm.meta_description,
        loc.location_name
        FROM   `location_category_relation` AS lcr
                INNER JOIN location_category_meta AS lcm
                        ON lcm.location_cat_rel_id = lcr.id
                INNER JOIN tbl_categories AS tc
                        ON tc.id = lcr.category_id
                INNER JOIN location AS loc
                        ON loc.id = lcr.location_id
        WHERE  lcr.location_id = ' . $id . ' ';

        $allCategory = DB::select($sql_qre);
        //dd($allCategory);
        $location = Location::find($id);
        return View('admin.category.view-all-meta', compact('allCategory', 'location'));
    }

    //editLocCatContent
    public function editLocCatContent(Request $request)
    {
        try {

            $id = $request->id;
            $meta_key = $request->meta_key;
            $meta_description = $request->meta_description;

            $getData = CategoryLocationMeta::find($id);
            $getData->meta_key = $meta_key;
            $getData->meta_description = $meta_description;
            $getData->status = 1;
            $isUpdate = $getData->save();

            if ($isUpdate) {

                $responseObject = array(
                    'success' => true,
                    'message' => 'Data Update Succesfully',
                );

                return response()->json($responseObject);
            } else {

                $responseObject = array(
                    'success' => false,
                    'message' => ' Data Update  error!',
                );

                return response()->json($responseObject);
            }
        } catch (\Throwable $th) {

            $responseObject = array(
                'success' => false,
                'message' => $th->getMessage(),
            );

            return response()->json($responseObject);
        }
    }
    public function deleteLocCatContent(Request $request)
    {
        try {

            $id = $request->id;
            $getData = CategoryLocationMeta::find($id);
            //dd($getData->id);
            $getCatRelId = CategoryLocationRelation::find($getData->location_cat_rel_id);
            //dd($getCatRelId->id);
            $isDelete = CategoryLocationRelation::destroy($getCatRelId->id);
            if ($isDelete) {

                CategoryLocationMeta::destroy($getData->id);

                $responseObject = array(
                    'success' => true,
                    'message' => 'Deleted Succesfully',
                );

                return response()->json($responseObject);
            } else {
                $responseObject = array(
                    'success' => false,
                    'message' => ' Deleted error!',
                );

                return response()->json($responseObject);
            }
        } catch (\Throwable $th) {
            $responseObject = array(
                'success' => false,
                'message' => $th->getMessage(),
            );

            return response()->json($responseObject);
        }
    }
}
