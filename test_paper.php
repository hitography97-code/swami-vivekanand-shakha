<?php

$class =
    $_GET['class'] ?? '4-5';

?>

<!DOCTYPE html>

<html lang="mr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test Papers</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>

        <h2>
            स्वामी विवेकानंद शाखा
        </h2>

        <nav>

            <a href="index.php">
                Home
            </a>

            <a href="study.php">
                Study
            </a>

            <a href="mcq.php">
                MCQ Game
            </a>

        </nav>

    </header>


    <div class="container">

        <h1>
            📝 Test Papers
        </h1>

        <h2>
            Class: <?php echo htmlspecialchars($class); ?>
        </h2>


        <div class="paper-list">

            <div class="paper">

                <h3>
                    📄 Mathematics Test Paper
                </h3>

                <p>
                    Practice test paper
                </p>

                <a href="#" class="btn">

                    Open PDF

                </a>

            </div>


            <div class="paper">

                <h3>
                    📄 Science Test Paper
                </h3>

                <p>
                    Practice test paper
                </p>

                <a href="#" class="btn">

                    Open PDF

                </a>

            </div>


            <div class="paper">

                <h3>
                    📄 English Test Paper
                </h3>

                <p>
                    Practice test paper
                </p>

                <a href="#" class="btn">

                    Open PDF

                </a>

            </div>


        </div>

    </div>

</body>

</html>