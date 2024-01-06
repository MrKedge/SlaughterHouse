<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'form'])

<body class="bg-[#D5DFE8]">

    @extends('layout.masterlayout')

    @section('content')
        <div class="flex flex-col w-full ">
            @include('form.view-animal-form')
        </div>
    @endsection
</body>

</html>
