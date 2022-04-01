<x-admin-layout title="Testimonial Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('testimonial.index') }}" value="Testimonial List" />
            </x-admin.breadcrumbs>

            <x-slot name="toolbar">
                <a href="{{route('testimonial.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    Add New Testimonial
                </a>
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    <livewire:admin.testimonial.index />
</x-admin-layout>