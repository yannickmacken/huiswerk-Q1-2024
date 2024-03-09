<html>
 <head>
  <title>Secret information</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
      Menu: <a href="index.php">Breaking News</a> | <a href="criminal-lookup.php">Criminal lookup</a><BR>
      <h1>Leakiweeks</h1>
      <br>
    <?php 
      if (isset($_GET['action']))
      {
        if ($_GET['action'] === "delete")
        {
          $client_ip = $_SERVER['REMOTE_ADDR'];

          if($client_ip != '127.0.0.1') {
            echo "<br><br><br><br><br>";
            echo "<h1 style=\"color:red\">Action not permitted!</h1>";
            echo "<h2>Modifying and deleting articles is restricted to local users.</h2>";
            echo "<h2>Malicious attempts will be reported.</h2>";
            die();
          }
          else {
            echo "<h1 style=\"color:green\">Secret information</h1>";
            echo "cybergame{N0Th1nG_F3eL5_L1k3_127.0.0.1}";
          }
        }
      }
      else {
        echo '<h3>Criminal Record Deletion</h3>';
        echo '<p>Many of our fellow criminals advocated for the opportunity to remove criminal records from databases, granting people a fresh start. Recently, a method for supposedly deleting eligible criminal records has been revealed. <br />
        <b>Do not share the existence of this article with any authorities. We want this article to not be banned and removed!! Keeping this article online will help our fellow criminals to clean their records.</b> <br />
        Here is a step-by-step guide on how this process might work:</p>

<ol>
  <li>First, a person must determine if their criminal record is eligible for deletion according to established criteria, which may include the nature of the crime, time elapsed since the offense, and successful completion of any imposed sentence or rehabilitation program.</li>
  <li>Next, the individual must submit an application for expungement or record sealing, depending on the jurisdiction. This application usually requires documentation, such as proof of rehabilitation or evidence of good behavior.</li>
  <li>Once the application is submitted, it undergoes a thorough review by a designated authority. This may involve evaluating the applicants current situation, character references, and overall impact on society if the record is removed.</li>
  <li>If the application is approved, the relevant authorities will then proceed to delete or seal the criminal record from public databases. In some cases, this may involve notifying various agencies to ensure the information is consistently updated.</li>
  <li>Finally, with the criminal record successfully deleted or sealed, the individual is granted a fresh start, free from the burden of a criminal past, and can reintegrate into society more easily.</li>
  </ol>
  <p>Please note that this is a general outline and the specific process may vary depending on jurisdiction and individual circumstances.</p>';
        echo '<a href="/leakiweeks.php?action=delete">Delete this article</a>';
      }    
    ?>
    </div>
</body>
</html>
