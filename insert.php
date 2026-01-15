<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pets_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request using email as identifier
if (isset($_GET['delete_email'])) {
    $email = $conn->real_escape_string($_GET['delete_email']);
    $sql = "DELETE FROM pet_messages WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully.');</script>";
        header("Location: display_data.php");
        exit();
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

// Handle update request (update email)
if (isset($_POST['update_email'])) {
    $old_email = $conn->real_escape_string($_POST['old_email']);
    $new_email = $conn->real_escape_string($_POST['new_email']);
    $sql = "UPDATE pet_messages SET email = '$new_email' WHERE email = '$old_email'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully.');</script>";
        header("Location: display_data.php");
        exit();
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

// Select all data from the table
$sql = "SELECT name, email, messages FROM pet_messages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Messages</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .action-links a { margin-right: 10px; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Pet Messages</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $email = urlencode($row["email"]); // For passing in URL
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["messages"] . "</td>";
                    echo "<td class='action-links'>
                            <a href='update_form.php?email=$email'>Update Email</a> |
                            <a href='display_data.php?delete_email=$email' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>