<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'stab'])

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
                <h1 class="text-2xl font-bold py-3 text-[#293241]">With Stab</h1>

                <div class="scrollbar-gutter overflow-y-auto h-[480px]">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Id</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Issued Date</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animals</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">
                            @forelse ($stabs as $stab)
                                <tr class="bg-transparent border border-black text-center">
                                    <td class="p-2">{{ $stab->id }}</td>
                                    <td class="p-2">{{ $stab->issued_at }}</td>
                                    <td class="p-2">{{ $stab->animals()->count() }}</td>
                                    <td class="p-2 flex justify-center gap-3">
                                        <!-- Add your links for viewing and editing animals here -->


                                        <a href="{{ route('receipt.table', ['id' => $stab->id]) }}"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded gap-1 flex items-center">
                                            <box-icon name='send' color='#ffffff'></box-icon><span>View</span>
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
    @endsection
</body>

</html>
