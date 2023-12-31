<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tin') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-end">
        <a href="{{ route('tin.binhluan.index', $data['id']) }}"
            class="block my-3 mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-6 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">Xem
            bình luận</a>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        Tiêu đề
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Nội dung
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Tác giả
                    </th>



                </tr>
            </thead>
            <tbody>

                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data['title'] }}
                    </th>

                    <td class="px-6 py-4">
                        {{ $data['content'] }}
                    </td>
                    <td class="px-6 py-4">
                        <a class="font-medium text-blue-400 dark:text-blue-500 hover:underline"
                            href="{{ url('nguoidung', $data['user']->id) }}">{{ $data['user']->name }}</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</x-app-layout>
