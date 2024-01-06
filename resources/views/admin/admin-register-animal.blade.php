<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Approved List'])

<body class="bg-[#D5DFE8] overflow-hidden">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <div class="flex flex-col m-4">








            @include('form.register-form')








        </div>
    @endsection


</body>

</html>
