<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Inspector View Form'])

<body class="bg-[#D5DFE8]">

    <div class="min-h-screen">{{-- wrapper --}}


        {{-- HEADER --}}
        @include('inspector.layout.inspector-header')
        {{-- end header --}}


        @include('form.view-animal-form')


    </div>

    <script src="{{ asset('js/slaughterhouse.js') }}"></script>
</body>

</html>
