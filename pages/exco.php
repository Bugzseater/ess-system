<?php
// Include the sidebar
include '../include/sidebar.php';

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ess');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $student_no = $_POST['student_no'];

    // Handle file upload
    $profile_image = '';
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            $profile_image = basename($_FILES["profile_image"]["name"]);
        }
    }

    // Insert data into the `exco` table
    $sql = "INSERT INTO exco (name, position, student_no, profile_image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $position, $student_no, $profile_image);
    $stmt->execute();
    $stmt->close();

    // Refresh page to show the new entry
    echo "<script>window.location.href = window.location.href;</script>";
    exit;
}

// Fetch existing members
$result = $conn->query("SELECT * FROM exco");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exco Members</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/exco.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Exco Members</h1>
            <button id="addButton">Add</button>
        </div>

        <div class="overlay" id="overlay"></div>

        <div class="popup" id="popup">
            <form id="memberForm" action="" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Member Name" required>
                <input type="text" name="position" placeholder="Position" required>
                <input type="text" name="student_no" placeholder="Student No" required>
                <input type="file" name="profile_image" accept="image/*">
                <button type="submit" name="submit">Save</button>
            </form>
        </div>

        <div class="cards">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <img src="../uploads/<?php echo $row['profile_image']; ?>" alt="Profile Photo">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Position: <?php echo $row['position']; ?></p>
                    <p>Student No: <?php echo $row['student_no']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
        const addButton = document.getElementById('addButton');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');

        addButton.addEventListener('click', () => {
            popup.classList.add('active');
            overlay.classList.add('active');
        });

        overlay.addEventListener('click', () => {
            popup.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>
