<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Register Form'])

<body class="bg-white">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col m-4">








            @include('form.register-form')








        </div>
    @endsection


</body>

</html>
