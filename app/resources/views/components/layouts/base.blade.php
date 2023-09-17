<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for Accent Color -->
    <style>
        .header {
            background-color: #ffc107; /* Yellow background for the header */
            color: #333; /* Dark text color for the header */
        }
    </style>
</head>
<body>
<!-- Header Section -->
<header class="header py-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Your Laravel App</h1>
            </div>
            <div class="col text-right">
                <!-- Add navigation links or user profile here -->
            </div>
        </div>
    </div>
</header>

<!-- Main Content Section -->
<main class="container mt-5">
    <div class="row justify-content-center">
        {{ $slot }}
    </div>
</main>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
