@if ($errors->has('error'))
    <div id="error-alert"
        class="fixed transition-opacity duration-300 ease-in-out  inset-x-px max-w-lg mt-10 mx-auto top-0 flex justify-center z-50 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
        role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-alert-octagon w-5 h-5 mx-2">
            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ $errors->first('error') }}</span> Please try again.
        </div>
    </div>
    <script>
        setTimeout(function() {
            var successAlert = document.getElementById('error-alert');
            successAlert.style.opacity = 0;
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 300);
        }, 4000);
    </script>
@elseif ($errors->any())
    <!-- Display validation errors -->
    <div id="validation-errors"
        class="fixed transition-opacity duration-300 ease-in-out  inset-x-px max-w-lg mt-10 mx-auto top-0 flex justify-center z-50 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
        role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-alert-octagon w-5 h-5 mx-2">
            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            @foreach ($errors->all() as $error)
                <span class="font-medium">{{ $error }}</span><br>
            @endforeach
        </div>
    </div>
    <script>
        setTimeout(function() {
            var successAlert = document.getElementById('validation-errors');
            successAlert.style.opacity = 0;
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 300);
        }, 4000);
    </script>
@endif
