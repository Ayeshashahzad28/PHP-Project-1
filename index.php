<?php
include "db_connection.php";

if(isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    $query= "INSERT INTO student_records(firstname, lastname, email, phone, gender, course)
    VALUES('$firstname', '$lastname' , '$email' ,'$phone', '$gender', '$course')";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT REGISTRATION FORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>STUDENT REGISTRATION FORM</h2>
    <form  method="POST">
        <!-- first name -->
        
        
        <div class="input-group">
        <input type="text" name="firstname"  required>
        <label>First Name:</label>
        </div>

        <!-- last name -->
         <div class="input-group">
        <input type="text" name="lastname"  required>
        <label>Last Name:</label>
        </div>

        <!-- email address -->
         <div class="input-group">
        <input type="email" name="email"  required>
        <label>Email Address:</label>
        </div>

        <!-- contact number -->
        <div class="input-group">
        <input type="tel" name="phone"  required>
        <label>Contact number:</label>
        </div>

        <br>
        <!-- gender -->
        <label>Gender:</label><br><br>
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other
        <br><br>

        <!-- course -->
        <label>Course Enrollment:</label><br>
        <select name="course">
            <option value="Web Development">Web Development</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="Shopify">Shopify</option>
            <option value="Amazon">Amazon</option>
            <option value="Artifical Intelligence">Artifical Intelligence</option>
            <option value="Digital Media Marketing">Digital Media Marketing</option>
        </select>
        <br><br>

        <!-- save -->
        <button name="save">Save</button>
        <button name="delete">delete</button>
        
    </form>
    
    <h2>STUDENT LIST</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Created_At</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM student_records");

        while($row = mysqli_fetch_assoc($result)) {
        ?>    
        <tr>
            <td data-label="ID"><?=$row['id']; ?></td>
            <td data-label="First Name"><?=$row['firstname']; ?></td>
            <td data-label="Last Name"><?=$row['lastname']; ?></td>
            <td data-label="Email"><?=$row['email']; ?></td>
            <td data-label="Phone"><?=$row['phone']; ?></td>
            <td data-label="Gender"><?=$row['gender']; ?></td>
            <td data-label="Course"> <?=$row['course']; ?></td>
            <td data-label="Created_At"><?=$row['created_at']; ?></td>
            <td data-label="Action">
                <a href="update.php?id=<?= $row['id']; ?>">EDIT</a>
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">DELETE</a>
            </td>
            <td>
                

            </td>
        </tr>
        <?php } ?>
    </table>
     
</body>
</html>