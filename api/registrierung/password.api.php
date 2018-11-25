<?php
$passwort = '';
if (isset($_GET['q'])) {
  $passwort = $_GET['q'];
}
$sicherheitszahl = 0;
$sicherheitszahl = strlen($passwort);
if (preg_match("/[a-z]/", $passwort)) {
    $sicherheitszahl = $sicherheitszahl + 5;
}
if (preg_match("/[A-Z]/", $passwort)) {
    $sicherheitszahl = $sicherheitszahl + 5;
}
if (preg_match("/[0-9]/", $passwort)) {
    $sicherheitszahl = $sicherheitszahl + 5;
}
if (preg_match("/[,.-;:_@€#*+~?=()%$!§]/", $passwort)) {
  $sicherheitszahl = $sicherheitszahl + 5;
}
if ($sicherheitszahl <= 18 ) {
  echo '<div class="alert-signup-red"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> unsicher</div>';
}
elseif ($sicherheitszahl <= 25) {
  echo '<div class="alert-signup-orange"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> sicher</div>';
}
elseif ($sicherheitszahl > 25) {
  echo '<div class="alert-signup-green"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> sehr sicher</div>';
}

