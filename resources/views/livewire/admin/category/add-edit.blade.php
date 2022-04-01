<div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            {{-- <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Custom Controls
                    </h3>
                </div>
            </div> --}}
            <!--begin::Form-->
            <form class="kt-form" wire:submit.prevent='saveOrUpdate'>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="custom-select form-control" name="parent_id" wire:model.defer='parent_id'>
                                    <option value="0">Select Parent</option>
                                    @foreach ($allCat as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @if (count($cat->chields) > 0)
                                            @foreach ($cat->chields as $children)
                                                <option value="{{$children->id}}">=>{{$children->title}}</option>
                                                @if (count($children->chields) > 0)
                                                    @foreach ($children->chields as $child2)
                                                        <option value="{{$child2->id}}">=>=>{{$child2->title}}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="input title here.." wire:model.defer='title'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description<span class="text-danger">*</span></label>
                                <input type="text" name="sdesc" class="form-control" placeholder="input title here.." wire:model.defer='short_desc'>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File Browser</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile" wire:model.defer='image'>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Long Description <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="5" name="ldesc" class="form-control" wire:model.defer='long_desc'></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Key<span class="text-danger">*</span></label>
                                <input type="text" name="metakey" class="form-control" placeholder="input title here.." wire:model.defer='meta_key'/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status<span class="text-danger">*</span></label>
                                <select class="custom-select form-control" name="status" wire:model.defer='status'>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meta Description <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="5" name="metadesc" class="form-control" wire:model.defer='meta_desc'></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
</div>