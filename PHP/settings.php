<?php  
  require "db_connection.php";
  require "check_logged_in.php";

  $READ = "SELECT * FROM user_table WHERE securitytoken='".$token."'";
  $result = mysqli_query($conn, $READ);
  
  $row = $result->fetch_assoc();
?>


<html>

<head>
  <title>Settings</title>
  <link rel="stylesheet" href="../CSS/settings.css">
</head>

<body>
  <!--Navigation Bar-->
  <ul class="dashboard">
    <li class="logo" style="display: inline">
      <a href="lobby.php">
        <img src="../IMG/4gewinnt_logo.png" style="max-height: 100%; width: auto">
      </a>
    </li>
    <li style="display: inline">
      <div class="dropdown" style="height: 100%; width: auto; float: right">
        <?php
					$sql = "SELECT picture_filepath FROM user_table WHERE securitytoken = '".$token."'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					echo "<img src='".$row["picture_filepath"]."' class='dropbtn' style='max-height: 100%; width: auto;'>";
				?>
        <div class="dropdown-content" style="right: 0">
          <a href="login.php" onclick="logout()">Logout</a>
        </div>
      </div>
    </li>
  </ul>

  <form action="../PHP/updatesettings.php" method="post">
    <div class="register-box">
      <h1>Settings</h1>
      
      <?php echo "<div class='textbox'>
        <input type='email' placeholder='Email' name='email' value='".$row['email']."' required readonly>
        </div>"
      ?>
      
      <?php echo  "<div class='textbox'>
        <input type='text' placeholder='Nickname' name='nickname' value=".$row['nickname']." required readonly>
      </div>"
      ?>

      <?php echo  "<div class='textbox'>
        <input type='text' placeholder='Firstname' name='fname' value='".$row['first_name']."'>
      </div>
      <div class='textbox'>
        <input type='text' placeholder='Name' name='name' value=".$row['name'].">
      </div>"
      ?>
      
      <?php echo  "<div class='textbox'>
        <input type='number' placeholder='Age' name='age' value=".$row['age']." min='18' max='100'>
      </div>"
      ?>

      <div>
        <label class="container">No information
          <input type="radio" checked="checked" name="radio" value="def">
          <span class="checkmark"></span>
        </label>
        <label class="container">Male
          <input type="radio" name="radio" value="male">
          <span class="checkmark"></span>
        </label>
        <label class="container">Female
          <input type="radio" name="radio" value="female">
          <span class="checkmark"></span>
        </label>
      </div>
      <input class="btn" type="submit" name="submit" value="Update">
  </form>
  <a href="../PHP/lobby.php">
    <input class="btn" type="button" name="" value="Back">
  </a>
  </div>
</body>

</html>
