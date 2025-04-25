<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos identifiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #2d3a4b;
            text-align: center;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .email, .password {
            font-weight: bold;
            color: #4CAF50;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenue parmi nous, {{ $user->name }} !</h2>

        <p>Nous sommes ravis de vous compter parmi nos utilisateurs. Votre compte a été créé avec succès et vous pouvez dès à présent accéder à notre plateforme en toute sécurité. Voici vos identifiants :</p>

        <ul>
            <li><span class="email">Email :</span> {{ $user->email }}</li>
            <li><span class="password">Mot de passe :</span> {{ $password }}</li>
        </ul>

        <p>Nous vous conseillons de vous connecter rapidement pour personnaliser votre compte et, si nécessaire, modifier votre mot de passe pour plus de sécurité.</p>

        <a href="{{ url('/login') }}" class="btn">Se connecter à votre compte</a>

        <p class="footer">Merci pour votre confiance et à bientôt !<br>— L’équipe</p>
    </div>
</body>
</html>
