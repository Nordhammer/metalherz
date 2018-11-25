<?php
$path = pathinfo(realpath('blog.zip'),PATHINFO_DIRNAME);
$zip = new ZipArchive;
$res = $zip->open('blog.zip');
if ($res === TRUE) {
  $zip->extractTo($path);
  $zip->close();
  echo "Perfect! :)";
} else {
  echo "Failed! :(";
}
?>