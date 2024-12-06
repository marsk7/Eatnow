<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>

    <video id="video" width="100%" height="100%" autoplay playsinline></video>
    <canvas id="canvas" style="display: none;"></canvas>

    <script>
        let video = document.getElementById('video');
        let canvas = document.getElementById('canvas');
        let context = canvas.getContext('2d');

        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } }).then(function(stream) {
                video.srcObject = stream;
            }).catch(function(err) {
                console.error('Failed to get camera permission:', err);
            });
        } else {
            console.error('The browser does not support the getUserMedia API.');
        }

        // Add event listener to process video frames
        video.addEventListener('play', function() {
            let width = video.videoWidth;
            let height = video.videoHeight;
            canvas.width = width;
            canvas.height = height;

            function scan() {
                context.drawImage(video, 0, 0, width, height);
                let imageData = context.getImageData(0, 0, width, height);
                let code = jsQR(imageData.data, imageData.width, imageData.height);

                if (code) {
                    // Redirect to the QR code content
                    window.location.href = code.data;
                }

                requestAnimationFrame(scan);
            }

            scan();
        });
    </script>
    
<?= $this->endSection() ?>