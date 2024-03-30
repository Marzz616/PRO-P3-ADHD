<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
<form class="persoonsgegevens" method="post" action="contactChildren/verwerking.php">
            <div class="persoon">
                <label for="Naam">Naam: </label>
                <input type="text" id="Naam" name="Naam"> 
                <label for="Email">E-mailadres: </label>
                <input type="text" id="Email" name="Email">
                <label for="Message">Message: </label>
                <input type="text" id="Message" name="Message">
            </div>
            <input class="inleveren2" type="submit" value="submit">
            <a href="contactChildren/admin.php">Test doeleinden</a>
</form>
</body>
</html>

