<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chỉnh sửa thông tin') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto shadow-md sm:rounded-lg mt-3">
        <form action="{{ route('nguoidung.update', $data['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $data->name }}">
            <input type="text" name="name_display" value="{{ $data->name_display }}">
            <input type="email" name="email" value="{{ $data->email }}">
            <button type="submit">Chỉnh sửa thông tin</button>
        </form>
    </div>


</x-app-layout>
