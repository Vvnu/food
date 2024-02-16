<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop_db";

// create connection
$conn = new mysqli($servername, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete record from the 'order' table
    $delete_query = "DELETE FROM `order` WHERE id = $delete_id";
    $result = $conn->query($delete_query);

    if (!$result) {
        die("Delete failed: " . $conn->error);
    }
}

// Read all rows from the database table
$sql = "SELECT * FROM `order`";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid Query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body style="margin: 50px;">

    <h1>User's History</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <!-- Your table header -->
            <th>Id    </th>
            <th>Name  </th>
            <th>Number</th>
            <th>Email </th>
            <th>Method</th>
            <th>Flat</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Pin code</th>
            <th>Total product</th>
            <th>Total price</th>
            <th>Action </th>
            <th>latitude</th>
            <th>longitude</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Read data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["number"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["method"] . "</td>
                        <td>" . $row["flat"] . "</td>
                        <td>" . $row["street"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <td>" . $row["state"] . "</td>
                        <td>" . $row["country"] . "</td>
                        <td>" . $row["pin_code"] . "</td>
                        <td>" . $row["total_products"] . "</td>
                        <td>" . $row["total_price"] . "</td>
                        <td>
                            <a class ='btn btn-primary btn-sm' href='?delete_id=" . $row["id"] . "'> Delete </a>
                        </td>
                        <td>" . $row["latitude"] . "</td>
                        <td>" . $row["longitude"] . "</td>


                    </tr>";
            }
            ?>





        </tbody>
    </table>

</body>
</html>
<?php
// Close the database connection
$conn->close();
?>
