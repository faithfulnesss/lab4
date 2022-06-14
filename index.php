<?php

include 'database.php';

error_reporting(0);

session_start();

//if (isset($_SESSION['username'])) {
//    header("Location: index.php");
//}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE user_name='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (user_name, password)
					VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }

    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

//if (isset($_POST['submit'])) {
//    $username = $_POST['username'];
//    $password = ($_POST['password']);
//
//    $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
//    $result = mysqli_query($conn, $sql);
//    if ($result->num_rows > 0) {
//        $row = mysqli_fetch_assoc($result);
//        $_SESSION['username'] = $row['user_name'];
//        header("Location: welcome.php");
//    } else {
//        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
//    }
//}

?>


<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">

  <title>Typing Test</title>

  <link rel="stylesheet" href="style.css">

  <script src="https://kit.fontawesome.com/2c9f15701e.js" crossorigin="anonymous"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="app">
    <div class="container">

      <div class="header">
        <div class="logo">
          <div id="icon_with_text">
            <img class="icon" src="svg_icon.svg">
            </img>
            <div class="text"><span>
                Typing Test
              </span>
            </div>
          </div>
          <div class="menu">
            <div class="menu_button kb_button">
              <i class="fa-solid fa-keyboard"></i>
            </div>
            <div class="menu_button settings_button">
              <i class="fa-solid fa-user"></i>
            </div>
            <div class="menu_button leaderboard_button">
              <i class="fa-solid fa-trophy"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="settings_container" style="display: none;">
        <div class="forms">
          <div class="form login">
            <span class="title">Login</span>

            <form action="" method="POST">
              <div class="input-field">
                <input type="text" placeholder="Enter your username" value="<?php echo $username?>" required>
                <i class="uil uil-envelope icon"></i>
              </div>
              <div class="input-field">
                <input type="password" class="password" placeholder="Enter your password" value="<?php echo $_POST['password'] ?>" required>
                <i class="uil uil-lock icon"></i>
                <i class="fa-solid fa-eye showHidePw"></i>
              </div>

              <div class="input-field button">
                <input type="submit" value="Login Now" name="login">
              </div>
            </form>

            <div class="login-signup">
              <span class="text">Not a member?
                <a href="#" class="text signup-link">Signup now</a>
              </span>
            </div>
          </div>

          <div class="form signup">
            <span class="title">Registration</span>

            <form action="" method="POST">
              <div class="input-field">
                <input type="text" placeholder="Enter your username" name="username" value="<?php echo $username; ?>" required>
                <i class="uil uil-envelope icon"></i>
              </div>
              <div class="input-field">
                <input type="password" class="password" placeholder="Create a password" name="password"  value="<?php echo $_POST['password']; ?>" required>
                <i class="uil uil-lock icon"></i>
              </div>
              <div class="input-field">
                <input type="password" class="password" placeholder="Confirm a password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                <i class="uil uil-lock icon"></i>
                <i class="fa-solid fa-eye showHidePw"></i>
              </div>

              <div class="input-field button">
                <input type="submit" value="Register Now" name="submit">
              </div>
            </form>

            <div class="login-signup">
              <span class="text">Not a member?
                <a href="#" class="text login-link">Signup now</a>
              </span>
            </div>
          </div>
        </div>
      </div>



      <div class="wrapper">
        <input type="text" class="input-field">
        <div class="content-box">
          <div class="typing-text">
            <p></p>
          </div>
          <div class="content">
            <ul class="result-details">
              <li class="time">
                <p>Time Left:</p>
                <span><b>30</b></span>
              </li>
              <li class="mistakes">
                <p>Mistakes:</p>
                <span>0</span>
              </li>
              <li class="wpm">
                <p>WPM:</p>
                <span>0</span>
              </li>
              <li class="cpm">
                <p>Missed:</p>
                <span>0</span>
              </li>
            </ul>
            <button>Try Again</button>
          </div>
        </div>
        <div class="keymap">
          <div class="row r1">
            <div></div>
            <div class="keymap-key q">q</div>
            <div class="keymap-key w">w</div>
            <div class="keymap-key e">e</div>
            <div class="keymap-key r">r</div>
            <div class="keymap-key t">t</div>
            <div class="keymap-key y">y</div>
            <div class="keymap-key u">u</div>
            <div class="keymap-key i">i</div>
            <div class="keymap-key o">o</div>
            <div class="keymap-key p">p</div>
            <div class="keymap-key left_bracket">[</div>
            <div class="keymap-key right_bracket">]</div>

          </div>
          <div class="row r2">
            <div></div>
            <div class="keymap-key a">a</div>
            <div class="keymap-key s">s</div>
            <div class="keymap-key d">d</div>
            <div class="keymap-key f">f</div>
            <div class="keymap-key g">g</div>
            <div class="keymap-key h">h</div>
            <div class="keymap-key j">j</div>
            <div class="keymap-key k">k</div>
            <div class="keymap-key l">l</div>
            <div class="keymap-key semicolon">;</div>
            <div class="keymap-key apostrophe">'</div>
          </div>
          <div class="row r3">
            <div></div>
            <div></div>
            <div class="keymap-key z">z</div>
            <div class="keymap-key x">x</div>
            <div class="keymap-key c">c</div>
            <div class="keymap-key v">v</div>
            <div class="keymap-key b">b</div>
            <div class="keymap-key n">n</div>
            <div class="keymap-key m">m</div>
            <div class="keymap-key comma">,</div>
            <div class="keymap-key dot">.</div>
            <div class="keymap-key slash">/</div>
          </div>
          <div class="row r4">
            <div></div>
            <div class="keymap-key space"></div>
          </div>
        </div>
      </div>
      <div class="footer">
        <div class="footer_text">
          Press <span class="esc">esc</span> to restart the test.
        </div>
        <div class="links">
          <div class="link">Contact</div>
          <div class="link">Github</div>
          <div class="link">Donate</div>
        </div>
      </div>
    </div>



  </div>

  <script src="js/paragraphs.js"></script>
  <script src="js/script.js"></script>
  <script src="js/form.js"></script>

</body>

</html>