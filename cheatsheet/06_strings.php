<?php

$name = "World";
"Hello $name\n";   // double quotes: interpolate + escapes (\n \t)
'Hello $name\n';   // single quotes: literal, no interpolation

$s = "foo" . "bar";   // concat -> "foobar"
$s .= "baz";          // append

strlen("héllo");      // 6 — BYTES (é is 2 bytes)
mb_strlen("héllo");   // 5 — actual chars (mb_* = unicode-safe)
"hello"[0];           // "h" — index like an array

strtoupper("hi");     // "HI"
strtolower("HI");     // "hi"
ucfirst("hi");        // "Hi"
ucwords("a b");       // "A B"

strpos("hello", "l");          // 2 — index, or false
str_contains("hello", "ell");  // true
str_starts_with("hi", "h");    // true
str_ends_with("hi", "i");      // true
str_replace("a", "b", "aaa");  // "bbb"

trim("  hi  ");                    // "hi"
str_pad("7", 3, "0", STR_PAD_LEFT); // "007"
substr("hello", 1, 3);            // "ell"
substr("hello", -2);              // "lo"

explode(",", "a,b,c");   // ["a","b","c"]
implode("-", ["a","b"]); // "a-b"
str_split("abc");        // ["a","b","c"]

number_format(1234.5, 2);            // "1,234.50"
preg_match('/^\d+$/', "123");        // 1 if matches
preg_replace('/\d/', "#", "a1b2");   // "a#b#"
preg_match_all('/\d+/', "a12b34", $m); // $m[0] = ["12","34"]
