<?php

$i = 0;
while ($i < 5) { $i++; }      // check BEFORE each run
do { $i++; } while ($i < 5);  // runs at least once (check AFTER)

while (true) { break; }       // infinite loop, exit via break

// --- conditionals ---
$x = 7;
if ($x > 10)      {}
elseif ($x > 5)   {}   // runs
else              {}

// ==  !=  loose    ===  !==  strict    &&  ||  !
1 <=> 2;        // -1  — spaceship: -1/0/1
0 == "a";       // false in PHP 8+ (was true in PHP 7)

$x > 5 ? "hi" : "lo";   // ternary
$maybe ?? "fallback";   // null coalesce
$x ?: "empty";          // $x if truthy, else right

$g = match (true) {           // strict (===), returns a value
    $x >= 90 => "A",
    $x >= 50 => "B",
    default  => "F",
};

switch ($x) {                 // loose, falls through without break!
    case 7: echo "seven"; break;
    default: echo "other";
}
