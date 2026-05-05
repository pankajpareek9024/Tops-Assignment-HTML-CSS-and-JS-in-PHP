<?php
include 'db.php';

$query = "SELECT * FROM customer ORDER BY id DESC";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .valid {
            max-width: 90%;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="valid table-responsive">

    <h2 class="text-center mb-4">TechEdge Motors - Customers</h2>

    <table class="table table-striped table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Vehicle</th>
                <th>Complaint</th>
            </tr>
        </thead>

        <tbody>

        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['vehicle']; ?></td>
                <td><?php echo $row['complaint']; ?></td>
            </tr>

        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="6">No data found</td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-primary">Back to Form</a>
    </div>

</div>

</body>
</html>
