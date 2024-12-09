<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="center">
      <div class="logo-container">
        <img src="assets/logosekolah.png" alt="logo sekolah" class="logo">
      </div>
      <h1>Register</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" required>
          <span></span>
          <label>Confirm Password</label>
        </div>
        <div class="pass">Already have an Account? <a href="login.php">Login</a></div>
        <input type="submit" value="Register">
        <div class="signup_link">
          By registering, you agree to our <a href="#">Terms and Conditions</a>.
        </div>
      </form>
    </div>
</body>
</html>
