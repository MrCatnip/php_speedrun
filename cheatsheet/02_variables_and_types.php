<?php

$int   = 42;        // int
$float = 3.14;      // float
$str   = "hello";   // string
$bool  = true;      // bool
$none  = null;      // null

gettype($int);      // "integer"
var_dump($float);   // float(3.14) — shows type + value
is_int($int);       // true

"5" + 3;            // 8   — string coerced to int
"5" . 3;            // "53" — . concatenates
5 == "5";           // true  — loose, ignores type
5 === "5";          // false — strict, checks type (PREFER THIS)

(int) "42abc";      // 42
(string) 99;        // "99"
(bool) "0";         // false — gotcha: "0" is falsy, "0.0" is truthy

const PI = 3.14;    // constant (can't reassign)

$name = "Ada";
echo "hi $name\n";      // hi Ada     — double quotes interpolate
echo "hi {$name}!\n";   // hi Ada!    — braces = explicit boundary
echo 'hi $name';        // hi $name   — single quotes are literal

$x = $undef ?? "default";   // ?? uses right side if left is null/unset
