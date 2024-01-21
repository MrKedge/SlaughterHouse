<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Receipt'])

<body class="bg-[#f6f8fa] overflow-hidden">


    @extends('client.layout.masterlayout')

    @section('content')
        {{-- main content --}}
        <div class="flex flex-col w-full mt-20">


            <div class="mx-auto w-full px-4">

                <div class="relative overflow-x-auto rounded-lg sm:rounded-lg border  border-gray-300 ">
                    <table class="w-full whitespace-nowrap text-center text-base capitalize font-medium text-gray-500 ">
                        <caption class="p-3 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            <div class="flex items-center justify-between">
                                <h1>Upload Receipt </h1><button data-modal-target="receipt-modal"
                                    data-modal-toggle="receipt-modal" type="button"
                                    class="focus:outline-none mr-3 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Upload</button>
                            </div>
                        </caption>
                        <thead class="text-xs text-white uppercase bg-[#37B5B6] ">

                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Animal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>


                        @forelse ($animal as $animals)
                            <tbody>
                                <tr
                                    class="{{ $loop->even ? 'bg-white' : 'bg-white' }} border-b cursor-pointer border-gray-300 hover:bg-gray-100">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap ">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $animals->type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $animals->status }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('client.view.animal.form', ['id' => $animals->id]) }}"
                                                class="transition ease-in-out delay-150 hover:-translate-y-1 duration-300  text-gray-600 font-semibold py-1 px-3 rounded-lg flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                <span></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 bg-white text-center border-b border-gray-300">
                                    <h1 class="font-semibold italic pb-3">No data</h1>
                                </td>
                            </tr>
                        @endforelse

                    </table>
                    <div class="flex p-4 w-full bg-slate-200">
                        <!-- Previous Button -->
                        <a href="{{ $animal->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Previous
                        </a>
                        <a href="{{ $animal->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                            Next
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <div id="receipt-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Receipt
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="receipt-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form action="{{ route('upload.receipt', ['id' => $stub->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <p class="text-gray-500 dark:text-gray-400 mb-4">Upload the images here:</p>
                            <ul class="space-y-4 mb-4">
                                <li>

                                    <label for="receipt" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Receipt:</label>
                                    <label for="receipt-upload"
                                        class="cursor-pointer flex justify-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5">
                                        <span id="receiptName" class="text-left font-medium flex items-center">
                                            <i class='bx bx-plus' style='font-size: 2em;'></i> Add Image
                                        </span>
                                        <input id="receipt-upload" name="receipt" accept="image/*" type="file"
                                            class="hidden" onchange="updateLabel(this, 'receiptName');">
                                    </label>

                                </li>
                                <li>
                                    <label for="permit" class="block mb-2 text-sm font-medium text-gray-900">
                                        Permit to slaughter
                                    </label>
                                    <label for="permit-upload"
                                        class="cursor-pointer flex justify-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5">
                                        <span id="permitName" class="font-medium flex items-center"><i class='bx bx-plus'
                                                style='font-size: 2em;'></i> Add image</span>
                                        <input id="permit-upload" name="permit" accept="image/*" type="file"
                                            class="hidden" onchange="updateLabel(this, 'permitName');">
                                    </label>
                                </li>
                                <li>
                                    <label for="receipt-number" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Receipt No.</label>
                                    <input type="text" name="receiptNumber" id="receipt-number"
                                        placeholder="e.g., 123456"
                                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">

                                </li>
                            </ul>
                            <button data-modal-hide="receipt-modal" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Continue
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{-- <input id="receipt-upload" type="file" name="receipt_image" accept="image/*"
                                onchange="readURL(this, 'receipt-image');" class="hidden" /> --}}
    @endsection
    <script>
        function updateLabel(input, labelId) {
            const label = document.getElementById(labelId);
            if (input.files.length > 0) {
                label.innerHTML = input.files[0].name;
            } else {
                label.innerHTML = "<i class='bx bx-plus' style='font-size: 2em;'></i> Add image";
            }
        }

        function setStatus(status) {
            document.getElementById('statusInput').value = status;
            document.getElementById('animalForm').submit();
        }
    </script>
    <script>
        function readURL(input, targetId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + targetId)
                        .attr('src', e.target.result)
                        .removeClass('hidden') // Remove the 'hidden' class to display the image
                        .show(); // Ensure the image is displayed
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
