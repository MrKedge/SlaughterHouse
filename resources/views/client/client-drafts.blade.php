<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of animal</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#D5DFE8] overflow-hidden">

    <div class="">{{-- wrapperr --}}
        <div class="z-10 flex items-center justify-between h-[50px] sticky top-0">

            <div
                class="text-center font-bold w-[240px] bg-[#293241] h-[50px] flex items-center justify-center text-2xl">
                <h1 class="text-white"><span class="text-[#EE6C4D] ">S</span>H</h1>
            </div>
            <div class="sticky top-">
                @auth
                    <p class="font-extrabold capitalize px-4 text-[#293241] ">
                        {{ auth()->user()->first_name }}
                    </p>
                @endauth
            </div>
        </div>


        <div class="flex">


            <div class="inline-block "> @include('client.layout.sidepanel')</div>


            {{-- main content --}}


            <div class="flex flex-col w-full gap-3">


                <section class="flex justify-start gap-3 pl-6  py-3 w-full border-l h-auto">
                    {{-- wrapper --}}
                    <div class="">
                        <a href="{{ route('client.animal.register') }}">
                            <div class="flex items-center text-white"><box-icon name='file-plus' type='solid'
                                    color='#293241' size='64px'></box-icon><span class="text-[#293241]">
                                    NEW
                                    FORM</span></div>
                        </a>
                    </div>

                </section>

                <section
                    class="z-10 mx-5 w-auto h-auto bg-white rounded-sm shadow-2xl bg-opacity-20 bg-blur-lg backdrop-filter backdrop-blur-lg border p-4">
                    <h1 class="text-2xl font-bold py-3 text-[#293241]">Drafts</h1>

                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Animal</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Date</th>
                                <th class="sticky text-white bg-[#293241] top-0 p-2 border-r-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">
                            @foreach ($animal as $animals)
                                <tr class="bg-transparent border border-black text-center">
                                    <td class="p-2">{{ $animals->type }}</td>
                                    <td class="p-2">{{ $animals->created_at }}</td>
                                    <td class="p-2 flex justify-center gap-3">

                                        <a href="{{ route('client.view.animal.form', ['id' => $animals->id]) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded flex items-center">
                                            <box-icon name='navigation' color='#ffffff'></box-icon><span>View</span>
                                        </a>

                                        <a href="{{ route('client.edit.animal.form', ['id' => $animals->id]) }}"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded gap-1 flex items-center">
                                            <box-icon name='send' color='#ffffff'></box-icon><span>Register</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

            </div>
        </div>



    </div>
</body>

</html>
