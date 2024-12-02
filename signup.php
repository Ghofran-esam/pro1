<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
</head>
<body>
  <div class="container">
    <form id="signupForm">
      <div class="title">SignUp</div>
      <div class="error" id="signupError"></div>
      <div class="input-box underline">
        <input type="email" name="email" placeholder="Email Address" required />
        <div class="underline"></div>
      </div>
      <div class="input-box underline">
        <input type="text" name="username" placeholder="Username" required />
        <div class="underline"></div>
      </div>
      <div class="input-box underline">
        <input type="text" name="mobile" placeholder="Mobile" required />
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required />
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <div class="underline"></div>
      </div>
      <div class="input-box button">
        <input type="submit" value="Sign Up" />
      </div>
      <div class="signup-link">Already have an account? <a href="login.html">Login</a></div>
      <div class="signup-link"><a href="index.html">Back To Home Page</a></div>
    </form>
  </div>

  <script>
    document.getElementById('signupForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let email = e.target.email.value;
      let username = e.target.username.value;
      let mobile = e.target.mobile.value;
      let password = e.target.password.value;
      let confirmPassword = e.target.confirm_password.value;

      if (password !== confirmPassword) {
        document.getElementById('signupError').innerText = 'Passwords do not match.';
        return;
      }

      let storedUsers = JSON.parse(localStorage.getItem('users')) || [];
      let existingUser = storedUsers.find(user => user.email === email || user.username === username);

      if (existingUser) {
        document.getElementById('signupError').innerText = 'This email or username is already registered.';
        return;
      }

      storedUsers.push({ email, username, mobile, password });
      localStorage.setItem('users', JSON.stringify(storedUsers));
      alert('Sign Up Done successfully!');
      window.location.href = 'login.html';
    });
  </script>
</body>
</html>
