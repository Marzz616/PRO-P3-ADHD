<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../assets/css/header_and_footer.css">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">
  <script src="../assets/javascript/progressBar.js"></script>
  <script src="../assets/javascript/activeTab.js"></script>
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
                            <li><a href="../aboutUs.html">About Us</a></li>
                            <li><a href="../faq.html">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="user-menu">
                        <ul>
                            <li><a href="resultaten.php">AD(H)D Test</a></li>
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
    
        $pdo = new PDO($dsn, $dbUser, $dbPass);

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $sql = "SELECT  Name
                        ,Email
                        ,`vraag 1`
                        ,`vraag 2`
                        ,`vraag 3`
                        ,`vraag 4`
                        ,`vraag 5`
                        ,`vraag 6`
                        ,`vraag 7`
                        ,`vraag 8`
                        ,`vraag 9`
                        ,`vraag 10`
                        ,`totale punten`
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

            echo "<h2>Eindresultaat</h2>";
            echo "Uw uiteindelijk score: " . $result['totale punten'] . " van de 20" . "<br>";
            if($result['totale punten'] >= 14){
                echo"Uw Score duidt aan dat u ADHD heeft.<br> Voor tips en hulpmiddelen ga naar onze <a href='../trainingen.html'>Trainingen</a> pagina.";
            }else if($result['totale punten'] > 9){
                echo"Uw score duidt aan dat u een mogelijk ADHD heeft. Voor een uitgebreidere test kan u Uw dichtsbijzijnde huisarts/apotheek vinden door <a href='../lokale_praktijken'>HIER</a> te klikken<br>";
            }else{
                echo"Uw score duidt aan dat u geen ADHD heeft<br>";
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