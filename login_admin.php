
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | Admin</title>
    <link rel="stylesheet" href="assets/css/log.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="wrapper">
      <img src="images/logo.png" width="100%" alt="">
      <div class="title">Login(Admin)</div>
      <form role="form" method="post" id="dash"> 
        <div class="field">
            <input type="text" name="apartment" id="name"   required>
            <label>Admin</label>
        </div>
        <div class="field">
            <input type="password" name="password" id="pass" required>
            <label>Password</label>
        </div> 
         <div class="content cent">
        <div class="light">©All rights reserved</div>
        </div>
        <div class="field">
            <input type="submit" name="login_user" value="Login">
        </div>
        <div class="error"></div>
        <div id="error"></div>
    
            <div class="cent">
            <p id="loading_spinner"><img src="images/spain.gif"></p></div>
         <div class="signup-link">Go back home <a href="index.php">Claver Apartments</a></div>
        </div>
      </form>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="logs.js"></script>
  </body>
</html>
