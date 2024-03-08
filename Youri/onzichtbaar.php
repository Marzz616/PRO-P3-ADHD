<?php
    
    
    include('config/config.php');

    
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
if (!empty($_POST['Naam']) && !empty($_POST['Email']) && !empty($_POST['s']) && !empty($_POST['n']) && !empty($_POST['z'])) {
    
        $pdo = new PDO($dsn, $dbUser, $dbPass);

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        
        $sql = "INSERT INTO project_p3(Name
                                        ,Email
                                        ,S
                                        ,N
                                        ,Z)
                VALUES              (:Name
                                        ,:Email
                                        ,:S
                                        ,:N
                                        ,:Z)";

        
        $statement = $pdo->prepare($sql);

        
        $statement->bindValue(':Name', $_POST['Naam'], PDO::PARAM_STR);
        $statement->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR);
        $statement->bindValue(':S', $_POST['s'], PDO::PARAM_STR);
        $statement->bindValue(':N', $_POST['n'], PDO::PARAM_STR);
        $statement->bindValue(':Z', $_POST['z'], PDO::PARAM_STR);


        
        $statement->execute();

        
        echo "De gegevens zijn opgeslagen in de database";
        
        



        
        header('Refresh:2.5; url=form.html');
}else{
        echo"Vul alsjeblieft alles in!";
        return;
}

    