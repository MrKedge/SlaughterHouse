<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Receipt'])

<body class="bg-[#D5DFE8] overflow-hidden">


    @extends('client.layout.masterlayout')

    @section('content')
        {{-- main content --}}
        <div class="flex flex-col w-full gap-3">


            <section class="flex justify-start gap-3 pl-6  py-3 w-full border-l h-auto">
                {{-- wrapper --}}


            </section>

            <section
                class=" z-10 mx-5 w-auto  bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-bold py-3 text-[#293241]">Upload Receipt</h1>
                    <button data-modal-target="receipt-modal" data-modal-toggle="receipt-modal" type="button"
                        class="focus:outline-none mr-3 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Upload</button>
                </div>

                <div class="scrollbar-gutter overflow-y-auto h-[480px]">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Id</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Status</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">
                            @forelse ($animal as $animals)
                                <tr class="bg-transparent border border-black text-center">
                                    <td class="p-2">{{ $animals->id }}</td>
                                    <td class="p-2">{{ $animals->type }}</td>
                                    <td class="p-2">{{ $animals->status }}</td>
                                    <td class="p-2 flex justify-center gap-3">
                                        <!-- Add your links for viewing and editing animals here -->
                                        <a href="{{ route('client.view.animal.form', ['id' => $animals->id]) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                            <box-icon name='navigation' color='#ffffff'></box-icon><span>View</span>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <!-- Display this section when there are no stabs -->
                                <tr>
                                    <td colspan="5" class="text-center p-4">No stabs available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>


        <div id="receipt-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Upload Receipt
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="receipt-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="flex items-center justify-center w-full">
                            <label for="receipt-upload"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                                <div class="flex  flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <img id="receipt-image" src="#" alt="your image" class="hidden max-w-sm ">
                                    <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>

                            </label>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                        <form action="{{ route('upload.receipt', ['id' => $stub->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input id="receipt-upload" type="file" name="receipt_image" accept="image/*"
                                onchange="readURL(this, 'receipt-image');" class="hidden" />
                            <button data-modal-hide="receipt-modal" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Continue
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

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
