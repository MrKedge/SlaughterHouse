<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'view Form'])

<body class="bg-white">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        @include('view-form.all-view-form')


        @include('view-form.form-popup')
    @endsection
    @include('view-form.antemortem-popup')
    @include('view-form.postmortem-popup')
    @include('view-form.other-popup')

</body>

</html>
