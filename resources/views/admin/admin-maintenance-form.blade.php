<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Maintenance'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col m-4">




            {{-- main content --}}

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Add on form</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Delete on form</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-4 rounded-lg bg-gray-50 " id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <form action="{{ route('form.maintenance') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 sm:grid-row sm:gap-6 sm:mb-5 max-w-xl">
                            <div class="flex gap-4">
                                <div id="animal-dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="animal">
                                        @foreach ($animal as $animals)
                                            @if (!is_null($animals->animal_type) && $animals->animal_type !== '')
                                                <li>
                                                    <p class="block px-4 py-2 hover:bg-gray-100">
                                                        {{ $animals->animal_type }}
                                                    </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div id="destination-dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="destination-btn">
                                        @foreach ($animal as $animals)
                                            @if (!is_null($animals->animal_destination) && $animals->animal_destination !== '')
                                                <li>
                                                    <p
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        {{ $animals->animal_destination }}
                                                    </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="source-dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="sourceBtn">
                                        @foreach ($animal as $animals)
                                            @if (!is_null($animals->animal_source) && $animals->animal_source !== '')
                                                <li>
                                                    <p class="block px-4 py-2 hover:bg-gray-100">
                                                        {{ $animals->animal_source }}
                                                    </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="butcher-dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="butcherBtn">
                                        @foreach ($animal as $animals)
                                            @if (!is_null($animals->animal_butcher) && $animals->animal_butcher !== '')
                                                <li>
                                                    <p class="block px-4 py-2 hover:bg-gray-100">
                                                        {{ $animals->animal_butcher }}
                                                    </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="classify-dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="classifyBtn">
                                        @foreach ($animal as $animals)
                                            @if (!is_null($animals->animal_ageclassify) && $animals->animal_ageclassify !== '')
                                                <li>
                                                    <p class="block px-4 py-2 hover:bg-gray-100 ">
                                                        {{ $animals->animal_ageclassify }}
                                                    </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Animal Type:</label>
                                <div class="flex gap-2">
                                    <button id="animal" data-dropdown-toggle="animal-dropdown"
                                        class=" text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">
                                        Show
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button><input name="animalType"
                                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Destination:</label>
                                <div class="flex gap-2">
                                    <button id="destination-btn" data-dropdown-toggle="destination-dropdown"
                                        class="text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">
                                        Show
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <input name="animalDestination"
                                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Source:</label>
                                <div class="flex gap-2">
                                    <button id="sourceBtn" data-dropdown-toggle="source-dropdown"
                                        class="text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">
                                        Show
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <input name="animalSource"
                                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Butcher:</label>
                                <div class="flex gap-2">
                                    <button id="butcherBtn" data-dropdown-toggle="butcher-dropdown"
                                        class="text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">
                                        Show
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <input name="animalButcher"
                                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                </div>
                            </div>

                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Age classification:</label>
                                <div class="flex gap-2">
                                    <button id="classifyBtn" data-dropdown-toggle="classify-dropdown"
                                        class="text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">
                                        Show
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <input name="animalAgeClassify"
                                        class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button type="submit"
                                class="text-white bg-green-800 hover:bg-green-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Add</button>
                        </div>

                    </form>

                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">

                    <form action="{{ route('delete.on.form') }}" method="post">
                        @csrf

                        <div class="grid gap-4 mb-4 sm:grid-row sm:gap-6 sm:mb-5 max-w-xl">

                            <div class="w-full">

                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Animal Type:</label>

                                <select name="deleteAnimal" id="typeOfAnimal"
                                    class="type-animal font-medium  bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($animal as $animals)
                                        @if (!is_null($animals->animal_type) && $animals->animal_type !== '')
                                            <option value="{{ $animals->animal_type }}">
                                                {{ $animals->animal_type }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                            <div class="w-full">

                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Destination:</label>
                                <select name="deleteDestination" id=""
                                    class="font-medium bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($animal as $animals)
                                        @if (!is_null($animals->animal_destination) && $animals->animal_destination !== '')
                                            <option value="{{ $animals->animal_destination }}">
                                                {{ $animals->animal_destination }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div class="w-full">
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Source:</label>
                                <select name="deleteSource" id=""
                                    class="font-medium bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($animal as $animals)
                                        @if (!is_null($animals->animal_source) && $animals->animal_source !== '')
                                            <option value="{{ $animals->animal_source }}">
                                                {{ $animals->animal_source }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Butcher:</label>
                                <select name="deleteButcher" id=""
                                    class="font-medium  bg-gray-50 border border-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  text-gray-800  ">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($animal as $animals)
                                        @if (!is_null($animals->animal_butcher) && $animals->animal_butcher !== '')
                                            <option value="{{ $animals->animal_butcher }}">
                                                {{ $animals->animal_butcher }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Age classification:</label>
                                <select name="deleteAgeClassify" id="putAgeClassify"
                                    class="capitalize  font-medium  age-classify bg-gray-50 border border-gray-300
                                            text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                            focus:border-blue-500 block w-full p-2.5 ">


                                    <option value="" disabled selected>select</option>
                                    @foreach ($animal as $animals)
                                        @if (!is_null($animals->animal_ageclassify) && $animals->animal_ageclassify !== '')
                                            <option value="{{ $animals->animal_ageclassify }}">
                                                {{ $animals->animal_ageclassify }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="flex items-center space-x-4">
                            <button type="submit"
                                class="text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @endsection
</body>

</html>
