<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <title>Job Listing Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
      <div class="title"> Job Listing Form </div>
      <div class="sub-title">Submit your job advertisments here to get
        posted on the job noticeboard! </div>
    </div>
    <div class="content">
      <h3>Enter your job advertisment details here:</h3>
      <div class="listing-form">
        <li>
          Full Name: <input type="text">
        </li>
        <li>
          Location: <input type="text">
        </li>
        <li>
          Date Posted: <input style="font-size: 1rem" type="date">
        </li>
        <li>
          Job Title: <input type="text">
        </li>
        <li>
          Job Description
          <br><textarea cols="42" rows="5"></textarea>
        </li>
      </div>
      <button class="button">POST JOB</button>
    </div>

    <?php
       if(isset($_POST['submit'])){
       ini_set('display_errors',true);
       error_reporting(E_ALL);
       $db_host = '192.168.2.2';
       $db_name = 'assignment1'
       $db_user = 'webuser';
       $db_passwd = 'password'
       $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
       try{
       $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sqlquery = "INSERT INTO 
       }
       
       }

    ?>

    
    <div class="thankyou">
      Thank you for using our service!
    </div>
  </body>
</html>
