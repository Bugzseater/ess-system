<!-- pages/dashboard.php -->
<?php
// Include the sidebar
include '../include/sidebar.php';

// Hardcoded data for the dashboard
$totalEvents = 15;        // Example total events
$totalMembers = 120;      // Example total members
$totalBalance = 4500.75;  // Example total account balance in USD
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
            background-color: #f9fafb;
            color: #374151;
        }

        .content {
            padding: 30px;
            flex-grow: 1;
            overflow: auto;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            flex: 1; /* Allows cards to grow equally */
            text-align: center;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin: 0 0 10px 0;
            font-weight: 600;
            color: #1f2937;
        }

        .card .value {
            font-size: 28px;
            font-weight: bold;
            color: #10b981;
        }

        .card .label {
            font-size: 14px;
            color: #6b7280;
        }

        .table-container {
            border-radius: 12px;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .table-container h2 {
            margin: 0 0 20px 0;
            font-weight: 600;
            color: #1f2937;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        thead th {
            background-color: #1f2937;
            color: #ffffff;
            padding: 12px 15px;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.2s ease-in-out;
        }

        tbody tr:hover {
            background-color: #f3f4f6;
        }

        tbody td {
            padding: 10px 15px;
            color: #374151;
        }

        tbody td:first-child {
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cards {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <div class="content">
        <h1 style="font-weight: 700; color: #1f2937;">Dashboard</h1>

        <!-- Cards Section -->
        <div class="cards">
            <div class="card">
                <h3>Total Events</h3>
                <p class="value"><?php echo $totalEvents; ?></p>
                <p class="label">Number of events in the system</p>
            </div>

            <div class="card">
                <h3>Total Members</h3>
                <p class="value"><?php echo $totalMembers; ?></p>
                <p class="label">Number of members in the system</p>
            </div>

            <div class="card">
                <h3>Total Account Balance</h3>
                <p class="value">Rs <?php echo number_format($totalBalance, 2); ?></p>
                <p class="label">Total account balance across all accounts</p>
            </div>
        </div>

        <!-- Events Table -->
        <div class="table-container">
            <h2>All Events</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event Name</th>
                        <th>Coordinator Name</th>
                        <th>Attendance Count</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hardcoded data rows for demonstration -->
                    <tr>
                        <td>2024-11-01</td>
                        <td>Tech Summit</td>
                        <td>Alice Smith</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>2024-11-05</td>
                        <td>Art Expo</td>
                        <td>Bob Johnson</td>
                        <td>150</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
