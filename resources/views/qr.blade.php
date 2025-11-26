<!DOCTYPE html>
<html>
<head>
    <title>QR Code</title>
</head>
<body>
    <h2>Scan this QR Code</h2>

    <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" />

</body>
</html>
