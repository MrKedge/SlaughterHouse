<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'view form'])

<body class="bg-[#D5DFE8] ">


    @extends('client.layout.masterlayout')

    @section('content')
        @include('form.view-animal-form')
    @endsection


</body>

</html>
