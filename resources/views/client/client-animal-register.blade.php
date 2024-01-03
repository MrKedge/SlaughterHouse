<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Register'])

<body class="bg-[#D5DFE8] overflow-hidden ">


    @extends('client.layout.masterlayout')

    @section('content')
        <section class="flex flex-col h-full w-full px-6">

            {{-- include here --}}
            @include('form.register-form')

        </section>
    @endsection


</body>

</html>
