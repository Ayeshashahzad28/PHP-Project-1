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

<form  method="POST">
        <!-- first name -->
        <label>First Name:</label>
        <input type="text" name="firstname" placeholder="Name" required value="<?= $data['firstname']; ?>">

        <!-- last name -->
        <label>Last Name:</label>
        <input type="text" name="lastname" placeholder="Name" required value="<?= $data['lastname']; ?>">

        <!-- email address -->
        <label>Email Address:</label>
        <input type="email" name="email" placeholder="Email" required value="<?= $data['email']; ?>">

        <!-- contact number -->
        <label>Contact number:</label>
        <input type="tel" name="phone" placeholder="Contact number" required value="<?= $data['phone']; ?>">

        <!-- gender -->
        <label>Gender:</label>
        <input type="radio" name="gender" value="male" <?= ($data['gender'] == 'male') ? 'checked' : ''; ?>>Male
        <input type="radio" name="gender" value="Female" <?= ($data['gender'] == 'Female') ? 'checked' : ''; ?>>Female
        <input type="radio" name="gender" value="Other" <?= ($data['gender'] == 'Other') ? 'checked' : ''; ?>>Other

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