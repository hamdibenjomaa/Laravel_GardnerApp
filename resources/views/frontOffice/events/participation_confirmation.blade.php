<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Participation</title>
</head>
<body>
    <h1>Bonjour {{ $userName }},</h1>
    <p>Merci d'avoir participé à l'événement <strong>{{ $event->title }}</strong>.</p>
    <p>Voici les détails de l'événement :</p>
    <ul>
        <li>Date : {{ $event->date }}</li>
        <li>Lieu : {{ $event->location }}</li>
        <li>Description : {{ $event->description }}</li>
    </ul>
    <p>Nous avons hâte de vous voir!</p>
    <p>Cordialement,</p>
    <p>L'équipe d'organisation</p>
</body>
</html>
