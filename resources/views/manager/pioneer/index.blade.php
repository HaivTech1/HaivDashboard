<x-app-layout>
    @section('title', application('name')." | Settings Page")

    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Pioneer</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </div>
    </x-slot>

    <livewire:manager.pioneer.index />
</x-app-layout>