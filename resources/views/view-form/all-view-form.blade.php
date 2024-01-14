<h1 class="mt-3  text-2xl font-bold text-left pl-6 pb-6 text-[#293241] ">
    ANIMAL
    DETAILS</h1>
<h1 class="pl-6 text-2xl font-medium text-[#293241]">
    ID:<span> {{ $animal->id }}</span></h1>
<div class="flex justify-between items-center">
    <h1 class="pl-6 pb-3 text-2xl font-medium text-[#293241]">
        Status: @include('view-form.form-status')
    </h1>
</div>
<div class="mb-4 border-b border-gray-200 ">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
        data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="flex items-center p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                type="button" role="tab" aria-controls="profile" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                </svg>
                Animal
                Information</button>
        </li>
        @if ($animal->approved_at !== null)
            <li class="me-2" role="presentation">
                <button
                    class="flex items-center  p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    Ante Mortem</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="flex items-center p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                    aria-controls="settings" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                    Post Mortem</button>
            </li>
            {{-- <li role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                            id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Other Information</button>
                    </li> --}}
            @if ($animal->qr_code !== null)
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                    class="z-20  text-sm bg-transparent rounded-full" type="button">
                    <span class="sr-only">Open user menu</span>
                    <i
                        class='bx bx-qr-scan text-[24px] text-gray-600 transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 '></i>
                </button>
            @endif
            <div id="dropdownAvatar"
                class=" hidden z-10 text-end bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute">
                <img class="mx-auto" src="{{ asset('storage/qr-code/' . $animal->qr_code) }}" alt="animal image">
                <div class="py-2">
                    <button data-modal-target="print-view-modal" data-modal-toggle="print-view-modal" type="button"
                        class="  text-white font-medium py-1 px-3 rounded-lg flex items-center text-sm">
                        <i
                            class='bx bx-printer text-[24px] text-gray-900 transition ease-in-out delay-150 hover:-translate-y-1 duration-300 hover:scale-110 '></i>
                    </button>
                </div>
            </div>
        @endif
    </ul>
</div>
<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg bg-gray-50" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('view-form.animal-info')
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        @include('view-form.ante-info')
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 " id="settings" role="tabpanel" aria-labelledby="settings-tab">
        @include('view-form.post-info')
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <p class="text-sm text-gray-500 ">This is some placeholder content the <strong
                class="font-medium text-gray-800 ">Contacts tab's associated content</strong>.
            Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
            classes to control the content visibility and styling.</p>
    </div>
</div>
{{-- buttons --}}
<div class="flex items-center p-6 space-x-4">
    @if (auth()->user()->role !== 'client' && auth()->user()->role !== 'butcher')
        @if ($animal->status === 'pending' && auth()->user()->role === 'admin')
            @csrf
            <button data-modal-target="approve-modal" data-modal-toggle="approve-modal"
                class=" flex items-center gap-1 text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    data-slot="icon" class="w-6 h-6">
                    <path
                        d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                </svg>

                Approve
            </button>
            <button data-modal-target="reject-modal" data-modal-toggle="reject-modal"
                class=" flex items-center gap-1 text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6">
                    <path
                        d="M15.73 5.5h1.035A7.465 7.465 0 0 1 18 9.625a7.465 7.465 0 0 1-1.235 4.125h-.148c-.806 0-1.534.446-2.031 1.08a9.04 9.04 0 0 1-2.861 2.4c-.723.384-1.35.956-1.653 1.715a4.499 4.499 0 0 0-.322 1.672v.633A.75.75 0 0 1 9 22a2.25 2.25 0 0 1-2.25-2.25c0-1.152.26-2.243.723-3.218.266-.558-.107-1.282-.725-1.282H3.622c-1.026 0-1.945-.694-2.054-1.715A12.137 12.137 0 0 1 1.5 12.25c0-2.848.992-5.464 2.649-7.521C4.537 4.247 5.136 4 5.754 4H9.77a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23ZM21.669 14.023c.536-1.362.831-2.845.831-4.398 0-1.22-.182-2.398-.52-3.507-.26-.85-1.084-1.368-1.973-1.368H19.1c-.445 0-.72.498-.523.898.591 1.2.924 2.55.924 3.977a8.958 8.958 0 0 1-1.302 4.666c-.245.403.028.959.5.959h1.053c.832 0 1.612-.453 1.918-1.227Z" />
                </svg>
                Reject
            </button>
        @elseif($animal->status === 'inspection')
            <form action="{{ route('for.slaughter.animal', ['id' => $animal->id]) }}" method="post">
                @csrf
            </form>
        @endif
        @if ($animal->status === 'inspection')
            @csrf
            @if (optional($animal->anteMortem)->inspection_status === null)
                <div class="flex">
                    <div class="flex  m-5">
                        <button data-modal-target="schedule-modal" data-modal-toggle="schedule-modal"
                            class=" border  focus:outline-none  focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5  bg-gray-800 text-white border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700">
                            For Slaughter
                        </button>
                    </div>

                    <div class="flex  m-5">
                        <button id="adminDisposeBtn" data-modal-target="admin-dispose"
                            data-modal-toggle="admin-dispose"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            type="button">
                            Dispose Animal
                        </button>
                    </div>
                </div>
            @endif
        @endif
        @if ($animal->butcher === 'private' && $animal->status === 'for slaughter')
            <div class="flex justify-center m-5">
                <button data-modal-target="privateButcher-modal" data-modal-toggle="privateButcher-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Slaughter
                </button>
            </div>
        @endif
        @if (optional($animal->anteMortem)->inspection_status === 'for slaughter')
            @if ($animal->status !== 'slaughtered' && $animal->status !== 'completed')
                <button data-modal-target="schedule-modal" data-modal-toggle="schedule-modal"
                    class="border focus:outline-none  focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5  bg-gray-800 text-white border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700">
                    Reschedule
                </button>
            @endif
        @endif
        @if ($animal->status === 'slaughtered')
            @if (auth()->user()->role === 'inspector' || auth()->user()->role === 'admin')
                <div class="flex justify-center m-5">
                    <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        type="button">
                        For Consumption
                    </button>
                </div>


                <div class="flex justify-center m-5">
                    <button id="condemnModalButton" data-modal-target="condemnModal" data-modal-toggle="condemnModal"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
                        type="button">
                        Condemn
                    </button>
                </div>
            @endif
        @endif
    @endif
    <div class="flex justify-center m-5">
        @if (auth()->user()->role === 'butcher')
            @if ($animal->status === 'for slaughter')
                <button data-modal-target="slaughter-modal" data-modal-toggle="slaughter-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Slaughter
                </button>
            @endif
        @endif
    </div>

</div>
