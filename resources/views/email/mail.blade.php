<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Mail</title>
    <style>
        body{
            background-color: grey;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    
    <p>Bonjour {{ $name }}</p>
    
    <p>lien  : <a href="http://localhost:8000/login">Connexion</a></p>
        <p>{{!! $body !!}}</p>
</body>