<x-admin-layout title="CMS Management">
	<x-slot name="subHeader">
		<x-admin.sub-header headerTitle="">
			<x-admin.breadcrumbs>
				<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
				<x-admin.breadcrumbs-separator />
				<x-admin.breadcrumbs-item href="{{ route('admin.cms.faqs') }}" value="FAQ's List" />
			</x-admin.breadcrumbs>

			<x-slot name="toolbar">
				<a href="{{route('admin.cms.add-faq')}}" class="btn btn-brand btn-elevate btn-icon-sm">
					<i class="la la-plus"></i>
					Add New FAQ's
				</a>
			</x-slot>
		</x-admin.sub-header>
	</x-slot>
	<livewire:admin.c-m-s.faqs />
</x-admin-layout>