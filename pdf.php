<?php
// $im = new imagick('image/test.pdf[0]');
// $im->setImageFormat('jpg');
// header('Content-Type: image/jpeg');
// echo $im;
// $v = Imagick::getVersion();
// echo $v;
// echo 555;
$im = new Imagick();

$im->setResolution(300,300);
$im->readimage('image/test.pdf[0]');
$im->setImageFormat('jpeg');
$im->writeImage('image/thumb.jpg');
$im->clear();
$im->destroy();

// $location   = "/usr/local/bin/convert"; // Binaries Location
// $name       = "image/test.pdf"; //Source PDF File
// $nameto     = "myfile.jpg"; // Output File
// $convert    = $location . " " . $name . " ".$nameto; // Command creating
// exec ($convert); // Execution of complete command.
//
// echo "PDF converted to JPEG!!";
// echo exec ('convert -version');

?>
