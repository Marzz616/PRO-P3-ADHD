<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../assets/css/header_and_footer.css">
    <link rel="stylesheet" href="../assets/css/global.css">
  <script src="../Main/assets/javascript/progressBar.js"></script>
    <title>Document</title>
</head>
<body>

    <header>
            <nav class="fixed">
                <div class="menu-container">
                    <div class="logo">
                        <span>Focus</span>Fuse
                        <p>AD(H)D</p>
                    </div>
                    <div class="main-menu row jc-space-between">
                        <ul>
                            <li><a href="../index.html">Home</a></li>
                            <li><a href="../informatie.html">ADHD</a></li>
                            <li><a href="../ADD.html">ADD</a></li>
                            <li><a href="../trainning.html">Trainingen</a></li>
                            <li><a href="../contact.html">Contact</a></li>
                            <li><a href="../faq.html">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="user-menu">
                        <ul>
                            <li><a class="active" href="main_page/resultaten.php">AD(H)D Test</a></li>
                        </ul>
                    </div>
                </div>
                <div id="progress-bar"></div>
            </nav>
        </header>
    <div class="gegevens">
<form class="persoonsgegevens" method="post" action="">
            <div class="persoon">
                <label for="Naam">Naam: </label>
                <input type="text" id="Naam" name="Naam"> 
                <label for="Email">E-mailadres: </label>
                <input type="text" id="Email" name="Email">
            </div>
            <input class="inleveren2" type="submit" value="submit">
</form>
<div class="resultaten">
<?php
    
    
    include('config/config.php');

    
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
if (!empty($_POST['Naam']) && !empty($_POST['Email'])){
    $punten = 0;
    
        $pdo = new PDO($dsn, $dbUser, $dbPass);

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $sql = "SELECT  Name
                        ,Email
                        ,S
                        ,N
                        ,Z
                from project_p3
                WHERE Name = :Name AND Email = :Email";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':Name', $_POST['Naam'], PDO::PARAM_STR);
        $statement->bindValue(':Email', $_POST['Email'], PDO::PARAM_STR);

        $statement->execute();
        
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo "Name: " . $result['Name'] . "<br>";
            echo "Email: " . $result['Email'] . "<br>";
            echo "Aantal statements sterk mee eens: " . $result['S'] . "<br>";
            echo "Aantal statements mee eens: " . $result['N'] . "<br>";
            echo "Aantal statements niet mee eens: " . $result['Z'] . "<br>";

            $punten += (2 * $result['S']);
            $punten += $result['N'];
            
            echo "<h2>Hier is uw resultaat:</h2>";

            if($punten >= 10)
            {
                echo "Uw score is hoog genoeg dat een afspraak bij uw huisarts voor een medische bewezen test aan te raden is. <br>";
            }else{
                echo "Uw score is niet hoog genoeg om door ons aangeraden te krijgen ofdat u een afspraak met de huisarts moet maken.<br>
                Mocht u toch denken dat u een medische test wilt neem dan contact op met de dichstbijzijnde huisarts<br>";
            }
        } else {
            echo "Geen resultaten gevonden voor de opgegeven naam en e-mail.";
        }

    } 
?>
</div>
        </div>
        <div class="nieuw-formulier">
            <h3>Staat uw formulier nog niet in ons systeem maak dan <a href="afblijven/form.html">hier</a> uw formulier aan</h3>
            
        </div>
</body>
</html>