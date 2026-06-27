<?php

function divide(int $a, int $b): float {
    if ($b === 0) throw new InvalidArgumentException("no /0");  // throw
    return $a / $b;
}

try {
    divide(10, 0);
} catch (InvalidArgumentException $e) {
    $e->getMessage();   // "no /0"
} finally {
    // always runs
}

try {} catch (TypeError | RuntimeException $e) {}   // catch multiple types

// hierarchy: Throwable -> { Error (engine), Exception (app) }
try { intdiv(1, 0); } catch (\Throwable $e) {}   // \Throwable catches everything

$e = new Exception("msg", 42);
$e->getMessage();   // "msg"
$e->getCode();      // 42

class NotFound extends RuntimeException {}          // custom exception
$v = $arr["k"] ?? throw new NotFound("missing");   // throw as expression (PHP 8+)

throw new LogicException("high", 0, $previous);     // 3rd arg = wrapped cause
$e->getPrevious();                                  // the original exception
