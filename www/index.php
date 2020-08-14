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
        <form action="index.php" method="POST">
          <fieldset>
            <li>
              Full Name: <input type="text" name="full_name">
            </li>
            <li>
              Location: <input type="text" name="location">
            </li>
            <li>
              Date Posted: <input style="font-size: 1rem" type="text" name="date_posted">
            </li>
            <li>
              Job Title: <input type="text" name="job_title">
            </li>
            <li>
              Job Description
              <br><textarea cols="42" rows="5" name="description"></textarea>
            </li>
            <button type="submit" class="button">POST JOB</button>
           </fieldset>
         </form>
      </div>
    </div>
 
    <div class="thankyou">
      Thank you for using our service!
    </div>
    <?php
      if(isset($_POST['submit'])){
      ini_set('display_errors',true);
      error_reporting(E_ALL);
      $db_host = '192.168.2.2';
      $db_name = 'joblisting20';
      $db_user = 'dbuser';
      $db_passwd = 'joblisting20';
      $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
      try{
      $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sqlquery = "INSERT INTO JOB_LISTING (full_name, location, date_posted, job_title, description)
      VALUES ('".$_POST["full_name"]."','".$_POST["location"]."','".$_POST["date_posted"]."',('".$_POST["job_title"]."',(".$_POST["description"]."')";
        if($pdo->query($sqlquery)){
        echo "table has been updated";  
        }
      }catch(PDOException $error){
        echo "Connection error occurred: " . $error->getMessage(); 
      }
    }

    ?>
  </body>
</html>
