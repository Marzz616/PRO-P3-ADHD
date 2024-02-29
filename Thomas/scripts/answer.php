<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antwoord!</title>
    <link rel="stylesheet" href="../css/header_and_footer.css">
    <link rel="stylesheet" href="../css/faq.css">
</head>
<body>
    <header>
        <nav class="fixed">
            <div class="menu-container row jc-space-between">
                <div class="main-menu">
                    <ul>
                        <li><a href="../shuhd/index.html">Home</a></li>
                        <li><a href="../Nimród/informatie.html">Informatie</a></li>
                        <li><a href="../Thomas/faq.html">FAQ</a></li>
                    </ul>
                </div>
                <div class="user-menu">
                    <ul>
                        <li><a class="active">Login</a></li>
                        <li><a class="active">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="faq-container answers jc-center col-6">
        <?php

        // De Vragenlijst
        $existing_questions = [
            "Wat is het verschil tussen ADHD en ADD?",
            "Wat zijn de belangrijkste symptomen van ADHD en ADD?",
            "Wanneer wordt ADHD/ADD meestal gediagnosticeerd?",
            "Hoe kan ik omgaan met ADHD/ADD op het werk?",
            "Zijn er specifieke sporten die kunnen helpen bij het beheersen van ADHD/ADD symptomen?",
            "Wat zijn enkele tips voor ouders van kinderen met ADHD/ADD?",
            "Hoe wordt ADHD/ADD behandeld?",
            "Welke medicijnen worden vaak voorgeschreven voor ADHD/ADD?",
            "Hoe beïnvloedt ADHD/ADD het dagelijks leven?",
            "Zijn er specifieke dieetmaatregelen voor mensen met ADHD/ADD?",
            "Is ADHD/ADD erfelijk?",
            "Kunnen mensen met ADHD/ADD succesvol zijn in hun carrière?",
            "Welke ondersteuning is beschikbaar voor mensen met ADHD/ADD?",
            "Hoe kan ik mijn concentratie verbeteren?",
            "Zijn er alternatieve behandelingen voor ADHD/ADD?",
            "Hoe kan ik mijn kinderen ondersteunen als ze ADHD/ADD hebben?",
            "Wat zijn enkele mogelijke complicaties van ADHD/ADD?",
            "Hoe kan ik het beste omgaan met de emotionele uitdagingen van ADHD/ADD?",
            "Zijn er specifieke slaapproblemen geassocieerd met ADHD/ADD?",
            "Hoe kan ik als partner van iemand met ADHD/ADD het beste ondersteunen?",
            "Wat zijn enkele strategieën voor het omgaan met impulsiviteit?",
            "Zijn er verschillende vormen van ADHD/ADD?",
            "Kan ADHD/ADD worden veroorzaakt door voeding?",
            "Welke rol spelen omgevingsfactoren bij ADHD/ADD?",
            "Hoe kan ik een gezonde levensstijl bevorderen voor iemand met ADHD/ADD?",
            "Wat zijn enkele veelvoorkomende misvattingen over ADHD/ADD?",
            "Hoe kan ik mijn kinderen helpen omgaan met de uitdagingen van ADHD/ADD op school?",
            "Is er een verband tussen ADHD/ADD en slaapstoornissen?",
            "Welke rol spelen neurotransmitters bij ADHD/ADD?",
            "Kan het gebruik van beeldschermen de symptomen van ADHD/ADD beïnvloeden?"
        ];

// Antwoorden array defineren
$answers = ["Hoe moet ik dat weten?", "Misschien.", "Vraag het aan je moeder.", "Geen idee!"];

// Redirect logic
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

// Controleer of het formulier is verzonden en of het vraagveld niet leeg is
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["question"])) {
    // Database referenties
    $servername = 'localhost';
    $username = 'thomasmeijer';
    $password = 'ep0Nr1XMCkA(64ER';
    $dbname = 'faq';

    // Maak een connectie aan
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Controleer de connectie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Haal de vraag op uit het formulier
    $question = $_POST["question"];

    /**
     * Verwerk de vraag en bestaande vragen vooraf om niet-alfanumerieke tekens 
     * en spaties te verwijderen
     */
    $clean_question = preg_replace('/[^a-zA-Z0-9]/', '', $question);
    $clean_existing_questions = array_map(function ($q) {
        return preg_replace('/[^a-zA-Z0-9]/', '', $q);
    }, $existing_questions);

    // Valideer de vraag
    if (in_array(strtolower($clean_question), array_map('strtolower', $clean_existing_questions))) {
        echo "<div class='echo-text'>Deze vraag bestaat al!</div>";
    } else {
        // SQL-instructie voorbereiden om de vraag en het antwoord in de database in te voegen
        $sql = "INSERT INTO qa_table (question, answer) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $question, $answer);
    
        /**
         * Genereer een antwoord - laten we voor demonstratiedoeleinden 
         * gewoon een willekeurig antwoord genereren
         */
        $answer = $answers[array_rand($answers)];
    
        // Voer de SQL-instructie uit
        if ($stmt->execute() === TRUE) {
            // Geef het willekeurige antwoord weer
            echo "<div class='echo-text'>" . $answer . "</div>";
        } else {
            echo "<div class='echo-text'>Error: " . $sql . "<br>" . $conn->error;
        }
    
        // Sluit het statement
        $stmt->close();
    }
    
    // Sluit de connectie
    $conn->close();
} else {
    // Als het vraagveld leeg is, geef dan een foutmelding weer
    echo "<div class='echo-text'>Als je grappig probeert ze zijn stel dan tenminste een vraag!</div>";
}

// Omleiden naar index.php na 3 seconden
header('Refresh:3; url=../index.php');
?>
    </div>
</body>
</html>