<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Utente</title>
</head>
<body>
    <h2>Registrazione Utente</h2>
    <form action="registrazione_utente_process.php" method="GET">
        <label for="nuovo_username_utente">Nuovo Username:</label><br>
        <input type="text" id="nuovo_username_utente" name="nuovo_username_utente"><br>
        <label for="nuova_password_utente">Nuova Password:</label><br>
        <input type="password" id="nuova_password_utente" name="nuova_password_utente"><br><br>
        <input type="submit" value="Registrati">
    </form>
</body>
</html>
