<?php

echo("ciao");
$result = ($_GET['decision']);
for ($i = 0; $i <= count($result); $i++) {
  echo($result[$i]);
}

?>
