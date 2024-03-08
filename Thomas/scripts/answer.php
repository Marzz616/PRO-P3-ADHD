<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Authorization: Bearer OPENAI_API_KEY></Authorization:>
    <title>Antwoord!</title>
    <link rel="stylesheet" href="../css/header_and_footer.css">
    <link rel="stylesheet" href="../css/faq.css">
</head>
<body>
    <!-- Header -->
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
        // Include config and OpenAI API files
        require_once('../config/config.php');
        require_once('../database/database.php');
        require_once('../api/OpenAI.php');

        // Controleer of het een POST-verzoek is
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            header("Location: index.php");
            exit;
        }

        // De bestaande vragen in de lijst
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

        // Verbinding maken met de database
        $conn = getDBConnection();

        // Controleer of het een POST-verzoek is en of er een vraag is ingediend
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["question"])) {
            $question = $_POST["question"];

            // Controleren of de vraag al bestaat in de database
            $stmt = $conn->prepare("SELECT * FROM qa_table WHERE question = ?");
            $stmt->bind_param("s", $question);
            $stmt->execute();
            $result = $stmt->get_result();

            // Schoonmaken van de vraag voor vergelijking
            $clean_question = preg_replace('/[^a-zA-Z0-9]/', '', $question);
            $clean_existing_questions = array_map(function ($q) {
                return preg_replace('/[^a-zA-Z0-9]/', '', $q);
            }, $existing_questions);

            $clean_question = strtolower($clean_question);
            $clean_existing_questions = array_map('strtolower', $clean_existing_questions);

            // Als de vraag al bestaat, geef dan een foutmelding weer
            if (in_array($clean_question, $clean_existing_questions)) {
                echo "<div class='echo-text'>Deze vraag bestaat al!</div>";
            } else {
                try {
                    // Genereer antwoord met behulp van de OpenAI API
                    $answer = generate_answer($question);

                    // Voeg de vraag en het antwoord toe aan de database
                    $stmt = $conn->prepare("INSERT INTO qa_table (question, answer) VALUES (?, ?)");
                    $stmt->bind_param("ss", $question, $answer);
                    if ($stmt->execute() === TRUE) {
                        echo "<div class='echo-text'>" . $answer . "</div>";
                    } else {
                        echo "<div class='echo-text'>Error: " . $conn->error;
                    }
                    $stmt->close();
                } catch (\Exception $e) {
                    echo "<div class='echo-text'>Error: " . $e->getMessage() . "</div>";
                }
            }
            $conn->close();
        } else {
            // Geef een foutmelding weer als er geen vraag is ingediend
            echo "<div class='echo-text'>Je hebt niks ingevoerd!</div>";
        }

        // Functie om het antwoord op de vraag te genereren met behulp van de OpenAI API
        function generate_answer($question)
        {
            $prompt = "Question: $question\nAnswer:";
            $response = \OpenAI\Completion::create([
                'model' => 'davinci',
                'prompt' => $prompt,
                'max_tokens' => 50,
                'temperature' => 0.5,
                'n' => 1,
            ]);
            $answer = $response->choices[0]->text;
            return $answer;
        }
        ?>
    </div>
    <footer>
        <div class="footer-text">Deze tekst is tijdelijk</div>
        <a href="https://adhdcentraal.nl/zelftest/" class="footer-button">Doe de ADHD test</a>
    </footer>
</body>
</html>