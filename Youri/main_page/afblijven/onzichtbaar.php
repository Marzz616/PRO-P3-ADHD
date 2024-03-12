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
        
                    $sql = "INSERT INTO project_p3(Name, Email, S, N, Z) VALUES (:Name, :Email, :S, :N, :Z)";
                    $statement = $pdo->prepare($sql);
        
                    $statement->bindValue(':Name', $_POST['Naam'], PDO::PARAM_STR);
                    $statement->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR);
                    $statement->bindValue(':S', $_POST['s'], PDO::PARAM_STR);
                    $statement->bindValue(':N', $_POST['n'], PDO::PARAM_STR);
                    $statement->bindValue(':Z', $_POST['z'], PDO::PARAM_STR);
        
                    $statement->execute();
        
                    echo "Uw gegevens zijn opgeslagen ";
                    echo "<a href='../index.php'>Klik hier om terug te gaan</a>";
                    
        
                } else {
                    // Geef een foutmelding weer als niet alle velden zijn ingevuld
                    echo "Vul alstublieft alle velden in.";
                }
            }

    