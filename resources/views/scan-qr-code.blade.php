<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Scan Qr'])

<body class="bg-[#D5DFE8]">


    <style>
        .scanner-container {
            position: relative;
            width: 700px;
            /* Adjust the width as needed */
            height: 500px;
            /* Adjust the height as needed */
        }

        .moving-line {
            height: 5px;
            background-color: #ffffff;

            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            width: calc(100% + 40px);
            /* Adjust the width as needed */
            margin-left: -20px;
            /* Half of the added width to center it */
            animation: moveLine 3s infinite;
        }

        @keyframes moveLine {

            0%,
            100% {
                transform: translateY(-50%) translateY(-150px);
                /* Half of the vertical movement (400px) */
            }

            50% {
                transform: translateY(-50%) translateY(230px);
                /* Half of the vertical movement (400px) */
            }
        }
    </style>

    <body class="bg-[#D5DFE8]">
        <div class="min-h-screen">
            @include('client.layout.client-header')
            <div class="flex h-screen justify-center items-center">
                <div class="scanner-container">




                    <div
                        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="fixed inset-0 backdrop-blur-sm bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <div class="relative mx-auto right-0 p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Slaughtech Scanner
                                    </h3>

                                    <a href="{{ auth()->user()->role === 'inspector'
                                        ? route('inspector.overview')
                                        : (auth()->user()->role === 'admin'
                                            ? route('admin.dashboard')
                                            : (auth()->user()->role === 'butcher'
                                                ? route('butcher.overview')
                                                : '#')) }}"
                                        class="cursor-pointer  text-white font-semibold ">
                                        <svg class="w-9" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                    </a>

                                </div>
                                <!-- Modal body -->
                                <video id="preview" class="w-full p-4 h-full"></video>
                                <div class="moving-line"></div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

            <script>
                let scanner = new Instascan.Scanner({
                    video: document.getElementById('preview')
                });

                let userRole = "{{ auth()->user()->role }}"; // Assuming you have a role attribute in your user model

                if (userRole === 'admin') {
                    scanner.addListener('scan', function(content) {
                        let decodedContent = decodeURIComponent(content);
                        window.location.href = '/admin/view/animal/reg/form/' + decodedContent;
                    });
                } else if (userRole === 'butcher') {
                    scanner.addListener('scan', function(content) {
                        let decodedContent = decodeURIComponent(content);
                        window.location.href = '/butcher/view/form/' + decodedContent;
                    });
                } else if (userRole === 'inspector') {
                    scanner.addListener('scan', function(content) {
                        let decodedContent = decodeURIComponent(content);
                        window.location.href = '/inspector/view/form/' + decodedContent;
                    });
                } else if (userRole === 'client') {
                    scanner.addListener('scan', function(content) {
                        let decodedContent = decodeURIComponent(content);
                        window.location.href = '/client/view/animal/form/' + decodedContent;
                    });
                }

                Instascan.Camera.getCameras().then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function(e) {
                    console.error(e);
                });
            </script>
    </body>


</html>
