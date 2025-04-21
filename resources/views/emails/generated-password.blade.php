<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vos identifiants</title>
</head>
<body>
    <h2>Bonjour {{ $user->name }},</h2>

    <p>Votre compte a été créé avec succès. Voici vos identifiants :</p>

    <ul>
        <li><strong>Email :</strong> {{ $user->email }}</li>
        <li><strong>Mot de passe :</strong> {{ $password }}</li>
    </ul>

    <p>Merci de vous connecter dès que possible et de modifier votre mot de passe si nécessaire.</p>

    <p>— L’équipe</p>
</body>
</html>
