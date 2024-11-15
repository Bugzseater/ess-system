<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Sidebar with Bottom Buttons</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            color: #333;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .bottom-buttons {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f0f0f0;
        }

        .sidebar a {
            color: #555;
            text-decoration: none;
            padding: 0.875rem 1.25rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .sidebar a:hover {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .sidebar a:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .sidebar a.logout {
            background-color: #fee2e2;
            border-color: #fecaca;
            color: #dc2626;
        }

        .sidebar a.logout:hover {
            background-color: #dc2626;
            border-color: #dc2626;
            color: white;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }

        .sidebar a::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: 0.5s;
        }

        .sidebar a:hover::after {
            left: 100%;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                padding: 1rem;
            }
            
            .bottom-buttons {
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>ESS-UOK</h2>
        <div class="nav-links">
            <a href="../pages/dashboard.php">Dashboard</a>
            <a href="../pages/exco.php">Exco '24</a>
            <a href="../pages/events.php">Events</a>
            <a href="../pages/events.php">Members</a>
            <a href="../pages/events.php">Attendance</a>
            <a href="../pages/events.php">Finance</a>
        </div>
        <div class="bottom-buttons">
            <a href="settings.php">Settings</a>
            <a href="../index.html" class="logout">Logout</a>
        </div>
    </div>
</body>
</html>