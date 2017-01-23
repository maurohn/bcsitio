<?php
  if($_GET['user'] && $_GET['pass']) {
    $USER = $_GET['user'];
    $PASS = $_GET['pass'];
    $LOCAL_ROOT         = "/var/www/html/";
    //$LOCAL_REPO_NAME    = "REPO_NAME";
    //$LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";
    $AUTH               = "{$USER}:{$PASS}";
    $REMOTE_REPO        = "https://{$AUTH}@bitbucket.org/beatcoding/bc-site.git";
    $BRANCH             = "master";
    
    // If there is already a repo, just run a git pull to grab the latest changes
    shell_exec("cd {$LOCAL_REPO} && git pull {$REMOTE_REPO} {$BRANCH}");
    die("Update done in " . mktime() ."ms");
  }else {
    echo "User or Pass Incorrect!";
  }
?>

<html>
  <head>
    <title>Update Bitbucket</title>
  </head>
  
  <body>
    <form action="update.php" method = "get">
      <label for="username">Username</label> <input type="text" id="user" name="user"><br /><br />
      <label for="password">Password:</label> <input type="password" id="pass" name="pass"><br /><br />
      <button type = "submit">Send!</button>
    </form>
  </body>
</html>
