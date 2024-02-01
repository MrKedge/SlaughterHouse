<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'form'])

<body class="">

    @extends('layout.masterlayout')

    @section('content')
        @include('view-form.all-view-form')
    @endsection

    @include('view-form.antemortem-popup')
    @include('view-form.postmortem-popup')
    @include('view-form.other-popup')

</body>

</html>
