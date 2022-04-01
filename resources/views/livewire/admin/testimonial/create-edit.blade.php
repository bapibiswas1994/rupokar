<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="User Name" />
            <x-admin.dropdown wire:model.defer="user_id" placeHolderText="Please select user" autocomplete="off"
                class="{{ $errors->has('user_id') ? 'is-invalid' :'' }}">
                @foreach ($userList as $user)
                    <x-admin.dropdown-item :value="$user->id" :text="$user->full_name" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="user_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Ratings" />
            <x-admin.dropdown wire:model.defer="ratings" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('ratings') ? 'is-invalid' :'' }}">
                @foreach ($ratingList as $rating)
                    <x-admin.dropdown-item :value="$rating['value']" :text="$rating['text']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="ratings" />
        </x-admin.form-group>

        <x-admin.form-group class="col-lg-4">
            <x-admin.lable value="Status" />
            <x-admin.dropdown wire:model.defer="status" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('status') ? 'is-invalid' :'' }}">
                @foreach ($statusList as $status)
                    <x-admin.dropdown-item :value="$status['value']" :text="$status['text']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="status" />
        </x-admin.form-group>

        <x-admin.form-group class="col-lg-12" wire:ignore>
            <x-admin.lable value="Description" required />
            <x-admin.textarea wire:model.defer="description" class="{{ $errors->has('description') ? 'is-invalid' :'' }}">
            </x-admin.textarea>
            <x-admin.input-error for="description" />
        </x-admin.form-group>

        </div>
        <br />
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('users.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
    </x-form-section>