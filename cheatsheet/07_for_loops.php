<?php

for ($i = 0; $i < 5; $i++) {}      // 0 1 2 3 4
for ($i = 10; $i > 0; $i -= 2) {}  // 10 8 6 4 2 — custom step

foreach (["a","b"] as $v) {}          // value
foreach (["a","b"] as $i => $v) {}    // index + value
foreach (["x"=>1] as $k => $v) {}     // key + value

for ($i=0; $i<10; $i++) {
    if ($i === 3) continue;   // skip this iteration
    if ($i === 6) break;      // exit loop
}
break 2;      // break out of 2 nested loops

range(1, 5);        // [1,2,3,4,5]
range('a', 'e');    // [a,b,c,d,e]
range(0, 10, 2);    // [0,2,4,6,8,10] — step

foreach (["a"] as $x): echo $x; endforeach;   // colon syntax (for templates)
