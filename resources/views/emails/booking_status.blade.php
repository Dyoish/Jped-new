<!DOCTYPE html>
<html>
<head>
    <title>Booking Status Update</title>
</head>
<body>
    <h1>Hello, {{ $booking->name }}!</h1>

    <p>Your booking for {{ $booking->service->name }} on {{ $booking->booking_date }} at {{ $booking->booking_time }} has been {{ $statusMessage }}.</p>

    <p>Thank you for using our service!</p>
</body>
</html>
