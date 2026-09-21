<?php

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id =
        "SVS" . rand(10000, 99999);

    $full_name =
        trim($_POST['full_name']);

    $dob =
        $_POST['dob'];

    $gender =
        $_POST['gender'];

    $parent_name =
        trim($_POST['parent_name']);

    $parent_mobile =
        trim($_POST['parent_mobile']);

    $mobile =
        trim($_POST['mobile']);

    $address =
        trim($_POST['address']);

    $school_name =
        trim($_POST['school_name']);

    $class_name =
        $_POST['class_name'];

    $division =
        trim($_POST['division']);

    $batch =
        $_POST['batch'];

    $joining_date =
        $_POST['joining_date'];

    $hobbies =
        trim($_POST['hobbies']);

    $skills =
        trim($_POST['skills']);


    $sql = "INSERT INTO students
    (
        student_id,
        full_name,
        dob,
        gender,
        parent_name,
        parent_mobile,
        mobile,
        address,
        school_name,
        class_name,
        division,
        batch,
        joining_date,
        hobbies,
        skills
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt =
        $conn->prepare($sql);


    $stmt->bind_param(
        "sssssssssssssss",
        $student_id,
        $full_name,
        $dob,
        $gender,
        $parent_name,
        $parent_mobile,
        $mobile,
        $address,
        $school_name,
        $class_name,
        $division,
        $batch,
        $joining_date,
        $hobbies,
        $skills
    );


    if ($stmt->execute()) {

        $message =
            "Registration Successful! Your Student ID is "
            . $student_id;
    } else {

        $message =
            "Registration Failed: "
            . $conn->error;
    }
}

?>

<!DOCTYPE html>

<html lang="mr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>

        <h2>स्वामी विवेकानंद शाखा</h2>

        <nav>

            <a href="index.php">Home</a>

            <a href="register.php">
                Registration
            </a>

            <a href="students.php">
                Students
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
            विद्यार्थी नोंदणी फॉर्म
        </h1>


        <?php

        if ($message != "") {

        ?>

            <div class="success">

                <?php

                echo htmlspecialchars($message);

                ?>

            </div>

        <?php

        }

        ?>


        <form method="POST">


            <h3>
                👨‍🎓 Personal Information
            </h3>


            <label>
                विद्यार्थ्याचे पूर्ण नाव
            </label>

            <input type="text" name="full_name" required>


            <label>
                जन्मतारीख
            </label>

            <input type="date" name="dob" required>


            <label>
                Gender
            </label>

            <select name="gender" required>

                <option value="">
                    Select Gender
                </option>

                <option>
                    Male
                </option>

                <option>
                    Female
                </option>

                <option>
                    Other
                </option>

            </select>


            <h3>
                👨‍👩‍👦 Parent Information
            </h3>


            <label>
                पालकांचे नाव
            </label>

            <input type="text" name="parent_name" required>


            <label>
                पालकांचा Mobile Number
            </label>

            <input type="tel" name="parent_mobile" required>


            <label>
                Student Mobile Number
            </label>

            <input type="tel" name="mobile">


            <label>
                Address
            </label>

            <textarea name="address" required></textarea>


            <h3>
                🎓 Education Information
            </h3>


            <label>
                School / College
            </label>

            <input type="text" name="school_name">


            <label>
                Class
            </label>

            <select name="class_name">

                <option>4th</option>
                <option>5th</option>
                <option>6th</option>
                <option>7th</option>
                <option>8th</option>
                <option>9th</option>
                <option>10th</option>
                <option>11th</option>
                <option>12th</option>
                <option>College</option>

            </select>


            <label>
                Division
            </label>

            <input type="text" name="division" placeholder="A / B / C">


            <label>
                Batch
            </label>

            <select name="batch">

                <option>
                    Morning
                </option>

                <option>
                    Evening
                </option>

                <option>
                    Regular
                </option>

            </select>


            <label>
                Joining Date
            </label>

            <input type="date" name="joining_date" required>


            <h3>
                ⭐ Additional Information
            </h3>


            <label>
                Hobbies
            </label>

            <input type="text" name="hobbies" placeholder="Cricket, Reading, Music...">


            <label>
                Skills
            </label>

            <input type="text" name="skills" placeholder="Computer, Drawing, Leadership...">


            <button type="submit">

                नोंदणी करा

            </button>


        </form>

    </div>

</body>

</html>