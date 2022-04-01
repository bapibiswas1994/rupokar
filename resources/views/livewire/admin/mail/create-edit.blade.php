<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Mail Type" required />
            <x-admin.dropdown wire:model.defer="mail_type_id" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('mail_type_id') ? 'is-invalid' :'' }}">
                <x-admin.dropdown-item :value="$blankArr['value']" :text="$blankArr['text']" />
                @foreach ($mailtypes as $mailtype)
                    <x-admin.dropdown-item :value="$mailtype['id']" :text="$mailtype['mail_type_name']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="mail_type_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Mail Title" required />
            <x-admin.input type="text" wire:model.defer="mail_name" placeholder="mail title"
                class="{{ $errors->has('mail_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mail_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Mail Subject" required />
            <x-admin.input type="text" wire:model.defer="mail_subject" placeholder="mail subject"
                class="{{ $errors->has('mail_subject') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mail_subject" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Mail CC" required />
            <x-admin.input type="text" wire:model.defer="mail_cc" placeholder="mail cc"
                class="{{ $errors->has('mail_cc') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mail_cc" />
        </x-admin.form-group>

        {{-- <x-admin.form-group>
            <x-admin.lable value="Status" required />
            <x-admin.dropdown wire:model.defer="active" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                <x-admin.dropdown-item :value="$blankArr['value']" :text="$blankArr['text']" />
                @foreach ($statusList as $status)
                <x-admin.dropdown-item :value="$status['value']" :text="$status['text']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="active" />
        </x-admin.form-group> --}}

        <x-admin.form-group class="col-lg-12" wire:ignore>
            <x-admin.lable value="Mail Body" required />
            <textarea x-data x-init="editor = CKEDITOR.replace('mail_body');
                editor.on('change', function(event){
                    @this.set('mail_body', event.editor.getData());
                })" wire:model.defer="mail_body" id="mail_body"
                class="form-control {{ $errors->has('mail_body') ? 'is-invalid' :'' }}"></textarea>
                <x-admin.input-error for="mail_body" />
        </x-admin.form-group>

        <x-admin.form-group class="col-lg-12" wire:ignore>
            <x-admin.lable value="Terms conditions" />
            <textarea x-data x-init="editor = CKEDITOR.replace('terms_conditions');
                editor.on('change', function(event){
                    @this.set('terms_conditions', event.editor.getData());
                })" wire:model.defer="terms_conditions" id="terms_conditions"
                class="form-control {{ $errors->has('terms_conditions') ? 'is-invalid' :'' }}"></textarea>
                <x-admin.input-error for="terms_conditions" />
        </x-admin.form-group>
        </div>
        <br>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('mail.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
    </x-form-section>