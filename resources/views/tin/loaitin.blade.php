<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loại tin') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-end">
        <a href="{{ route('loaitin.add') }}"
            class="block my-3 mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-6 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Thêm
            loại tin</a>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        Tên
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Ngôn ngữ
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Thứ tự
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Ẩn hiện
                    </th>
                    <th scope="col" class="px-6 py-4">
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (empty($data))
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
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['ten'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item['lang'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['thuTu'] === null ? 'Chưa có' : $item['thuTu'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ (int) $item['anHien'] === 1 ? 'Hiện' : 'Ẩn' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('loaitin.edit', $item['id']) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


</x-app-layout>
