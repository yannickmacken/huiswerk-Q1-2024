<html>
 <head>
  <title>Leakiweeks</title>

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
      <h3>Criminal lookup</h3>
      <form action="criminal-lookup.php" method="POST">
        <input type="hidden" name="base" value="https://en.wikipedia.org/wiki/" />
        Enter a name of a commonly known criminal: <input type="text" name="name" /> <input type="submit" value="Search" />
      </form>
      <!-- <h3>Result:</h3> -->
      <?php
        $list = ["al capone", "ted bundy", "charles manson", "jeffrey dahmer", "john wayne gacy", "jack the ripper", "the zodiac killer", "h.h. holmes", "the boston strangler", "pablo escobar", "bonnie parker and clyde barrow", "osama bin laden", "joseph kony", "whitey bulger", "jim jones", "david koresh", "ayman al-zawahiri", "andrei chikatilo", "lucky luciano", "john dillinger", "james 'whitey' bulger", "adolf eichmann", "carlos the jackal", "ramzi yousef", "timothy mcveigh", "ted kaczynski", "aileen wuornos", "gary ridgway", "dennis rader (btk)", "richard ramirez (night stalker)", "joaquin 'el chapo' guzman", "frank lucas", "griselda blanco", "amos yee", "josef fritzl", "elizabeth bathory", "ed gein", "tommy karate pitera", "bruce reynolds", "samuel little", "ma barker", "baby face nelson", "vincenzo peruggia", "adam worth", "frank abagnale", "d.b. cooper", "the unabomber", "charles sobhraj", "robert hansen", "ian brady and myra hindley", "rodney alcala", "richard kuklinski", "rose and fred west", "peter sutcliffe", "leonard lake and charles ng", "david berkowitz", "nannie doss", "belle gunness", "mary ann cotton", "joseph mengele", "anders breivik", "bernard madoff", "joseph stalin"];
        if (isset($_POST['name']) && in_array(strtolower($_POST['name']), $list)) {
            $url = $_POST['base'] . str_replace(' ', '_', $_POST['name']);
            if(substr($url, 0, 8) === 'https://' || substr($url, 0, 7) === 'http://') {
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
              $result = curl_exec($curl);
              echo $result;
            } else {
              echo "Could not find this criminal.";
            }
        } else {
          echo "Could not find this criminal.";
        }
      ?>
    </div>
</body>
</html>