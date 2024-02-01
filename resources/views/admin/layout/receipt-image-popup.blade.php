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
                    @if (isset($animals->receipt) && isset($animals->receipt->slaughter_permit))
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
                        <h1>No uploads</h1>
                    @endif
                    @if (isset($animals->receipt) && isset($animals->receipt->slaughter_permit))
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
                @if ($animals->status !== 'receipt invalid')
                    @if (isset($animals->receipt))
                        <div class="w-full text-start pt-4">
                            <button type="button" data-modal-target="rejectReceipt-modal-{{ $animals->id }}"
                                data-modal-hide="image-modal-{{ $animals->id }}"
                                data-modal-toggle="rejectReceipt-modal-{{ $animals->id }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2">Reject</button>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>




<div id="rejectReceipt-modal-{{ $animals->id }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">

            <div class="p-4 md:p-5 text-center">
                <form method="post"
                    action="{{ isset($animals->receipt) ? route('reject.receipt', ['receiptId' => $animals->receipt->id]) : '#' }}">
                    @csrf
                    <div class="w-full  border border-gray-500 rounded-lg bg-gray-50">
                        <div class="px-4 py-2 bg-white rounded-t-lg">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea name="receipt-remarks" id="comment" ws="4" cols="50" maxlength="100"
                                class="w-full px-0 text-sm text-gray-900 bg-white outline-0" placeholder="Write a remarks..." required></textarea>
                        </div>
                        <div class="flex items-center gap-3 px-3 py-2 border-t">
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                                Continue
                            </button>
                            <button type="button" data-modal-target="rejectReceipt-modal-{{ $animals->id }}"
                                data-modal-toggle="rejectReceipt-modal-{{ $animals->id }}"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-600 rounded-lg focus:ring-4 focus:ring-blue-200 border border-gray-500">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
