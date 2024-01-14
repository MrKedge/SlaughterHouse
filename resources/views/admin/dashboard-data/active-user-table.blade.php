<div class="scrollbar-gutter h-fit relative overflow-x-auto shadow-md sm:rounded-lg  border  border-gray-300">
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 capitalize font-medium shadow-2xl">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-600 bg-white">
            Staffs Activity
            <p class="mt-1 text-sm font-semibold uppercase text-gray-500">as of
                {{ \Carbon\Carbon::now()->format('M d Y h:i a') }}</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Active Time
                </th>

            </tr>
        </thead>
        @forelse ($userChart->whereIn('role', ['admin', 'butcher', 'inspector']) as $user)
            @if ($user->lastSeenMinutesAgo() <= 10 && $user->last_seen_at !== null)
                <tbody>
                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} ">
                        <th scope="row" class="px-6 py-4">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->role }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($user->isOnline())
                                <span
                                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                    Available
                                </span>
                            @elseif (!$user->isOnline())
                                <span
                                    class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                    Unavailable
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs whitespace-nowrap lowercase">
                            {{ $user->lastSeenMinutesAgo() }} m
                        </td>
                    </tr>
                </tbody>
            @endif
        @empty
            <tr>
                <td colspan="5" class="py-4  text-center">
                    <h1 class="font-semibold italic pb-3">No Online Staff</h1>
                </td>
            </tr>

        @endforelse
    </table>
</div>
