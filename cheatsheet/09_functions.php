<?php

function add(int $a, int $b): int { return $a + $b; }   // typed params + return
add(2, 3);   // 5

function greet(string $n, string $g = "Hi"): string { return "$g $n"; }
greet("Ada");                      // "Hi Ada" — default param
greet(g: "Yo", n: "Ada");          // named args (any order)

function sum(int ...$n): int { return array_sum($n); }  // variadic
sum(1, 2, 3);        // 6
sum(...[1, 2, 3]);   // 6 — spread array into args

function f(?int $id): int|string { return $id ?? "guest"; } // nullable + union

function change(int &$n) { $n = 99; }   // & = by reference
$v = 1; change($v);                     // $v is now 99

$m = 3;
$f = function($x) use ($m) { return $x * $m; };  // closure: use captures vars
$f = fn($x) => $x * $m;                          // arrow fn: auto-captures

[$lo, $hi] = [min($a), max($a)];   // destructure returned array

function gen() { yield 1; yield 2; }   // generator: lazy values
foreach (gen() as $v) {}
