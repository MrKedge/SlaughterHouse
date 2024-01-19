<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Scheduled Queue'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        @include('admin.layout.admin-calendar')
    @endsection

</body>

</html>
