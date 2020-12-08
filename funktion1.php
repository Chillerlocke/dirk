<?php
function get_sub_sup_massnamen ($name, $medium = 'html')
{

if ($medium == 'pdf')
{
$name = str_replace('max', '<small><small>(max)</small></small> ', $name);
$name = str_replace('min', '<small><small>(min)</small></small> ', $name);
$name = str_replace('≤', '<small><small>(max)</small></small> ', $name);
$name = str_replace('≥', '<small><small>(min)</small></small> ', $name);

$name = str_replace('□', '', $name);
}
else
{
$name = str_replace('max', '<small>≤</small> ', $name);
$name = str_replace('min', '<small>≥</small> ', $name);
$name = str_replace('≤', '<small>≤</small> ', $name);
$name = str_replace('≥', '<small>≥</small> ', $name);
}


$name = str_replace('P1', 'P<sub>1</sub>', $name);
$name = str_replace('P2', 'P<sub>2</sub>', $name);
$name = str_replace('Pmot', 'P<sub>mot</sub>', $name);

$name = str_replace('DN1/2', 'DN<sub>1/2</sub>', $name);

$name = str_replace('DN1', 'DN<sub>1</sub>', $name);
$name = str_replace('DN2', 'DN<sub>2</sub>', $name);

$name = str_replace('fmax', 'f<sub>max</sub>', $name);
$name = str_replace('gmax', 'g<sub>max</sub>', $name);

$name = str_replace('G1', 'G<sub>1</sub>', $name);
$name = str_replace('G2', 'G<sub>2</sub>', $name);
$name = str_replace('R1', 'R<sub>1</sub>', $name);

// Hochzahlen per regelärem Ausdruck korrekt ausgeben
$zeichenkette = $name;
$suchmuster   = "/[0-9]\)/";
$ersetzung    = "<sup> $0</sup>";
$name         = preg_replace($suchmuster, $ersetzung, $zeichenkette);

$name = str_replace('Ø', '<small>Ø </small>', $name);

$name = str_replace('#', '', $name);

return $name;
}