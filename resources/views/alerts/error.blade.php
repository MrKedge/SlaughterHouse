  @if ($errors->has('error'))
      <div id="error-alert"
          class="absolute top-4 flex items-center p-4 mb-4 text-sm text-white rounded-lg bg-red-900 dark:bg-red-500 dark:text-white"
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
          // Automatically hide the success alert after 3 seconds
          setTimeout(function() {
              document.getElementById('error-alert').style.display = 'none';
          }, 3000);
      </script>
  @endif
