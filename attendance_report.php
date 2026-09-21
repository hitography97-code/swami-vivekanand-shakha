<?php

include "db.php";


$result = $conn->query("

SELECT

s.student_id,

s.full_name,

s.class_name,

COUNT(a.id) AS total_days,

SUM(
    CASE
    WHEN a.status='Present'
    THEN 1
    ELSE 0
    END
) AS present_days,

SUM(
    CASE
    WHEN a.status='Absent'
    THEN 1
    ELSE 0
    END
) AS absent_days,

SUM(
    CASE
    WHEN a.status='Leave'
    THEN 1
    ELSE 0
    END
) AS leave_days

FROM students s

LEFT JOIN attendance a
ON s.id = a.student_id

GROUP BY
s.id,
s.student_id,
s.full_name,
s.class_name

ORDER BY
s.full_name

");

?>

<!DOCTYPE html>

<html lang="mr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Attendance Report</title>

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

            <a href="attendance.php">
                Attendance
            </a>

            <a href="study.php">
                Study
            </a>

        </nav>

    </header>


    <div class="container">

        <h1>
            📊 Attendance Report
        </h1>


        <div class="table-wrapper">

            <table>

                <tr>

                    <th>Student ID</th>

                    <th>Name</th>

                    <th>Class</th>

                    <th>Total</th>

                    <th>Present</th>

                    <th>Absent</th>

                    <th>Leave</th>

                    <th>Attendance %</th>

                </tr>


                <?php

                while (
                    $row =
                    $result->fetch_assoc()
                ) {


                    $total =
                        (int)$row['total_days'];


                    $present =
                        (int)$row['present_days'];


                    $percentage = 0;


                    if ($total > 0) {

                        $percentage =
                            ($present / $total) * 100;
                    }

                ?>

                    <tr>

                        <td>
                            <?php
                            echo $row['student_id'];
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['full_name']
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $row['class_name'];
                            ?>
                        </td>

                        <td>
                            <?php echo $total; ?>
                        </td>

                        <td>
                            <?php echo $present; ?>
                        </td>

                        <td>
                            <?php
                            echo $row['absent_days'];
                            ?>
                        </td>

                        <td>
                            <?php
                            echo $row['leave_days'];
                            ?>
                        </td>

                        <td>

                            <strong>

                                <?php

                                echo number_format(
                                    $percentage,
                                    2
                                );

                                ?>%

                            </strong>

                        </td>

                    </tr>

                <?php

                }

                ?>

            </table>

        </div>

    </div>

</body>

</html>