<x-admin.table>
    {{-- <x-slot name="search">
        <x-admin.input type="search" class="form-control form-control-sm" wire:model.debounce.500ms="search"
            aria-controls="kt_table_1" id="generalSearch" />
    </x-slot> --}}
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>

    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Mail Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('mail_name')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Mail Subject <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('mail_subject')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Mail Type <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('mail_type')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 10%;"
                aria-label="Company Email: activate to sort column ascending">Mail CC <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('mail_cc')"></i>
            </th>
            {{-- <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Mail Body <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('mail_body')"></i>
            </th> --}}
            {{-- <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Mail T&C <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('first_name')"></i>
            </th> --}}
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Status: activate to sort column ascending">Status</th>

            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
        </tr>
        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchMailName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchMailSubject" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchMailType"
                    title="Select" data-col-index="2">
                    <option value="-1">Select Mail Type</option>
                    @foreach ($mailTypes as $item)
                        <option value="{{ $item['id'] }}">{{ ucwords($item['mail_type_name']) }}</option>
                    @endforeach                   
                </select>
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchMailCC" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            {{-- <th>
                <x-admin.input type="search" placeholder="" autocomplete="off" class="form-control-sm form-filter" />
            </th> --}}
            {{-- <th>
                <x-admin.input type="search" placeholder="" autocomplete="off" class="form-control-sm form-filter" />
            </th> --}}

            <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select Mail Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </th>
            <th>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </th>
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($mail_templates as $template)
            <tr role="row" class="odd">
                <td>{{ $template->mail_name }}</td>
                <td>{{ $template->mail_subject }}</td>
                <td>
                    <a class="kt-link" href="{{ $template->mail_type_id }}">{{ ucwords($template->mailType->mail_type_name) }}</a>
                </td>
                <td>{{ $template->mail_cc }}</td>
                {{-- <td>{!! $template->mail_body !!}</td>
                <td>{!! $template->terms_conditions !!}</td> --}}
                <td class="align-center">
                    <span
                        class="kt-badge  kt-badge--{{ $template->active == 1 ? 'success' : 'warning' }} kt-badge--inline kt-badge--pill cursor-pointer"
                        wire:click="changeStatusConfirm({{ $template->id }})">
                        {{ $template->active == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <x-admin.td-action>
                    <a class="dropdown-item" href="{{ route('mail.edit', ['mail' => $template->id]) }}"><i
                            class="la la-edit"></i> Edit</a>
                    <button href="#" class="dropdown-item" wire:click="deleteAttempt({{ $template->id }})"><i
                            class="fa fa-trash"></i> Delete</button>
                </x-admin.td-action>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $mail_templates->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $mail_templates->firstitem() ?? 0 }} to {{ $mail_templates->lastitem() ?? 0 }} of {{
        $mail_templates->total() }} entries
    </x-slot>
</x-admin.table>