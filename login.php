<?php
session_start(); // Start the session

require_once ('config.php');

//Function for check the user if exist and if the password correct
function authenticateUser($username, $password)
{
  //connect to database
  $conn = connectDB();
  //get the user from the users table where the username = ( username from the screen)
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);

  //to execute the sql statment
  $stmt->execute();
  //Result is the record that we got from the database
  $result = $stmt->get_result();

  //if the user exist enter the if 
  if ($result->num_rows >0) {
    //fill the user attribute with result that we got from the database
    $user = $result->fetch_assoc();

    //check if password match if yes enter the if
    if ($password == $user['password']) {
      //store the username in the session
      $_SESSION['username'] = $user['username'];
      $_SESSION['userId']= $user['user_id'];
      return true;
    }
  }
  return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (authenticateUser($username, $password)) {
      header("Location: index.php");
      exit;
    } else {
      $error = "Invalid username or password";
    }
  } else {
    $error = "Please enter both username and password";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

::selection {
  background: #088178;
}
.container {
  background: #fff;
  max-width: 400px;
  width: 100%;
  padding: 10px 30px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
}

.container form .title {
  font-size: 30px;
  font-weight: 600;
  margin: 20px 0 10px 0;
  position: relative;
}
.container form .title:before {
    
  content: "";
  position: absolute;
  height: 4px;
  width: 28px;
  left: 0px;
  bottom: 2px;
  border-radius: 5px;
  background: linear-gradient(to right, #088178 0%, #088178 100%);
}
.container form .input-box {
  width: 100%;
  height: 50px;
  margin-top: 30px;
  position: relative;
}
.container form .input-box input {
  width: 100%;
  height: 100%;
  outline: none;
  font-size: 18px;
  border: none;
}
.container form .underline::before {
  content: "";
  position: absolute;
  height: 2px;
  width: 100%;
  background: #ccc;
  left: 0;
  bottom: 0;
}
.container form .underline::after {
  content: "";
  position: absolute;
  height: 2px;
  width: 100%;
  background: #088178;
  left: 0;
  bottom: 0;
  transform: scaleX(0);
  transform-origin: left;
  transition: all 0.3s ease;
}
.container form .input-box input:focus ~ .underline::after,
.container form .input-box input:valid ~ .underline::after {
  transform: scaleX(1);
  transform-origin: left;
}
.container form .button {
  margin: 40px 0 20px 0;
}
.container .input-box input[type="submit"] {
  background: rgb(49, 85, 83);
  font-size: 18px;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
}
.container .input-box input[type="submit"]:hover {
  background: linear-gradient(to left, #088178 0%, #088178 100%);
}


html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #088178, #2b726d);
}


.forgot{
    font-size: 13px;

    padding-top: 5px;
}
/* cyrillic-ext */
@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
    unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  }
  /* cyrillic */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
    unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
  }
  /* vietnamese */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
    unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
  }
  /* latin-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
    unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
  }
  /* latin */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }
  /* cyrillic-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
    unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  }
  /* cyrillic */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
    unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
  }
  /* vietnamese */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
    unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
  }
  /* latin-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
    unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
  }
  /* latin */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }
  /* cyrillic-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
    unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  }
  /* cyrillic */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
    unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
  }
  /* vietnamese */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
    unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
  }
  /* latin-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
    unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
  }
  /* latin */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }
  /* cyrillic-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
    unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  }
  /* cyrillic */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
    unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
  }
  /* vietnamese */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
    unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
  }
  /* latin-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
    unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
  }
  /* latin */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }
  /* cyrillic-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
    unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  }
  /* cyrillic */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
    unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
  }
  /* vietnamese */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
    unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
  }
  /* latin-ext */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
    unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
  }
  /* latin */
  @font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
  }


  /* Define styles for success message */
.success {
  color: green;
  font-weight: bold;
  margin-top: 10px;
}

/* Define styles for error message */
.error {
  color: red;
  font-weight: bold;
  margin-top: 10px;
}
  </style>
<body>
  <div class="container">
    <form action="" method="post">
      <div class="title">Login</div>
      <?php if (isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
      <?php } ?>
      <div class="input-box underline">
        <input name="username" type="text" placeholder="Enter Your Username" required />
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Enter Your Password" required />
        <div ="forgot"> <a href="#"> Forgot Password?</a></div>
        <div class="underline"></div>
      </div>class
      <div class="input-box button">
        <input type="submit" value="Log In" />
      </div>
      <div class="signup-link">Don't have an account? <a href="signup.php">Signup</a></div>
      <div class="signup-link"><a href="index.php">Back To Home Page </a></div>
    </form>
  </div>
</body>

</html>