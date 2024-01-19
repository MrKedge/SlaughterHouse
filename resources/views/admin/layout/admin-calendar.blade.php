<form method="POST" action="{{ route('scheduled.queue') }}">
    @csrf
    <div name="selectedDate" datepicker-format="mm/dd/yyyy" inline-datepicker data-date="02/25/2022"></div>
    <button type="submit">Submit {{ $selectedDate }}</button>
</form>
