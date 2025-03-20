<img src="./php.png" style="height: 8%; width:8%;"/>


## Launch the website
Run on localhost
```
php -S localhost:8000
cltr + c
```
To see website printed on terminal
```
php file.php
```
<br/>

## Variables
Variables in PHP are represented by a dollar sign followed by the name of the variable. The variable name is case-sensitive.

Variable declaration rules:

1. Start with dollar sign($)
2. First letter of variable name comes from a-zA-z_
3. Next letters of variable name comes from a-zA-Z0-9_
4. No space,no syntex

**Variables**
```
$name = "Maria"; 
```
**Constant** \
Whitout $ and with uppercase
```
const NOMBRE = 'Maria';
```
**Global Constant**
```
define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg'); 
```
**Concatenation**
```
$num = 39;
$newNum = $num  . "1";
```
PHP is a **dynamically typed** language, which means that by default there is no need to specify the type of a variable, as this will be determined at runtime.
You can define the variables by putting the type before the name.

*int $number*

**To enable strict type for typed data**
```
declare(strict_types=1);
```
> [!WARNING]
> It only affect the file and it has to be on the first line of the file
<br/>

## Basic functions
| Function  | Example | Explanation  |
| ------------- | ------------- | ------------|
| **gettype()**  | [echo gettype($ageBool);](02-conceptos.php) | get the type of the variable |
| **implode()**  | [implode(", ", $array)](06-classes/classes.php) | convert an array to a string |
| **array_rand()**  | [$names[array_rand($names)]](06-classes/classes.php)  | Picks one or more **random** entries out of an array, and returns the key (or keys) of the random entries. |

<br/>

## Classes
Atributes & Constructor
```
public $name;
public $powers;
public $planet;

public function __construct($name, $powers, $planet) {
  $this->name = $name;
  $this->powers = $powers;
  $this->planet = $planet;
}
```
> [!TIP]
> With PHP 8 you can use this
>```
>public function __construct(
>        public string $name, 
>        public array $powers, 
>        public string $planet,
>    ) {}
>```
**Static Method** \
Static methods are callable without an instance of the object created. \
In order to use an static method this is the structure:
```
SuperHero::random();
```
*Example [classes.php](06-classes/classes.php)* \
**Public Method** \
Public methods are callable with an instance of the object created. \
In order to use a public method this is the structure:
```
$hero = new SuperHero("Superman", ["Volar", "Supervista", "Fuerza"], "Krypton");
$hero->description();
```
*Example [classes.php](06-classes/classes.php)* \
**Functions**
| Function  | Example | Explanation  |
| ------------- | ------------- | ------------|
| get_object_vars()  | [get_object_vars($this)](06-classes/classes.php)  | Returns an associative array of defined object accessible non-static properties for the specified object in scope. Interesting in order to see information of an object |

