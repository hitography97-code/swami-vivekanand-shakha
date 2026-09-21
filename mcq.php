<?php

$class = $_GET['class'] ?? '4-5';


function build_mcq_bank()
{
    $makeOptions = function ($answer, array $distractors): array {
        $options = [(string) $answer];

        foreach ($distractors as $item) {
            $value = (string) $item;
            if ($value !== (string) $answer && !in_array($value, $options, true)) {
                $options[] = $value;
            }
        }

        while (count($options) < 4) {
            $extra = (string) ((int) $answer + count($options) * 11 + 7);
            if (!in_array($extra, $options, true)) {
                $options[] = $extra;
            } else {
                $options[] = 'Option ' . (count($options) + 1);
            }
        }

        shuffle($options);
        return array_slice($options, 0, 4);
    };

    $questions = [
        '4-5' => [],
        '6-8' => [],
        '9-10' => [],
        '11-12' => [],
    ];

    $gradeTemplates = [
        '4-5' => ['addition', 'subtraction', 'vowel', 'capital', 'planet'],
        '6-8' => ['math', 'photosynthesis', 'addition', 'planetary', 'breathing', 'national-flower'],
        '9-10' => ['square', 'oxygen-symbol', 'power', 'constitution', 'continent', 'force'],
        '11-12' => ['derivative', 'math', 'water', 'cell', 'force', 'square'],
    ];

    $capitalCities = [
        'India' => 'Delhi',
        'Maharashtra' => 'Mumbai',
        'Punjab' => 'Chandigarh',
        'Gujarat' => 'Gandhinagar',
        'Karnataka' => 'Bengaluru',
    ];

    foreach ($gradeTemplates as $grade => $templates) {
        for ($i = 0; $i < 250; $i++) {
            $type = $templates[$i % count($templates)];
            $a = ($i * 7 % 25) + 4;
            $b = ($i * 11 % 18) + 3;
            $c = ($i * 13 % 40) + 5;
            $d = ($i * 17 % 20) + 2;

            switch ($grade) {
                case '4-5':
                    switch ($type) {
                        case 'addition':
                            $answer = $a + $b;
                            $questions[$grade][] = [
                                'q' => $a . ' + ' . $b . ' = ?',
                                'options' => $makeOptions((string) $answer, [$answer + 5, $answer - 3, $answer + 8]),
                                'answer' => (string) $answer,
                            ];
                            break;

                        case 'subtraction':
                            $answer = $c - $d;
                            $questions[$grade][] = [
                                'q' => $c . ' - ' . $d . ' = ?',
                                'options' => $makeOptions((string) $answer, [$answer + 4, $answer - 2, $answer + 7]),
                                'answer' => (string) $answer,
                            ];
                            break;

                        case 'vowel':
                            $vowels = ['A', 'E', 'I', 'O', 'U'];
                            $answer = $vowels[$i % count($vowels)];
                            $questions[$grade][] = [
                                'q' => 'Which letter is a vowel?',
                                'options' => $makeOptions($answer, ['B', 'C', 'D', 'F']),
                                'answer' => $answer,
                            ];
                            break;

                        case 'capital':
                            $state = array_keys($capitalCities)[$i % count($capitalCities)];
                            $answer = $capitalCities[$state];
                            $questions[$grade][] = [
                                'q' => 'What is the capital of ' . $state . '?',
                                'options' => $makeOptions($answer, ['Pune', 'Nagpur', 'Jaipur', 'Lucknow']),
                                'answer' => $answer,
                            ];
                            break;

                        case 'planet':
                            $questions[$grade][] = [
                                'q' => 'Which planet is known as the Red Planet?',
                                'options' => $makeOptions('Mars', ['Earth', 'Venus', 'Jupiter', 'Saturn']),
                                'answer' => 'Mars',
                            ];
                            break;
                    }
                    break;

                case '6-8':
                    switch ($type) {
                        case 'math':
                            $answer = $a * $b;
                            $questions[$grade][] = [
                                'q' => $a . ' × ' . $b . ' = ?',
                                'options' => $makeOptions((string) $answer, [$answer + 12, $answer - 9, $answer + 20]),
                                'answer' => (string) $answer,
                            ];
                            break;

                        case 'photosynthesis':
                            $questions[$grade][] = [
                                'q' => 'Plants make their food by which process?',
                                'options' => $makeOptions('Photosynthesis', ['Respiration', 'Digestion', 'Transpiration']),
                                'answer' => 'Photosynthesis',
                            ];
                            break;

                        case 'addition':
                            $answer = $c + $d;
                            $questions[$grade][] = [
                                'q' => $c . ' + ' . $d . ' = ?',
                                'options' => $makeOptions((string) $answer, [$answer + 6, $answer - 5, $answer + 11]),
                                'answer' => (string) $answer,
                            ];
                            break;

                        case 'planetary':
                            $questions[$grade][] = [
                                'q' => 'The Earth revolves around the:',
                                'options' => $makeOptions('Sun', ['Moon', 'Mars', 'Jupiter']),
                                'answer' => 'Sun',
                            ];
                            break;

                        case 'breathing':
                            $questions[$grade][] = [
                                'q' => 'Which gas do humans need for breathing?',
                                'options' => $makeOptions('Oxygen', ['Carbon Dioxide', 'Hydrogen', 'Nitrogen']),
                                'answer' => 'Oxygen',
                            ];
                            break;

                        case 'national-flower':
                            $questions[$grade][] = [
                                'q' => 'भारताचे राष्ट्रीय फूल कोणते?',
                                'options' => $makeOptions('Lotus', ['Rose', 'Lily', 'Sunflower']),
                                'answer' => 'Lotus',
                            ];
                            break;
                    }
                    break;

                case '9-10':
                    switch ($type) {
                        case 'square':
                            $answer = $a * $a;
                            $questions[$grade][] = [
                                'q' => 'What is the square of ' . $a . '?',
                                'options' => $makeOptions((string) $answer, [$answer + 12, $answer - 15, $answer + 21]),
                                'answer' => (string) $answer,
                            ];
                            break;

                        case 'oxygen-symbol':
                            $questions[$grade][] = [
                                'q' => 'What is the chemical symbol of Oxygen?',
                                'options' => $makeOptions('O', ['Ox', 'Og', 'On']),
                                'answer' => 'O',
                            ];
                            break;

                        case 'power':
                            $answer = $b * $b;
                            $questions[$grade][] = [
                                'q' => $b . '² = ?',
                                'options' => $makeOptions((string) $answer, [$answer + 11, $answer - 9, $answer + 18]),
                                'answer' => (string) $answer,
                            ];
                            break;

                        case 'constitution':
                            $questions[$grade][] = [
                                'q' => 'Who wrote the Indian Constitution?',
                                'options' => $makeOptions('Dr. B. R. Ambedkar', ['Mahatma Gandhi', 'Jawaharlal Nehru', 'Sardar Patel']),
                                'answer' => 'Dr. B. R. Ambedkar',
                            ];
                            break;

                        case 'continent':
                            $questions[$grade][] = [
                                'q' => 'Which is the largest continent?',
                                'options' => $makeOptions('Asia', ['Africa', 'Europe', 'Australia']),
                                'answer' => 'Asia',
                            ];
                            break;

                        case 'force':
                            $questions[$grade][] = [
                                'q' => 'The SI unit of force is:',
                                'options' => $makeOptions('Newton', ['Joule', 'Watt', 'Pascal']),
                                'answer' => 'Newton',
                            ];
                            break;
                    }
                    break;

                case '11-12':
                    switch ($type) {
                        case 'derivative':
                            $questions[$grade][] = [
                                'q' => 'What is the derivative of x²?',
                                'options' => $makeOptions('2x', ['x', 'x²', '2']),
                                'answer' => '2x',
                            ];
                            break;

                        case 'math':
                            $answer = $a * $b;
                            $questions[$grade][] = [
                                'q' => $a . ' × ' . $b . ' = ?',
                                'options' => $makeOptions((string) $answer, [$answer + 12, $answer - 9, $answer + 22]),
                                'answer' => (string) $answer,
                            ];
                            break;

                        case 'water':
                            $questions[$grade][] = [
                                'q' => 'H₂O is the chemical formula for:',
                                'options' => $makeOptions('Water', ['Oxygen', 'Hydrogen', 'Salt']),
                                'answer' => 'Water',
                            ];
                            break;

                        case 'cell':
                            $questions[$grade][] = [
                                'q' => 'The powerhouse of the cell is:',
                                'options' => $makeOptions('Mitochondria', ['Nucleus', 'Ribosome', 'Cell Wall']),
                                'answer' => 'Mitochondria',
                            ];
                            break;

                        case 'force':
                            $questions[$grade][] = [
                                'q' => 'The SI unit of force is:',
                                'options' => $makeOptions('Newton', ['Joule', 'Watt', 'Pascal']),
                                'answer' => 'Newton',
                            ];
                            break;

                        case 'square':
                            $answer = $c * $c;
                            $questions[$grade][] = [
                                'q' => 'The value of ' . $c . '² is:',
                                'options' => $makeOptions((string) $answer, [$answer + 15, $answer - 8, $answer + 26]),
                                'answer' => (string) $answer,
                            ];
                            break;
                    }
                    break;
            }
        }

        shuffle($questions[$grade]);
    }

    return $questions;
}

$questions = build_mcq_bank();


if (!isset($questions[$class])) {

    $class = '4-5';
}


$quiz = [];

if (
    isset($_GET['start'])
    || $_SERVER['REQUEST_METHOD'] == 'POST'
) {
    $quiz = array_slice($questions[$class], 0, 10);
}

$score = null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $score = 0;


    foreach (
        $quiz as $index => $question
    ) {

        $selected =
            $_POST['q' . $index]
            ?? '';


        if (
            $selected ===
            $question['answer']
        ) {

            $score++;
        }
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MCQ Game</title>

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

            <a href="register.php">
                Registration
            </a>

        </nav>

    </header>


    <div class="quiz-container">

        <h1>
            🎮 MCQ Quiz Game
        </h1>

        <p>
            Class:
            <strong>
                <?php echo htmlspecialchars($class); ?>
            </strong>
        </p>


        <?php

        if (!isset($_GET['start']) && $score === null && $_SERVER['REQUEST_METHOD'] !== 'POST') {
        ?>
            <div class="result-box">
                <h2>🧠 10 Questions Challenge</h2>
                <p>
                    Class: <strong><?php echo htmlspecialchars($class); ?></strong>
                </p>
                <p>Ready to start the 10-question quiz?</p>
                <a class="btn" href="mcq.php?class=<?php echo urlencode($class); ?>&start=1">
                    Start Quiz
                </a>
            </div>
        <?php
        }

        if ($score !== null) {

            $percentage =
                ($score / count($quiz)) * 100;

        ?>

            <div class="result-box">

                <h2>
                    🎉 Quiz Complete!
                </h2>

                <h1>
                    <?php echo $score; ?>
                    /
                    <?php echo count($quiz); ?>
                </h1>

                <p>

                    Percentage:
                    <strong>
                        <?php
                        echo number_format(
                            $percentage,
                            0
                        );
                        ?>%
                    </strong>

                </p>


                <?php

                if ($percentage >= 80) {

                ?>

                    <p class="excellent">
                        🌟 Excellent! Keep it up!
                    </p>

                <?php

                } elseif ($percentage >= 50) {

                ?>

                    <p class="good">
                        👍 Good Job!
                    </p>

                <?php

                } else {

                ?>

                    <p>
                        📚 Keep practicing!
                    </p>

                <?php

                }

                ?>

                <a class="btn" href="mcq.php?class=<?php
                                                    echo urlencode($class);
                                                    ?>&start=1">

                    Start Again

                </a>

            </div>


        <?php

        }

        ?>


        <?php

        if ($score === null && (isset($_GET['start']) || $_SERVER['REQUEST_METHOD'] == 'POST')) {

        ?>

            <form method="POST" action="mcq.php?class=<?php echo urlencode($class); ?>&start=1" class="quiz-form">


                <?php

                foreach (
                    $quiz as $index => $question
                ) {

                ?>

                    <div class="question">

                        <h3>

                            <?php

                            echo ($index + 1)
                                . ". "
                                . htmlspecialchars(
                                    $question['q']
                                );

                            ?>

                        </h3>


                        <?php

                        foreach (
                            $question['options']
                            as $option
                        ) {

                        ?>

                            <label class="option">

                                <input type="radio" name="q<?php
                                                            echo $index;
                                                            ?>" value="<?php
                                                                        echo htmlspecialchars(
                                                                            $option
                                                                        );
                                                                        ?>" required>

                                <span>

                                    <?php
                                    echo htmlspecialchars(
                                        $option
                                    );
                                    ?>

                                </span>

                            </label>

                        <?php

                        }

                        ?>

                    </div>

                <?php

                }

                ?>


                <button type="submit" class="quiz-submit">

                    🚀 Submit Quiz

                </button>


            </form>

        <?php

        }

        ?>

    </div>


</body>

</html>