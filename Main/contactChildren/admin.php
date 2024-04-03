<?php



include('config/config.php');


$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";


$pdo = new PDO($dsn, $dbUser, $dbPass);


$contactInfo = "SELECT Name
              ,Email
              ,Message
        FROM  contact_info";

$formInfo = "SELECT Name
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
        FROM project_p3";


$statement = $pdo->prepare($contactInfo);

$statement2 = $pdo->prepare($formInfo);



$statement->execute();

$statement2->execute();



$result = $statement->fetchAll(PDO::FETCH_OBJ);
$result2 = $statement2->fetchAll(PDO::FETCH_OBJ);


$contactRows = "";
$formRows = "";


foreach ($result as $persoonObject) {
    $contactRows .= "<tr>
                        <td>$persoonObject->Name</td>
                        <td>$persoonObject->Email</td>
                        <td>$persoonObject->Message</td>               
                   </tr>";
}

foreach ($result2 as $formObject) {
    $formRows .= "<tr>
    <td>{$formObject->Name}</td>
    <td>{$formObject->Email}</td>
    <td>{$formObject->{'vraag 1'}}</td>
    <td>{$formObject->{'vraag 2'}}</td>
    <td>{$formObject->{'vraag 3'}}</td> 
    <td>{$formObject->{'vraag 4'}}</td> 
    <td>{$formObject->{'vraag 5'}}</td>               
    <td>{$formObject->{'vraag 6'}}</td>               
    <td>{$formObject->{'vraag 7'}}</td>               
    <td>{$formObject->{'vraag 8'}}</td>               
    <td>{$formObject->{'vraag 9'}}</td>               
    <td>{$formObject->{'vraag 10'}}</td>
    <td>{$formObject->{'totale punten'}}</td>                                           
</tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/adminPage.css">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/header_and_footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Weergave personen</title>
</head>
<body>
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
                        <li><a class="active" href="../main_page/resultaten.php">AD(H)D Test</a></li>
                    </ul>
                </div>
            </div>
            <div id="progress-bar"></div>
        </nav> 
<main>
    <div class="tabel-1-display">
        <h3>Contact Info</h3>
        <p>Hieronder staan de contactgegevens van personen die iets willen vragen of willen weten</p>
        <table class="contactInfo">
            <thead>
                <th>Naam</th>
                <th>Email</th>
                <th>Bericht</th>
            </thead>
            <tbody>
                <?php echo $contactRows; ?>
            </tbody>
        </table>
        <form method="post" action="deleteRow.php">

        <label for="Name">Name: </label>
        <input type="text" name="Name" id="Name">

        <label for="Email">Email: </label>
        <input type="text" name="Email" id="Email">

        <input type="hidden" name="type" value="Contact">

        <input type="submit" value="Verwijder">
    </form>
        <button class="knopVoorFormInfo">Form info</button>
    </div>
    
    <div class="tabel-2-display">
        <table class="formInfo">
            <h3>Form Info</h3>
            <p>Hieronder staan de gegevens van mensen die ons formulier hebben ingevuld</p>
            <thead>
                <th>Naam</th>
                <th>Email</th>
                <th>vraag 1</th>
                <th>vraag 2</th>
                <th>vraag 3</th>
                <th>vraag 4</th>
                <th>vraag 5</th>
                <th>vraag 6</th>
                <th>vraag 7</th>
                <th>vraag 8</th>
                <th>vraag 9</th>
                <th>vraag 10</th>
                <th>totale score</th>

            </thead>
            <tbody>
                <?php echo $formRows; ?>
            </tbody>
        </table>
        <form method="post" action="deleteRow.php">

        <label for="Name">Name: </label>
        <input type="text" name="Name" id="Name">

        <label for="Email">Email: </label>
        <input type="text" name="Email" id="Email">

        <input type="hidden" name="type" value="Form">

        <input type="submit" value="Verwijder">
    </form>
        <button class="knopVoorContactInfo">Contact info</button>
    </div>


    
<main>

    <script src="../assets/javascript/knop-admin.js"></script>
</body>
</html>