<?php

class Animal {
    public string $name;            // public: anywhere
    protected int $legs = 4;        // protected: this class + children
    private bool $hungry = true;    // private: this class only
    const KINGDOM = "Animalia";     // class constant

    public function __construct(string $name) { $this->name = $name; }
    public function describe(): string { return "$this->name: $this->legs legs"; }
}

$cat = new Animal("Cat");   // instantiate
$cat->name;                 // -> for instance members
$cat->describe();
Animal::KINGDOM;            // :: for constants/static

class Point {                          // constructor promotion (PHP 8+)
    public function __construct(public float $x = 0, public float $y = 0) {}
}
$p = new Point(1, 2); $p->x;   // 1

class Dog extends Animal {             // inheritance
    public function describe(): string { return parent::describe() . " woof"; }
}

class Counter {
    public static int $n = 0;          // static: belongs to class
    public static function inc() { self::$n++; }
}
Counter::inc(); Counter::$n;   // 1

interface Shape { public function area(): float; }   // contract
abstract class Base implements Shape {               // can't instantiate
    abstract public function area(): float;          // children must implement
}
class Circle extends Base {
    public function __construct(private float $r) {}
    public function area(): float { return 3.14 * $this->r ** 2; }
}
(new Circle(2)) instanceof Shape;   // true

enum Suit: string {                    // enum (PHP 8.1+)
    case Hearts = "H";
    case Spades = "S";
}
Suit::Hearts->value;   // "H"

class Money {
    public function __construct(public readonly int $cents) {}  // set once
}
(new Money(500))->cents;   // 500, can't reassign
