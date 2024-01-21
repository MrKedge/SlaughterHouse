<div id="image-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                    data-modal-toggle="image-modal">
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
                    @if ($animal->cert_ownership)
                        <a href="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                            data-lightbox="animal-gallery">
                            <li
                                class="flex items-center justify-evenly bg-white border border-gray-200 rounded-lg shadow max-h-20 md:max-w-lg hover:bg-gray-100">

                                <img class="object-cover w-40 max-w-40 max-h-20  rounded-l-lg md:rounded-l-lg"
                                    src="{{ asset('storage/cert-ownership/' . $animal->cert_ownership) }}"
                                    alt="">

                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2  font-bold tracking-tight text-gray-900">Certificate
                                        of Ownership</h5>

                                </div>

                            </li>
                        </a>
                    @endif
                    @if ($animal->cert_transfer)
                        <a href="{{ asset('storage/cert-transfer/' . $animal->cert_transfer) }}"
                            data-lightbox="animal-gallery">
                            <li
                                class="flex items-center justify-evenly bg-white border border-gray-200 rounded-lg shadow md:max-w-lg hover:bg-gray-100">
                                <img class="object-cover w-40 max-w-40 max-h-20 rounded-l-lg md:rounded-l-none"
                                    src="{{ asset('storage/cert-transfer/' . $animal->cert_transfer) }}"
                                    alt="Certificate of Transfer of Large Cattle">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 font-bold tracking-tight text-gray-900">Certificate of Transfer of
                                        Large
                                        Cattle</h5>
                                </div>
                            </li>
                        </a>
                    @endif
                    @if ($animal->brgy_clearance)
                        <a href="{{ asset('storage/brgy-clearance/' . $animal->brgy_clearance) }}"
                            data-lightbox="animal-gallery">
                            <li
                                class="flex items-center bg-white border border-gray-200 rounded-lg shadow max-h-20 md:max-w-lg hover:bg-gray-100">

                                <img class="object-cover w-40 max-w-40  max-h-20  rounded-l-lg md:rounded-l-lg"
                                    src="{{ asset('storage/brgy-clearance/' . $animal->brgy_clearance) }}"
                                    alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 font-bold tracking-tight text-gray-900">Brgy. Clearance</h5>

                                </div>

                            </li>
                        </a>
                    @endif
                    @if ($animal->receipt)
                        <a href="{{ asset('storage/owner-receipt/' . $animal->receipt->receipt_name) }}"
                            data-lightbox="animal-gallery">
                            <li
                                class="flex items-center bg-white border border-gray-200 rounded-lg shadow max-h-20 md:max-w-lg hover:bg-gray-100">

                                <img class="object-cover w-40 max-w-40  max-h-20 rounded-l-lg md:rounded-l-lg"
                                    src="{{ asset('storage/owner-receipt/' . $animal->receipt->receipt_name) }}"
                                    alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 font-bold tracking-tight text-gray-900">Receipt</h5>
                                    <p class="text-sm text-gray-500 ">No: {{ $animal->receipt->receipt_no }}</p>
                                </div>

                            </li>
                        </a>
                    @endif
                    @if ($animal->receipt)
                        <a href="{{ asset('storage/slaughter-permit/' . $animal->receipt->slaughter_permit) }}"
                            data-lightbox="animal-gallery">
                            <li
                                class="flex items-center bg-white border border-gray-200 rounded-lg shadow max-h-20 md:max-w-lg hover:bg-gray-100">

                                <img class="object-cover w-40 max-w-40  max-h-20 rounded-l-lg md:rounded-l-lg"
                                    src="{{ asset('storage/slaughter-permit/' . $animal->receipt->slaughter_permit) }}"
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


<div id="mark-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-medium text-gray-900 ">
                    Animal Marks
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="mark-modal">
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
                <section class="min-h-[350px]">
                    <img class="w-full" src="{{ asset('storage/marked-animal/' . $animal->animal_mark) }}">
                </section>
            </div>
            <!-- Modal footer -->
            {{-- <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b">
                <button data-modal-hide="mark-modal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">I
                    accept</button>
                <button data-modal-hide="mark-modal" type="button"
                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
            </div> --}}
        </div>
    </div>
</div>
