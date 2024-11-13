document.getElementById('loginButton').addEventListener('click', function() {
    // Get the values of username and password
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Check if username is 'admin' and password is 'admin123'
    if (username === 'admin' && password === 'admin123') {
        // Navigate to home.html
        window.location.href = './pages/dashboard.php';
    } else {
        // Show an error message
        alert('Incorrect username or password. Please try again.');
    }
});
