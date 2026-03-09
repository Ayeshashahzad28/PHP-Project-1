<?php
include "db_connection.php";

$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM  student_records WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    mysqli_query($conn,
    "UPDATE student_records
    SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone = '$phone', gender = '$gender', course = '$course' WHERE id=$id");

    header("location: index.php");
}
?>
<link rel="stylesheet" href="style.css">
<form  method="POST">

        <div class="input-group">
        <input type="text" name="firstname"  required value="<?= $data['firstname']; ?>">
        <label>First Name:</label>
        </div>

        <!-- last name -->
         <div class="input-group">
        <input type="text" name="lastname"  required value="<?= $data['lastname']; ?>">
        <label>Last Name:</label>
        </div>

        <!-- email address -->
         <div class="input-group">
        <input type="email" name="email"  required value="<?= $data['email']; ?>">
        <label>Email Address:</label>
        </div>

        <!-- contact number -->
        <div class="input-group">
        <input type="tel" name="phone"  required value="<?= $data['phone']; ?>">
        <label>Contact number:</label>
        </div>


        <!-- gender -->
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="male" <?= ($data['gender'] == 'male') ? 'checked' : ''; ?>>Male
        <input type="radio" name="gender" value="Female" <?= ($data['gender'] == 'Female') ? 'checked' : ''; ?>>Female
        <input type="radio" name="gender" value="Other" <?= ($data['gender'] == 'Other') ? 'checked' : ''; ?>>Other
        <br><br>

        <!-- course -->
        <label>Course Enrollment:</label>
        <select name="course">
            <option value="Web Development" <?= ($data['course'] == 'Web Development') ? 'selected' : ''; ?>>Web Development</option>
            <option value="Cyber Security" <?= ($data['course'] == 'Cyber Security') ? 'selected' : ''; ?> >Cyber Security</option>
            <option value="Shopify" <?= ($data['course'] == 'Shopify') ? 'selected' : ''; ?>>Shopify</option>
            <option value="Amazon" <?= ($data['course'] == 'Amazon') ? 'selected' : ''; ?>>Amazon</option>
            <option value="Artifical Intelligence" <?= ($data['course'] == 'Artifical Intelligence') ? 'selected' : ''; ?>>Artifical Intelligence</option>
            <option value="Digital Media Marketing" <?= ($data['course'] == 'Digital Media Marketing') ? 'selected' : ''; ?>>Digital Media Marketing</option>
        </select>

        <button name="update">Update</button>
        
     </form>