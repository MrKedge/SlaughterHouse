<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'view form'])

<body class="bg-white ">


    @extends('client.layout.masterlayout')

    @section('content')
        @include('view-form.all-view-form')
    @endsection


</body>

</html>
