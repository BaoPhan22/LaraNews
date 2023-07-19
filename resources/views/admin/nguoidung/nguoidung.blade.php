<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tin') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto shadow-md sm:rounded-lg mt-3">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        Tên
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Biệt danh
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Các bài viết
                    </th>
                    <th scope="col" class="px-6 py-4">
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!$data->count())
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4" colspan="5">
                            Không có dữ liệu
                        </td>
                    </tr>
                @else
                    @foreach ($data as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  {{ $item['role'] !== 0 ? 'dark:text-white' : 'dark:text-red-400' }}">
                                {{ $item['name'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item['name_display'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['email'] }}
                            </td>
                            <td class="px-6 py-4">
                                <ul>
                                    @foreach ($item['news'] as $itemNews)
                                        <li><a class="font-medium text-blue-400 dark:text-blue-500 hover:underline"
                                                href="{{ url('tin', $itemNews->id) }}">{{ $itemNews->title }}</a></li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="px-3 py-4 flex flex-col items-center justify-center">
                                <a href="{{ url('nguoidung/' . $item->id . '/edit') }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Sửa thông
                                    tin</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


</x-app-layout>
