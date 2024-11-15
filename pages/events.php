<!-- pages/events.php -->
<?php
// Include the sidebar
include '../include/sidebar.php';

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ess');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to add a new event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $coordinator_id = $_POST['coordinator'];
    $description = $_POST['description'];

    // Handle image upload
    $event_image = '';
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["event_image"]["name"]);
        if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)) {
            $event_image = basename($_FILES["event_image"]["name"]);
        }
    }

    // Insert event data into the `events` table
    $sql = "INSERT INTO events (event_name, event_date, coordinator_id, description, event_image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $event_name, $event_date, $coordinator_id, $description, $event_image);
    $stmt->execute();
    $stmt->close();

    // Refresh the page to show the new event
    echo "<script>window.location.href = window.location.href;</script>";
    exit;
}

// Fetch existing events
$events_result = $conn->query("SELECT events.*, exco.name AS coordinator_name FROM events LEFT JOIN exco ON events.coordinator_id = exco.id");

// Fetch Exco members for the coordinator dropdown
$exco_result = $conn->query("SELECT id, name FROM exco");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/events.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Events</h1>
            <button id="addEventButton">Add Event</button>
        </div>

        <div class="overlay" id="overlay"></div>

        <!-- Popup form for adding an event -->
        <div class="popup" id="popup">
            <button type="button" id="closePopupButton" class="close-button">×</button>
            <form id="eventForm" action="" method="post" enctype="multipart/form-data">
                <input type="text" name="event_name" placeholder="Event Name" required>
                <input type="date" name="event_date" required>
                <select name="coordinator" required>
                    <option value="">Select Coordinator</option>
                    <?php while ($exco = $exco_result->fetch_assoc()): ?>
                        <option value="<?php echo $exco['id']; ?>"><?php echo $exco['name']; ?></option>
                    <?php endwhile; ?>
                </select>
                <textarea name="description" placeholder="Event Description" rows="4" required></textarea>
                <input type="file" name="event_image" accept="image/*">
                <button type="submit" name="submit">Save Event</button>
            </form>
        </div>


        <!-- Event cards display -->
        <div class="cards">
            <?php while ($event = $events_result->fetch_assoc()): ?>
                <div class="card">
                    <img src="../uploads/<?php echo $event['event_image']; ?>" alt="Event Image">
                    <h3><?php echo $event['event_name']; ?></h3>
                    <p>Date: <?php echo $event['event_date']; ?></p>
                    <p>Coordinator: <?php echo $event['coordinator_name']; ?></p>
                    <p><?php echo $event['description']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
        const addEventButton = document.getElementById('addEventButton');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
        const closePopupButton = document.getElementById('closePopupButton');

        addEventButton.addEventListener('click', () => {
            popup.classList.add('active');
            overlay.classList.add('active');
        });

        overlay.addEventListener('click', () => {
            popup.classList.remove('active');
            overlay.classList.remove('active');
        });

        closePopupButton.addEventListener('click', () => {
            popup.classList.remove('active');
            overlay.classList.remove('active');
        });

    </script>
</body>
</html>
