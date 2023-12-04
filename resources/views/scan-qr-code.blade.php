<!DOCTYPE html>
<html lang="en">

@include('layout.html-head', ['pageTitle' => 'Scan Animal QR'])


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
        background-color: #4b4b4b;

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
            transform: translateY(-50%) translateY(-200px);
            /* Half of the vertical movement (400px) */
        }

        50% {
            transform: translateY(-50%) translateY(200px);
            /* Half of the vertical movement (400px) */
        }
    }
</style>

<body class="bg-[#D5DFE8]">
    <div class="min-h-screen">
        @include('client.layout.client-header')
        <div class="flex h-screen justify-center items-center">
            <div class="scanner-container">
                <video id="preview" class="w-full h-full"></video>
                <div class="moving-line"></div>
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
</body>

</html>
