<?php

$p = ["name" => "Ada", "age" => 36];   // associative array (map)

$p["name"];          // "Ada"
$p["age"] = 37;      // update
$p["job"] = "dev";   // add
unset($p["job"]);    // remove

$p["city"] ?? "n/a";              // safe read with fallback
isset($p["name"]);               // true (set AND not null)
array_key_exists("name", $p);    // true (set even if null)

foreach ($p as $k => $v) {}      // iterate (insertion order)

array_keys($p);      // ["name","age"]
array_values($p);    // ["Ada",37]
array_flip($p);      // swap keys<->values
array_combine(["a","b"], [1,2]); // ["a"=>1,"b"=>2]

array_merge(["x"=>1], ["x"=>2]); // ["x"=>2] — right wins on collision
["x"=>1] + ["x"=>2];             // ["x"=>1] — left wins on collision

array_map(fn($v) => $v*2, ["a"=>3]); // ["a"=>6] — keeps keys (single array)
