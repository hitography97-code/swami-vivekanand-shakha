<?php

include "db.php";

$date = isset($_GET['date'])
    ? $_GET['date']
    : date("Y-m-d");

$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $date =
        $_POST['attendance_date'];


    if (
        isset($_POST['status'])
    ) {

        foreach (
            $_POST['status']
            as $student_id => $status
        ) {


            $check =
                $conn->prepare(
                    "SELECT id
                 FROM attendance
                 WHERE student_id=?
                 AND attendance_date=?"
                );


            $check->bind_param(
                "is",
                $student_id,
                $date
            );


            $check->execute();


            $result =
                $check->get_result();


            if (
                $result->num_rows > 0
            ) {


                $update =
                    $conn->prepare(
                        "UPDATE attendance
                     SET status=?
                     WHERE student_id=?
                     AND attendance_date=?"
                    );


                $update->bind_param(
                    "sis",
                    $status,
                    $student_id,
                    $date
                );


                $update->execute();
            } else {


                $insert =
                    $conn->prepare(
                        "INSERT INTO attendance
                    (
                        student_id,
                        attendance_date,
                        status
                    )
                    VALUES (?, ?, ?)"
                    );


                $insert->bind_param(
                    "iss",
                    $student_id,
                    $date,
                    $status
                );


                $insert->execute();
            }
        }
    }


    $message =
        "Attendance saved successfully!";
}


$students =
    $conn->query(
        "SELECT * FROM students
     ORDER BY class_name, full_name"
    );

?>

<!DOCTYPE html>

<html lang="mr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Attendance</title>

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

            <a href="students.php">
                Students
            </a>

            <a href="attendance_report.php">
                Reports
            </a>

        </nav>

    </header>


    <div class="container">

        <h1>
            ✅ विद्यार्थी उपस्थिती / प्रेजेंटी
        </h1>


        <?php

        if ($message != "") {

        ?>

            <div class="success">

                <?php echo $message; ?>

            </div>

        <?php

        }

        ?>


        <form method="POST">


            <label>
                Attendance Date
            </label>

            <input type="date" name="attendance_date" value="<?php echo $date; ?>" required>


            <div class="table-wrapper">

                <table>

                    <tr>

                        <th>Student ID</th>

                        <th>Student Name</th>

                        <th>Class</th>

                        <th>Present</th>

                        <th>Absent</th>

                        <th>Leave</th>

                    </tr>


                    <?php

                    while (
                        $student =
                        $students->fetch_assoc()
                    ) {

                    ?>

                        <tr>

                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $student['student_id']
                                );

                                ?>

                            </td>


                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $student['full_name']
                                );

                                ?>

                            </td>


                            <td>

                                <?php

                                echo htmlspecialchars(
                                    $student['class_name']
                                );

                                ?>

                            </td>


                            <td>

                                <input type="radio" name="status[
<?php echo $student['id']; ?>
]" value="Present" checked>

                            </td>


                            <td>

                                <input type="radio" name="status[
<?php echo $student['id']; ?>
]" value="Absent">

                            </td>


                            <td>

                                <input type="radio" name="status[
<?php echo $student['id']; ?>
]" value="Leave">

                            </td>

                        </tr>

                    <?php

                    }

                    ?>

                </table>

            </div>


            <button type="submit">

                Save Attendance

            </button>


        </form>

    </div>

</body>

</html>