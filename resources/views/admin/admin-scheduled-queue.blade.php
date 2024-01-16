<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Scheduled Queue'])

<body class="bg-[#f6f8fa]">

    @extends('admin.layout.admin-masterlayout')

    @section('admincontent')
        <form action="{{ route('scheduled.queue') }}" method="POST" onsubmit="return updateHiddenInput()">
            @csrf
            <div inline-datepicker id="datepicker" data-date="{{ $myDate }}" onDateSelected="onDateSelected"></div>
            <input type="hidden" name="schedDate" id="hiddenDateInput" value="{{ $myDate }}">
            <button type="submit">Submit{{ $parsedDate }}</button>
        </form>

        <script>
            function onDateSelected(selectedDate) {
                // Update the value of the hidden input field
                document.getElementById('hiddenDateInput').value = selectedDate;
            }

            function updateHiddenInput() {
                // Continue with the form submission
                return true;
            }
        </script>
    @endsection

</body>

</html>
