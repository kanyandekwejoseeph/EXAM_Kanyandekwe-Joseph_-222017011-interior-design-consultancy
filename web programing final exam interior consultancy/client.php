<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Form</title>
</head>
<body bgcolor="darkgrey">
    <h1>clients Form</h1>
    <form method="post" action="client.php">

        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>

        <label for="name"> Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>
    </form>

    <a href="./homepage.html">Go Back to Home</a>

    <?php
    include('connection.php');

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        // Insert section
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];

        $is = $connection->prepare("INSERT INTO client (id, name, address) VALUES (?, ?, ?)");
        $is->bind_param("iss", $id, $name, $address);

        if ($is->execute()) {
            echo "New record has been added successfully.<br><br>
                 <a href='homepage.html'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $is->error;
        }

        $is->close();
    } 
    ?>

    <h2>Data for client Form</h2>
    <table border="1">
        <tr>
            <th>client ID</th>
            <th>client Name</th>
            <th>address</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        // SQL query to fetch data from the accounts table
        $sql = "SELECT * FROM client";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td><a style='padding:4px' href='delete_client.php?id=" . $row["id"] . "'>Delete</a></td>
                    <td><a style='padding:4px' href='update_client.php?id=" . $row["id"] . "'>Update</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        // Close connection
        $connection->close();
        ?>
    </table>

    <footer>
        <h2>UR CBE BIT &copy; 2024 &reg; Designed by: kanyandekwe</h2>
    </footer>
</body>
</html>
