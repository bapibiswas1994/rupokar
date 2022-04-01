<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Traits\AlertMessage;
use App\Http\Traits\CategoryTraits;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddEdit extends Component
{
    use AlertMessage;
    use CategoryTraits;
    public $allCat;
    public $parent_id, $title, $short_desc, $long_desc, $image, $meta_key, $meta_desc, $status;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($category = null)
    {
        if ($category) {
            $this->category = $category;
            $this->fill($this->category);
            $this->isEdit = true;
            $this->parent_id = $category->parent_id;
        } else {
            $this->category = new Category();
        }
        $this->allCat = $this->getCategories();

        $this->statusList = [
            ['value' => 0, 'text' => "Please select one"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
    }

    public function validationRuleForSave(): array
    {
        return [
            'parent_id' => ['nullable'],
            'title' => ['required'],
            'short_desc' => ['nullable'],
            'long_desc' => ['nullable'],
            'image' => ['nullable'],
            'meta_key' => ['nullable'],
            'meta_desc' => ['nullable'],
        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'parent_id' => ['nullable'],
            'title' => ['required'],
            'short_desc' => ['nullable'],
            'long_desc' => ['nullable'],
            'image' => ['nullable'],
            'meta_key' => ['nullable'],
            'meta_desc' => ['nullable'],
        ];
    }

    public function saveOrUpdate()
    {
        DB::beginTransaction();
        try {

            //dd($this->category);
            // 0 => "parent_id"
            // 1 => "title"
            // 2 => "slug"
            // 3 => "short_desc"
            // 4 => "long_desc"
            // 5 => "image"
            // 6 => "meta_key"
            // 7 => "meta_desc"
            // 8 => "status"
            $this->category->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

            // $category = new Category();
            // $category->parent_id = $request->input('parent_id') > 0 ? $request->input('parent_id') : 0;
            // $category->title = $request->input('title');
            // $category->short_desc = $request->input('sdesc');
            // $category->long_desc = $request->input('ldesc');
            // $category->cat_image = $request->input('cat_image');

            // if ($request->hasfile('cat_image')) {
            //     $file = $request->file('cat_image');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time() . '.' . $extension;
            //     $file->move('admin-assets/Uploads/categoryimages/', $filename);
            //     $category->cat_image = $filename;
            // } else {
            //     $category->cat_image = '';
            // }

            // $category->meta_keywords = $request->input('metakey');
            // $category->meta_description = $request->input('metadesc');

            // $category->save();

            // $notification = array(
            //     'message' => 'Category Added Successfully',
            //     'alert-type' => 'success',
            // );
            // return redirect()->back()->with($notification);

            DB::commit();
            $msgAction = 'category was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
            $this->showToastr("success", $msgAction);
            return redirect()->route('admin.category.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            $notification = array(
                'message' => 'Category Added Error!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
    public function render()
    {
        return view('livewire.admin.category.add-edit');
    }
}
