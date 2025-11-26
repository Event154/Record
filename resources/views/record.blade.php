<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Your Voice</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; font-family: Arial, sans-serif;">
    <h2>Record Your Voice Message</h2>
    <button id="startBtn">Start Recording</button>
    <button id="stopBtn" disabled>Stop Recording</button>
    <p id="status" style="margin-top: 20px;">Press 'Start' to begin recording.</p>

    <script>
        let mediaRecorder;
        let audioChunks = [];

        document.getElementById("startBtn").onclick = async () => {
            audioChunks = [];
            let stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);
            
            mediaRecorder.start();
            document.getElementById("status").innerText = "Recording...";
            document.getElementById("startBtn").disabled = true;
            document.getElementById("stopBtn").disabled = false;

            mediaRecorder.ondataavailable = e => {
                audioChunks.push(e.data);
            };
        };

        document.getElementById("stopBtn").onclick = () => {
            mediaRecorder.stop();
            document.getElementById("status").innerText = "Uploading...";
            document.getElementById("startBtn").disabled = false;
            document.getElementById("stopBtn").disabled = true;

            mediaRecorder.onstop = () => {
                let blob = new Blob(audioChunks, { type: 'audio/wav' });
                let formData = new FormData();
                formData.append("audio", blob);

                fetch("/api/upload-voice", {
                    method: "POST",
                    body: formData
                }).then(response => response.json()).then(data => {
                    document.getElementById("status").innerText = "Upload successful!";
                }).catch(error => {
                    document.getElementById("status").innerText = "Upload failed!";
                });
            };
        };
    </script>
</body>
</html>
