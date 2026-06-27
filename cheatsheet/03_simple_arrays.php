<?php

$a = [1, 3, 5, 7, 9];   // indexed array

$a[0];          // 1 — read (this COPIES the value)
$a[1] = 99;     // overwrite
$a[] = 11;      // append
count($a);      // length

foreach ($a as $n) {}            // value
foreach ($a as $i => $n) {}      // index + value

array_merge([1,2], [3,4]);   // [1,2,3,4]
[...[1,2], ...[3,4]];        // [1,2,3,4] — spread
array_pop($a);               // remove+return last
array_shift($a);             // remove+return first
array_unshift($a, 0);        // prepend
in_array(5, $a);             // true if value exists
array_search(5, $a);         // key of match, or false

array_sum([1,2,3]);          // 6
max([1,9,4]);                // 9
min([1,9,4]);                // 1

array_map(fn($x) => $x*2, [1,2,3]);            // [2,4,6]
array_filter([1,2,3,4], fn($x) => $x%2===0);   // [2,4] (keeps keys!)
array_reduce([1,2,3], fn($c,$x) => $c+$x, 0);  // 6
array_values($arr);          // re-index keys 0,1,2...

sort($a);                            // ascending, in place
rsort($a);                           // descending
usort($a, fn($x,$y) => $x <=> $y);   // custom; <=> = spaceship
