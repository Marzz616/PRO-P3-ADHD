<?php
include('config/config.php');

    // Controleer of er POST-gegevens zijn verzonden
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Maak de $_POST-array schoon
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Controleer het type formulier en stel de juiste SQL-query in
        if ($_POST["type"] == "Contact") {
            $sql = "DELETE FROM contact_info WHERE Name = :Name AND Email = :Email";
        } else if ($_POST["type"] == "Form") {
            $sql = "DELETE FROM project_p3 WHERE Name = :Name AND Email = :Email";
        }

        // Maak een nieuwe PDO-verbinding
        $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
        $pdo = new PDO($dsn, $dbUser, $dbPass);

        // Prepareer de query
        $statement = $pdo->prepare($sql);

        // Verbind de $_POST-waarden met de placeholders
        $statement->bindValue(':Name', $_POST['Name'], PDO::PARAM_STR);
        $statement->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR);

        // Voer de query uit in de database
        $statement->execute();

        // Geef feedback aan de gebruiker
        echo "De gegevens zijn verwijderd uit de database";

        // Redirect naar een andere pagina na een vertraging van 0.5 seconden
        header('Refresh:0.5; url=admin.php');
        exit(); // Stop de verdere uitvoering van het script
    }
?>