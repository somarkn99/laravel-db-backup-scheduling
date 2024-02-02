<!DOCTYPE html>
<html>
<head>
    <title>Backup Status Notification</title>
</head>
<body>
    <h1>Backup {{ $status }}</h1>
    <p>Date: {{ $date }}</p>
    <p>File Size: {{ $fileSize }}</p>
    @if ($errorMessage)
        <p>Error Message: {{ $errorMessage }}</p>
    @endif
</body>
</html>
