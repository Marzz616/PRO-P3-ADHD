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
    <!-- Header -->
    <header>
        <nav class="fixed">
          <div class="menu-container jc-flex-end ">
            <div class="logo">
              <span>Focus</span>Fuse AD(H)D
              <!--   <p class="text"></p>-->
            </div>
            <div class="main-menu row jc-space-between">
              <ul>
                <li><a href="../shuhd/index.html">Home</a></li>
                <li><a href="../Nimród/informatie.html">Informatie</a></li>
                <li><a href="../mario/trainning.html">Trainingen</a></li>
                <li><a href="../Jorge/contact.html">Contact</a></li>
                <li><a href="../Thomas/archives/faq.html">FAQ</a></li>
              </ul>
            </div>
            <div class="user-menu">
              <ul>
                <li><a class="active" href="../Youri/index.php">Login</a></li>
                <li><a class="active" href="../Youri/index.php">Register</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    <div class="faq-container answers jc-center col-6">
        <?php
        // Inclusie van configuratie- en databasebestanden
        require_once('../config/config.php');
        require_once('../database/database.php');

        // Lijst van bestaande vragen over ADHD/ADD
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

        // Controleren of het een POST-verzoek is en of de vraag niet leeg is
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["question"])) {
            $conn = getDBConnection();

            // Escapen van de vraag om SQL-injecties te voorkomen
            $question = addslashes($_POST["question"]);

            // Query om te controleren of de vraag al bestaat in de database
            $stmt = $conn->prepare("SELECT * FROM qa_table WHERE question = ?");
            $stmt->bind_param("s", $question);
            $stmt->execute();
            $result = $stmt->get_result();

            // Schoonmaken van de vraag en bestaande vragen om hoofdlettergevoeligheid te negeren
            $clean_question = preg_replace('/[^a-zA-Z0-9]/', '', $question);
            $clean_existing_questions = array_map(function ($q) {
                return preg_replace('/[^a-zA-Z0-9]/', '', $q);
            }, $existing_questions);

            // Omzetten van vraag en bestaande of wel of deze over ADHD/ADD gaat
            $clean_question = strtolower($clean_question);
            $clean_existing_questions = array_map('strtolower', $clean_existing_questions);

            if (in_array($clean_question, $clean_existing_questions)) {
                echo "<div class='echo-text'>Deze vraag bestaat al!</div>";
            } else if (!preg_match("/\b(ADHD|ADD)\b/i", $question)) {
                echo "<div class='echo-text'>Deze vraag gaat niet over ADHD of ADD!</div>";
            } else {
                // Toevoegen van de vraag aan de database als deze nieuw is en over ADHD/ADD gaat
                $stmt = $conn->prepare("INSERT INTO qa_table (question) VALUES (?)");
                $stmt->bind_param("s", $question);
                if ($stmt->execute() === TRUE) {
                    echo "<div class='echo-text'>Dankjewel voor een vraag stellen! We bewaren hem voor jou en we kijken ernaar.</div>";
                } else {
                    echo "<div class='echo-text'>Er is een fout opgetreden bij het toevoegen van de vraag aan de database.</div>";
                }
            }
        } else {
            // Melding als er geen vraag is ingevoerd
            echo "<div class='echo-text'>Je hebt niks ingevoerd!</div>";
        }

        // Databaseverbinding sluiten
        $conn->close();
        ?>
        <form action="../faq.html" method="post">
            <input type="submit" value="Terug naar FAQ Pagina!" class="submit-button">
        </form>  
    </div>
    <footer class="footer">
        <div class="footer-top">
            <div class="footer-container">
                <div class="row">
                    <div class="col-sm-4 col-6">
                        <h5>The Team</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Course</a></li>
                            <li><a href="#">School</a></li>
                            <li><a href="#">Members</a></li>
                            <li><a href="#">Project Corporation</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-6">
                        <h5>Our Website</h5>
                        <ul>
                            <li><a href="#">Why we made it</a></li>
                            <li><a href="#">Info Page</a></li>
                            <li><a href="#">Faq Page</a></li>
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-12">
                        <h5>Get In Touch</h5>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Website problems</a></li>
                            <li><a href="#">Email us</a></li>
                            <li><a href="#">Call us</a></li>
                            <li><a href="#">Sms us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-container">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12">
                        <ul class="footer-social">
                            <li><a href="#"><img src="../Nimród/Sprint 2/assets/img/footer/facebook2.png" alt=""><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><img src="../Nimród/Sprint 2/assets/img/footer/instagram2.png" alt=""><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><img src="../Nimród/Sprint 2/assets/img/footer/youtube2.png" alt=""><i
                                        class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-12">
                        <p class="copyright-text">Copyright © 2024 Team Youri<br>All rights are ours.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>