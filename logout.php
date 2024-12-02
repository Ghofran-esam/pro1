<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <div class="container">
        <div class="title">Logging Out...</div>
        <div class="success" id="logoutMessage"></div>
    </div>

    <script>
        // Clear the user session data from localStorage
        localStorage.removeItem('username');
        localStorage.removeItem('userId');
        
        // Display logout message
        document.getElementById('logoutMessage').innerText = 'You have been logged out. Redirecting to home page...';
        
        // Redirect to home page after a short delay
        setTimeout(function() {
            window.location.href = 'index.html';
        }, 2000); // Redirect after 2 seconds
    </script>
</body>
</html>
