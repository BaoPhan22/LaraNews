<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m">
            {{ __('Loại tin') }}
        </h2>
    </x-slot>

    @if (Auth::user()->role == 0)
        <div class="w-full flex justify-end">
            <a href="{{ route('admin.loaitin.add') }}"
                class="block my-3 mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-6 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Thêm
                loại tin</a>
        </div>
    @endif

    <div class="overflow-x-auto shadow-md sm:rounded-lg mt-3">
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
                    @if (Auth::user()->role == 0)
                        <th scope="col" class="px-6 py-4">
                        </th>
                    @endif
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
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a class="font-medium text-blue-400 dark:text-blue-500 hover:underline"
                                    href="{{ route('admin.loaitin.show', $item['id']) }}">{{ $item['name'] }}</a>


                            </th>
                            <td class="px-6 py-4">
                                {{ $item['lang'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['order'] === null ? 'Chưa có' : $item['order'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ (int) $item['isVisible'] === 1 ? 'Hiện' : 'Ẩn' }}
                            </td>
                            @if (Auth::user()->role == 0)
                                <td class="px-3 py-4 flex flex-col items-center justify-center">
                                    <a href="{{ route('admin.loaitin.edit', ['newCate' => $item]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Sửa</a>
                                    <form method="POST"
                                        action="{{ route('admin.loaitin.destroy', ['newCate' => $item->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Xóa</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


</x-app-layout>
