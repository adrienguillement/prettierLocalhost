

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
    <div class="visible" style="background-color:#ffffff;">
        <nav class="navbar navbar-light navbar-expand-md" style="background-color:#1c2541;color:#0b101b;">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="color:#f0f3bd;">Localhost</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only" style="color:#f0f3bd;">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" href="#" style="color:#f0f3bd;">
                            <?php echo ($projectCount > 0)? $projectCount : "No"; ?> Projects
                          </a>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    <ul class="list-group" style="background-color:#2ec4b6;">
      <?php
        if ($projectCount > 0) :
          $count = 0;
      ?>
      <?php foreach ($dirArray as $dir):?>

        <?php
        if($count % 2 == 0) : ?>
          <li class="list-group-item" style="background-color:rgb(83,93,103);color:#f0f3bd;">
        <?php else :?>
          <li class="list-group-item" style="background-color:#6b7999;">
        <?php endif; ?>
        <span style="color:#f0f3bd;"><a style="color:#f0f3bd;" href="<?php echo $dir ;?>">
          <?php
          echo $dir;
          $stat = stat($dir);
          ?>
          </a>
          <span class="float-right">
            <?php
            echo date('d/m/Y H:i:s', $stat['mtime']);
            ?>
          </span>
        </span></li>
      <?php
        $count++;
      endforeach;
      ?>
      <?php else: ?>
        <li class="list-group-item list-group-item-dark" style="background-color:rgb(83,93,103);"><span style="color:#f0f3bd;">Nothing here, start adding projects to your server.</span></li>
      <?php endif; ?>
    </ul>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
