<div id="image-modal-{{ $animals->id }}" tabindex="-1" aria-hidden="true"
    class="hidden text-black overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Documents
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="image-modal-{{ $animals->id }}">
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
                <p class="text-gray-500 mb-4"></p>
                <ul class="space-x-10   text-lg">
                    @if ($animals->receipt)
                        <a href="{{ asset('storage/owner-receipt/' . $animals->receipt->receipt_name) }}"
                            data-lightbox="animals-gallery">
                            <li
                                class="flex items-center bg-white border border-gray-200 rounded-lg shadow max-h-20 md:max-w-lg hover:bg-gray-100">

                                <img class="object-cover w-40 max-w-40  max-h-20 rounded-l-lg md:rounded-l-lg"
                                    src="{{ asset('storage/owner-receipt/' . $animals->receipt->receipt_name) }}"
                                    alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 font-bold tracking-tight text-gray-900">Receipt</h5>
                                    <p class="text-sm text-gray-500 ">No: {{ $animals->receipt->receipt_no }}</p>
                                </div>

                            </li>
                        </a>
                    @else
                        <h1>No upload receipt.</h1>
                    @endif
                    @if ($animals->receipt)
                        <a href="{{ asset('storage/slaughter-permit/' . $animals->receipt->slaughter_permit) }}"
                            data-lightbox="animals-gallery">
                            <li
                                class="flex items-center bg-white border border-gray-200 rounded-lg shadow max-h-20 md:max-w-lg hover:bg-gray-100">

                                <img class="object-cover w-40 max-w-40  max-h-20 rounded-l-lg md:rounded-l-lg"
                                    src="{{ asset('storage/slaughter-permit/' . $animals->receipt->slaughter_permit) }}"
                                    alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 font-bold tracking-tight text-gray-900">Permit of slaughter</h5>

                                </div>

                            </li>
                        </a>
                    @endif
                </ul>

            </div>
        </div>
    </div>
</div>
