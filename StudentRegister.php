<?php
$conn = new mysqli("localhost", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['save'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students 
    (first_name, middle_name, last_name, course, year_level, address, email)
    VALUES 
    ('$fname','$mname','$lname','$course','$year','$address','$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('✅ Saved successfully!');
            window.location.href='StudentRegister.php';
        </script>";
    } else {
        echo "<script>alert('❌ Error: ".$conn->error."');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            margin: 0;

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            width: 400px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #00b894;
            color: white;
            border: none;
            border-radius: 6px;
            margin-top: 10px;
            cursor: pointer;
        }

        button:hover {
            background: #019875;
        }

        .view-btn {
            display: block;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background: #0984e3;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .view-btn:hover {
            background: #066ec0;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>🎓 Student Registration</h2>

    <form method="POST">

        <input type="text" name="fname" placeholder="First Name" required>
        <input type="text" name="mname" placeholder="Middle Name" required>
        <input type="text" name="lname" placeholder="Last Name" required>

        <input type="text" name="course" placeholder="Course" required>
        <input type="number" name="year" placeholder="Year Level" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="email" name="email" placeholder="Email" required>

        <button type="submit" name="save">Save</button>

        <a href="StudentView.php" class="view-btn">
            📋 View Records
        </a>

    </form>

</div>

</body>
</html>