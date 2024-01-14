<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Dashboard '])

<body class="bg-[#eef0f3] scrollbar-gutter">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col w-full">{{-- Inside wrapper --}}


            <section class="flex justify-evenly gap-3 py-3 w-full h-auto px-4 mt-3">
                {{-- wrapper --}}
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">PENDING</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-3xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                        </svg><span class="font-bold text-4xl">{{ $animal->where('status', 'pending')->count() }}</span>
                    </div>

                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-2xl">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">ANIMAL</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span
                            class="text-4xl font-bold">{{ $animal->filter(function ($animal) {
                                    return $animal->status === 'pending' || $animal->status === 'approved';
                                })->count() }}</span>
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">OWNER</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <span class="text-4xl font-bold">{{ $user->where('role', 'client')->count() }}</span>
                    </div>
                </div>
                <div
                    class="h-28 bg-white w-full rounded-r-md border-l-[16px] border-[#293241] rounded-l-md relative shadow-xl bg-blur-lg backdrop-filter  ">

                    <h1 class="pl-2 text-start flex items-center text-[#EE6C4D] font-bold text-lg">APPROVE</h1>

                    <div class="flex items-center pt-6 pl-2 gap-3 text-4xl text-gray-400">
                        <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                        </svg>

                        <span class="text-4xl font-bold">{{ $animal->where('status', 'approved')->count() }}</span>
                    </div>
                </div>
            </section>


            <section class="h-full gap-3 pt-0 w-full  px-4">

                {{-- table wrapper --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg  border  border-gray-300">
                    <table
                        class="w-full text-sm text-center rtl:text-right text-gray-500 capitalize font-medium shadow-2xl">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
                            Recent Register Animal
                            <p class="mt-1 text-sm font-semibold uppercase text-gray-500">as of
                                {{ \Carbon\Carbon::now()->format('M d Y h:i a') }}</p>
                        </caption>
                        <thead class="text-xs text-gray-100 uppercase bg-slate-600 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Animal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Owner
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Time
                                </th>
                            </tr>
                        </thead>
                        @forelse ($recent as $animal)
                            <tbody>
                                <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}  border  border-gray-300">
                                    <th scope="row" class="px-6 py-4">
                                        {{ $animal->type }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $animal->user->first_name }} {{ $animal->user->last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($animal->status === 'approved')
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animal->status }}
                                            </span>
                                        @elseif ($animal->status === 'pending')
                                            <span
                                                class="bg-yellow-50 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
                                                {{ $animal->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($animal->created_at)->format('M d Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($animal->created_at)->format('h:i a') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 bg-white text-center">
                                        <h1 class="font-semibold italic pb-3">No Recent Register Animal</h1>
                                    </td>
                                </tr>

                            </tbody>
                        @endforelse
                    </table>
                </div>

            </section>


            <div class=" sm:grid-cols-3 gap-4 justify-evenly grid  m-4">


                @include('admin.dashboard-data.present-chart')

                @include('admin.dashboard-data.data-chart')

                @include('admin.dashboard-data.active-user-table')

            </div>
            {{-- Schedule chart --}}






        </div>
    @endsection
</body>

</html>
