<?php
$conn = new mysqli("localhost", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: linear-gradient(to right, #4facfe, #00f2fe);

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.2);
            width: 90%;
            max-width: 900px;
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #00b894;
            color: white;
        }

        tr:hover {
            background: #f2f2f2;
        }

        .btn {
            display: block;
            margin: 15px auto;
            text-align: center;
            padding: 10px;
            width: 200px;
            background: #00b894;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #019875;
        }
    </style>

</head>

<body>

<div class="container">

    <h2>📋 Student Records</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Address</th>
            <th>Email</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['year_level']."</td>
                    <td>".$row['address']."</td>
                    <td>".$row['email']."</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>

    <a href="StudentRegister.php" class="btn">Back to Form</a>

</div>

</body>
</html>
