<?php
    include('config/config.php');

    
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                // Controleer of alle velden zijn ingevuld
                if (!empty($_POST['name']) && !empty($_POST['email'])) {
                    
                    
                    if ($_POST['name'] == "Youri" && $_POST['email'] == "Admin@admin.com") {
                        header("Location: ../admin.php");
                        exit;
                    }                                     
                    $dsn = "mysql:host=$dbHost; dbname=$dbName; charset=UTF8";
                    $pdo = new PDO($dsn, $dbUser, $dbPass);
        
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                    $sql = "INSERT INTO contact_info(Name, Email, Message) VALUES (:Name, :Email, :Message)";
                    $statement = $pdo->prepare($sql);
        
                    $statement->bindValue(':Name', $_POST['name'], PDO::PARAM_STR);
                    $statement->bindValue(':Email', $_POST['email'], PDO::PARAM_STR);
                    $statement->bindValue(':Message', $_POST['message'], PDO::PARAM_STR);
                    
        
                    $statement->execute();
        
                    echo "Uw gegevens zijn opgeslagen ";
                    echo "<a href='../contact.html'>Klik hier om terug te gaan</a>";
                    
        
                } else {
                    // Geef een foutmelding weer als niet alle velden zijn ingevuld
                    echo "Vul alstublieft alle velden in.";
                }
            }
?>