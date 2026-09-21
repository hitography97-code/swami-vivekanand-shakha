<?php

include "db.php";

$result = $conn->query(
    "SELECT * FROM students
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html lang="mr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Students</title>

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

            <a href="register.php">
                Registration
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
            👥 विद्यार्थी यादी
        </h1>


        <div class="table-wrapper">

            <table>

                <tr>

                    <th>ID</th>

                    <th>Student Name</th>

                    <th>Class</th>

                    <th>Division</th>

                    <th>Parent</th>

                    <th>Mobile</th>

                    <th>Batch</th>

                </tr>


                <?php

                while (
                    $row = $result->fetch_assoc()
                ) {

                ?>

                    <tr>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['student_id']
                            );
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
                            echo htmlspecialchars(
                                $row['class_name']
                            );
                            ?>
                        </td>


                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['division']
                            );
                            ?>
                        </td>


                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['parent_name']
                            );
                            ?>
                        </td>


                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['parent_mobile']
                            );
                            ?>
                        </td>


                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['batch']
                            );
                            ?>
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