<?php

echo "Hello, World!\n";          // print a string
print("hi\n");                   // print, returns 1
echo "a", "b", "\n";             // echo takes multiple args
printf("%.2f\n", 3.14159);       // formatted print -> 3.14
$s = sprintf("%s=%d", "x", 5);   // format into a string -> "x=5"

// // line comment    # also a line comment    /* block */

?>
plain text outside tags is printed as-is
the answer is <?= 6 * 7 ?>
