<?php
    
    
    include('config/config.php');

    
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                // Controleer of alle velden zijn ingevuld
                if (!empty($_POST['Naam']) && !empty($_POST['Email'])) {
                    
                    // Voer hier de code uit om de gegevens naar de database te schrijven
                    include('config/config.php');
        
                    $dsn = "mysql:host=$dbHost; dbname=$dbName; charset=UTF8";
                    $pdo = new PDO($dsn, $dbUser, $dbPass);
        
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                    $sql = "INSERT INTO project_p3(Name, Email, `vraag 1`, `vraag 2`, `vraag 3`, `vraag 4`, `vraag 5`, `vraag 6`, `vraag 7`, `vraag 8`, `vraag 9`, `vraag 10`, `totale punten`) VALUES (:Name, :Email, :1, :2, :3, :4, :5, :6, :7, :8, :9, :10, :points)";
                    $statement = $pdo->prepare($sql);
        
                    $statement->bindValue(':Name', $_POST['Naam'], PDO::PARAM_STR);
                    $statement->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR);
                    $statement->bindValue(':1', $_POST['vraag-1'], PDO::PARAM_STR);
                    $statement->bindValue(':2', $_POST['vraag-2'], PDO::PARAM_STR);
                    $statement->bindValue(':3', $_POST['vraag-3'], PDO::PARAM_STR);
                    $statement->bindValue(':4', $_POST['vraag-4'], PDO::PARAM_STR);
                    $statement->bindValue(':5', $_POST['vraag-5'], PDO::PARAM_STR);
                    $statement->bindValue(':6', $_POST['vraag-6'], PDO::PARAM_STR);
                    $statement->bindValue(':7', $_POST['vraag-7'], PDO::PARAM_STR);
                    $statement->bindValue(':8', $_POST['vraag-8'], PDO::PARAM_STR);
                    $statement->bindValue(':9', $_POST['vraag-9'], PDO::PARAM_STR);
                    $statement->bindValue(':10', $_POST['vraag-10'], PDO::PARAM_STR);
                    $statement->bindValue(':points', $_POST['total-points'], PDO::PARAM_STR);


        
                    $statement->execute();
        
                    echo "Uw gegevens zijn opgeslagen ";
                    echo "<a href='../resultaten.php'>Klik hier om terug te gaan</a>";
                    
        
                } else {
                    // Geef een foutmelding weer als niet alle velden zijn ingevuld
                    echo "Vul alstublieft alle velden in.";
                }
            }

    