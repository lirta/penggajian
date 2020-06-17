<?php
$n=5;
$r=3;
$i=1;
$x=1;

while ($i <= $n) {
	if ($i > $r) {
		$x=$x*$i;
	}

	$i=$i+1;
}

echo "$x";

?>