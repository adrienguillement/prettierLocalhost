<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>localhost</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<?php

$rootDir = opendir("."); // open current directory
$dirArray = [];

// get each entry
while($element = readdir($rootDir)) {
  // exclude files and hidden folders
  if (is_dir($element) && (substr($element, 0, 1) != ".")) {
    $dirArray[] = $element;
  }
}

closedir($rootDir);                         // close directory
$projectCount = count($dirArray) ;          // count elements in array
if ($projectCount > 0) { sort($dirArray); } // sort 'em
?>

<body style="background-color:#282f3f;">
    <div class="visible">
        <nav class="navbar navbar-color navbar-expand-md">
            <div class="container-fluid text-navbar-color">
              <h1>Localhost</h1>
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only" style="color:#f0f3bd;">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="margin-left: 5%;">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation">
                          <?php echo ($projectCount > 0)? $projectCount : "No"; ?> Projects
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    <hr>
    <br>
    <?php
      if ($projectCount > 0) :
        $count = 0;
    ?>
    <div class="list-group">
      <?php foreach ($dirArray as $dir){?>
        <ahref="<?php echo $dir ;?>">
        <?php
        // Check to change the color one line in two
        if($count % 2 == 0){ ?>
          <a href="<?php echo $dir ;?>" class="list-group-item list-group-item-action active">
            <span>
              <?php
                echo $dir;
                $stat = stat($dir);
              ?>

              <span class="float-right">
                <?php
                  echo date('d/m/Y H:i:s', $stat['mtime']);
                ?>
              </span>
            </span>
           </a>
        <?php } else { ?>
          <a href="<?php echo $dir ;?>" class="list-group-item list-group-item-action">
            <span>
              <?php
                echo $dir;
                $stat = stat($dir);
              ?>

              <span class="float-right">
              <?php
                echo date('d/m/Y H:i:s', $stat['mtime']);
              ?>
              </span>
            </span>
          </a>
    <?php
        }
      $count++;
      }
    ?>
  <?php else: ?>
    <li class="list-group-item list-group-item-dark" style="background-color:rgb(83,93,103);"><span style="color:#f0f3bd;">Nothing here, start adding projects to your server.</span></li>
  <?php endif; ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
