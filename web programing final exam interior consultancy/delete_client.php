<?php
include('connection.php');

// Check if Product_Id is set
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    // Prepare and execute the DELETE statement
    $is = $connection->prepare("DELETE FROM client WHERE id=?");
    $is->bind_param("i", $id);
    if ($is->execute()) {
        header('Location:client.php');
    } else {
        echo "Error deleting data: " . $fp->error;
    }

    $is->close();
} else {
    echo "account_id is not set.";
}

$connection->close();
?>
