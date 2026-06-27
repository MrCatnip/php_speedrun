<?php

$grid = [[1,2,3], [4,5,6]];   // array of arrays
$grid[1][2];                  // 6 — row 1, col 2

foreach ($grid as $row)               // walk rows
    foreach ($row as $cell) {}        // walk cells

$users = [                            // list of records (common shape)
    ["name" => "Ada",   "age" => 36],
    ["name" => "Linus", "age" => 54],
];
$users[0]["name"];                    // "Ada"
echo "{$users[0]['name']}\n";         // interpolate: {$arr['key']} with quotes

array_column($users, "name");          // ["Ada","Linus"]
array_column($users, "age", "name");   // ["Ada"=>36, "Linus"=>54]
usort($users, fn($a,$b) => $a["age"] <=> $b["age"]); // sort by field

$x = $users[0]["xyz"][0] ?? "none";    // safe deep read (chain ?? for arrays)

foreach ($users as &$u) $u["age"]++;   // & = reference, actually mutates
unset($u);                             // ALWAYS unset ref after the loop
