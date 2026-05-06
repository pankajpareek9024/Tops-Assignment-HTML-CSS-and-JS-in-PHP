<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'classes/Ticket.php';

// Handle form submit
if(isset($_POST['create_ticket'])){

    $title = $_POST['title'];
    $assigned = $_POST['assigned'];
    $status = $_POST['status'];

    // Read existing JSON
    $file = "data/tickets.json";
    $tickets = json_decode(file_get_contents($file), true);

    // New ID
    $id = count($tickets) + 1;

    // Create object
    $ticket = new Ticket($id, $title, $status, $assigned, date("Y-m-d"));

    // Convert object to array
    $tickets[] = (array)$ticket;

    // Save back to JSON
    file_put_contents($file, json_encode($tickets, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Hello, <?php echo $_SESSION['user']; ?></h2>

        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>

        <form method="POST" class="mt-4">

            <input type="text" name="title" class="form-control mb-2" placeholder="Ticket Title" required>

            <input type="text" name="assigned" class="form-control mb-2" placeholder="Assign To" required>

            <select name="status" class="form-control mb-2">
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
            </select>

            <button type="submit" name="create_ticket" class="btn btn-success">Create Ticket</button>

        </form>


        <div class="mt-4">
            <button onclick="loadTickets('Open')" class="btn btn-primary">Open Tickets</button>
            <button onclick="loadTickets('Closed')" class="btn btn-secondary">Closed Tickets</button>
        </div>


        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Assigned</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="ticketBody">
                <tr>
                    <td colspan="5">Click button to load tickets</td>
                </tr>
            </tbody>
        </table>
    </div>


    <script src="js/script.js"></script>
</body>

</html>