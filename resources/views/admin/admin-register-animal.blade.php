<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Register Animal'])

<body class="bg-[#D5DFE8] ">

    <div class="min-h-screen w-full">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('admin.layout.admin-header')
        {{-- end header --}}

        {{-- this is for the table inside --}}
        <div class="flex">

            <div class="fixed">@include('admin.layout.admin-sidepanel')</div>
            <div class="mx-auto w-full">

                {{-- main content --}}

                <div class="ml-[240px] flex">


                    <section class=" h-full w-full rounded-md mx-3 mt-2 drop-shadow-2xl bg-gray-50">

                        <div class=" border-b border-gray-300 bg-white">

                            @include('form.register-form')


                        </div>


                    </section> <!-- Main modal -->
                </div>






            </div>
        </div>
    </div>

</body>

</html>
