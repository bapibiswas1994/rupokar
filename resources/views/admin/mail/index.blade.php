<x-admin-layout title="Mail Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('mail.index') }}" value="Mail Templates List" />
            </x-admin.breadcrumbs>

            <x-slot name="toolbar">
                <a href="{{route('mail.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    Add New Mail Templates
                </a>
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    <livewire:admin.mail.index />
</x-admin-layout>