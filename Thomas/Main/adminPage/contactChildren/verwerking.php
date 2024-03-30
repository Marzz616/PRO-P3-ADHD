<?php
    include('config/config.php');

    
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                // Controleer of alle velden zijn ingevuld
                if (!empty($_POST['Naam']) && !empty($_POST['Email'])) {
                    
                    
                    if ($_POST['Naam'] == "Youri" && $_POST['Email'] == "Admin@admin.com") {
                        header("Location: admin.php");
                        exit;
                    }                                     
                    $dsn = "mysql:host=$dbHost; dbname=$dbName; charset=UTF8";
                    $pdo = new PDO($dsn, $dbUser, $dbPass);
        
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                    $sql = "INSERT INTO contact_info(Name, Email, Message) VALUES (:Name, :Email, :Message)";
                    $statement = $pdo->prepare($sql);
        
                    $statement->bindValue(':Name', $_POST['Naam'], PDO::PARAM_STR);
                    $statement->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR);
                    $statement->bindValue(':Message', $_POST['Message'], PDO::PARAM_STR);
                    
        
                    $statement->execute();
        
                    echo "Uw gegevens zijn opgeslagen ";
                    echo "<a href='../index.php'>Klik hier om terug te gaan</a>";
                    
        
                } else {
                    // Geef een foutmelding weer als niet alle velden zijn ingevuld
                    echo "Vul alstublieft alle velden in.";
                }
            }
?>