<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bình luận trong tin ') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-end">

        {{-- <a href="#"
            class="block my-3 mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-6 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Thêm
            bình luận</a> --}}
        <form method="POST" action="{{ route('tin.binhluan.store', $tin['id']) }}">
            @csrf
            <input type="text" name="content">
            <button type="submit">Bình luận</button>
        </form>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Nội dung
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Người bình luận
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Trạng thái
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
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item['id'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item['content'] }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ url('nguoidung', $item['user']->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $item['user']->name }}</a>

                            </td>
                            <td class="px-6 py-4">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">
                                        <p class="font-medium text-blue-600 dark:text-green-500 hover:underline">
                                            {{ $item['isVisible'] == 1 ? 'Hiện' : 'Ẩn' }}</p>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


</x-app-layout>
