<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>CRUD</title>
</head>
<body>
    <h3>CRUD met PHP, MySQL en PDO</h3>

    <form method="post" action="create.php">
        <label for="Name">Name: </label>
        <input type="text" name="Name" id="Name"><br>

        <label for="CapitalCity">CapitalCity: </label>
        <input type="text" name="CapitalCity" id="CapitalCity"><br>

        <input type="submit" value="Verzend">
    </form>
</body>
</html>