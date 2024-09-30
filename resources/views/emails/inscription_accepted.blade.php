{{-- resources/views/emails/inscription_accepted.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Inscription Accepted</title>
</head>
<body>
    <h1>Congratulations!</h1>
    <p>Your inscription for the formation <strong>{{ $inscription->formation ? $inscription->formation->name : 'Unknown Formation' }}</strong> has been accepted.</p>
    <p>Your registration number is: <strong>{{ $inscription->numero }}</strong></p>
    <p>Thank you for your participation!</p>
</body>
</html>
