<!DOCTYPE html>
<html lang="en">
@include('layout.html-head', ['pageTitle' => 'Form Maintenance'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}




        {{-- this is for the table inside --}}
        <div class="flex">

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>
            <div class="mx-auto w-full">

                {{-- main content --}}

                <div class="ml-[240px] flex">


                    <section class="flex flex-col h-full pt-8 w-full mx-6">


                        <div class=" bg-white px-10 rounded-2xl  shadow-2xl py-6">
                            <div class="flex justify-center"> @include('alerts.error') @include('alerts.success')
                            </div>

                            <h1 class="text-center font-extrabold text-[#293241] pb-8 pt-4 text-2xl">FORM MAINTENANCE

                            </h1>
                            <div action="" class="flex w-full justify-center relative">

                                <div class="w-full">
                                    <div class="scrollbar-gutter pr-5 pb-20 overflow-y-auto h-[500px] space-y-10">

                                        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">{{-- animal info --}}

                                            <form action="{{ route('form.maintenance') }}" method="POST">
                                                @csrf
                                                <div class="space-y-8">
                                                    <div>
                                                        <h1 class="font-bold text-lg italic">For Adding Animal
                                                            Information
                                                        </h1>
                                                        <label class="block pb-1 pt-3" for="">Add
                                                            Animal:</label>
                                                        <input name="animalType"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Add
                                                            Destination:</label>
                                                        <input name="animalDestination"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Add
                                                            Source:</label>
                                                        <input name="animalSource"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Add Butcher:</label>
                                                        <input name="animalButcher"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>

                                                    <div>
                                                        <label class="block pb-1" for="">Add Age
                                                            Classification:</label>
                                                        <input name="animalAgeClassify"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>

                                                    <div class="absolute bottom-0 right-[180px] pb-[20px]">
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                            Add on Form
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form action="{{ route('delete.on.form') }}" method="post">
                                                @csrf
                                                <div class="space-y-8">

                                                    <div>
                                                        <h1 class="font-bold text-lg italic">For Tampering Animal
                                                            Information</h1>
                                                        <label class="block pb-1 pt-3" for="">Delete on
                                                            Animal:</label>
                                                        <input name="deleteAnimal"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">


                                                    </div>
                                                    <div>

                                                        <label class="block pb-1" for="">Delete on
                                                            Destination:</label>
                                                        <input name="deleteDestination"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Delete on
                                                            Source:</label>
                                                        <input name="deleteSource"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    <div>
                                                        <label class="block pb-1" for="">Delete on
                                                            Butcher:</label>
                                                        <input name="deleteButcher"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"">
                                                    </div>

                                                    <div>
                                                        <label class="block pb-1" for="">Delete on Age
                                                            Classification:</label>
                                                        <input name="deleteAgeClassify"
                                                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>

                                                    <div class="absolute bottom-0 right-5 pb-[20px]">
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                            Delete on Form
                                                        </button>
                                                    </div>

                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="mr-4 ml-0 bg-white rounded-md shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4 mt-10 h-full">
                        <div class="scrollbar-gutter overflow-y-auto h-[580px]">
                            <table class="w-full text-center">
                                <thead>
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2 rounded-md">
                                            Animal</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td class="py-4">
                                            @foreach ($animal as $animals)
                                                @if (!is_null($animals->animal_type) && $animals->animal_type !== '')
                                                    <p class="font-medium ">
                                                        {{ $animals->animal_type }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="w-full text-center">
                                <thead>
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2 rounded-md">
                                            Butcher</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td class="">
                                            @foreach ($animal as $butcher)
                                                @if (!is_null($butcher->animal_butcher) && $butcher->animal_butcher !== '')
                                                    <p class="font-medium ">
                                                        {{ $butcher->animal_butcher }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="w-full text-center">
                                <thead>
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2 rounded-md">
                                            Destination
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td class="py-4">
                                            @foreach ($animal as $destination)
                                                @if (!is_null($destination->animal_destination) && $destination->animal_destination !== '')
                                                    <p class="font-medium ">
                                                        {{ $destination->animal_destination }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="w-full text-center">
                                <thead>
                                    <tr>
                                        <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2 rounded-md">Age
                                            Classify
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr>
                                        <td class="py-4">
                                            @foreach ($animal as $ageClass)
                                                @if (!is_null($animals->animal_ageclassify) && $ageClass->animal_ageclassify !== '')
                                                    <p class="font-medium ">
                                                        {{ $ageClass->animal_ageclassify }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
