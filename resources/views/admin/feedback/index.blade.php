<x-admin-layout title="Feedback Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('feedback.index') }}" value="Feedback List" />
            </x-admin.breadcrumbs>

            <x-slot name="toolbar">
                {{-- <a href="{{route('quotation.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    Add New Quotation
                </a> --}}
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    <livewire:admin.feedback.index />
</x-admin-layout>