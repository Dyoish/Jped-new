<!DOCTYPE html>
<html>

<head>
    <title>Booking Status Update</title>
</head>

<body>
    <h1>Booking Status Update</h1>
    <p>Dear {{ $booking->name }},</p>
    <p>{{ $statusMessage }}</p>
    <p>Booking Details:</p>
    <ul>
        <li><strong>Service:</strong> {{ $booking->service->name }}</li>
        <li><strong>Booking Date:</strong> {{ $booking->booking_date }}</li>
        <li><strong>Booking Time:</strong> {{ $booking->booking_time }}</li>
        <li><strong>Status:</strong> {{ $booking->status }}</li>
    </ul>
    <p>Thank you for choosing JPED!</p>
</body>

</html>