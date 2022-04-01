<x-admin-layout title="CMS Management">
	<x-slot name="subHeader">
		<x-admin.sub-header headerTitle="">
			<x-admin.breadcrumbs>
				<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
				<x-admin.breadcrumbs-separator />
				<x-admin.breadcrumbs-item href="javascript::void(0);" value="Privacy Policy" />
			</x-admin.breadcrumbs>

			<x-slot name="toolbar">
				{{-- <a href="{{route('users.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
					<i class="la la-plus"></i>
					Add New User
				</a> --}}
			</x-slot>
		</x-admin.sub-header>
	</x-slot>
	<livewire:admin.c-m-s.privacy-policy />
</x-admin-layout>