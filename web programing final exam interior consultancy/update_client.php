<?php
// Connection details
include('connection.php');

// Check if account_id is set
if (isset($_REQUEST['id'])) {
    $accid = $_REQUEST['id'];

    // Use prepared statement
    $stmt = $connection->prepare("SELECT * FROM client WHERE id = ?");
    $stmt->bind_param("i", $accid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['id'];
        $c = $row['name'];
        $d = $row['address'];
    } else {
        echo "client not found.";
    }

    // Close statement
    $stmt->close();
}
?>

<html>
<body>
    <form method="POST">
        <label for="name">client Name:</label>
        <input type="text" name="name" value="<?php echo isset($c) ? htmlspecialchars($c, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <label for="address">address:</label>
        <input type="text" name="address" value="<?php echo isset($d) ? htmlspecialchars($d, ENT_QUOTES) : ''; ?>" required>
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
// Handle form submission
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES);

    // Use prepared statement for update
    $stmt = $connection->prepare("UPDATE client SET name = ?, address = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $address, $accid);
    
    if ($stmt->execute()) {
        // Redirect to accounts.php on successful update
        header('Location: client.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        // Handle error (e.g., display an error message)
        echo "Failed to update client. Please try again.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$connection->close();
?>
