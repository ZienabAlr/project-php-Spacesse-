<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Charlotte";
$a[] = "Diana";
$a[] = "David";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Fien";
$a[] = "Faheer";
$a[] = "Filip";
$a[] = "Griet";
$a[] = "Gheert";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Joris";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Lauren";
$a[] = "Marianne";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Robby";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Stijn";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";
$a[] = "Zainab";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $username) {
    if (stristr($q, substr($username, 0, $len))) {
      if ($hint === "") {
        $hint = $username;
      } else {
        $hint .= ", $username";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>