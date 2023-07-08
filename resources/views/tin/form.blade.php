<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ !isset($data) ? __('Thêm loại tin') : __('Cập nhật loại tin') }}
        </h2>
    </x-slot>

    <div class="w-1/2 m-auto">
        <form class="w-full mt-3"
            action="{{ isset($data) ? route('loaitin.update', ['id' => $data->id]) : route('loaitin.store') }}"
            method="POST">
            @csrf
            @isset($data)
                @method('PUT')
            @endisset
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="name">
                        Loại tin
                    </label>
                    <input
                        class="appearance-none block w-full bg-wtext-white text-grey-500 border border-wtext-white rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-wtext-white"
                        type="text" placeholder="Tên loại tin" id="name" name="name"
                        value="{{ $data->ten ?? old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="language">
                        Ngôn ngữ
                    </label>
                    <select
                        class="appearance-none block w-full bg-wtext-white text-grey-500 border border-wtext-white rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-wtext-white "
                        name="language" id="language">
                        <option value="vi" {{ isset($data) && $data['lang'] === 'vi' ? 'selected' : '' }}>Tiếng Việt
                        </option>
                        <option value="en" {{ isset($data) && $data['lang'] === 'en' ? 'selected' : '' }}>Tiếng Anh
                        </option>
                    </select>
                    @error('language')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-last-name">
                        Thứ tự
                    </label>
                    <input
                        class="appearance-none block w-full bg-wtext-white text-grey-500 border border-wtext-white rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-wtext-white "
                        id="grid-last-name" type="number" placeholder="Doe" name="order"
                        value="{{ $data->thuTu ?? old('ten') }}">
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-last-name">
                        Ẩn hiện
                    </label>
                    <div class="flex items-center mb-2">
                        <input checked id="default-radio-1" type="radio" value="1" name="isVisible"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{ isset($data) && (int) $data['anHien'] === 1 ? 'checked' : '' }}>
                        <label for="default-radio-1"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hiện</label>
                    </div>
                    <div class="flex items-center">
                        <input id="default-radio-2" type="radio" value="0" name="isVisible"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{ isset($data) && (int) $data['anHien'] === 0 ? 'checked' : '' }}>
                        <label for="default-radio-2"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ẩn</label>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                @isset($data)
                    Cập nhật loại tin
                @else
                    Thêm loại tin
                @endisset
            </button>
        </form>
    </div>




</x-app-layout>
