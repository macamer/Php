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

## Variables
Variables in PHP are represented by a dollar sign followed by the name of the variable. The variable name is case-sensitive.

Variable declaration rules:

1. Start with dollar sign($)
2. First letter of variable name comes from a-zA-z_
3. Next letters of variable name comes from a-zA-Z0-9_
4. No space,no syntex

PHP is a **dynamically typed** language, which means that by default there is no need to specify the type of a variable, as this will be determined at runtime.
You can define the variables by putting the type before the name.

*int $number*

**To enable strict type for typed data**
```
declare(strict_types=1);
```
> [!WARNING]
> It only affect the file and it has to be on the first line of the file

## Basic functions
| Function  | Example | Explanation  |
| ------------- | ------------- | ------------|
| Implode()  | implode(", ", $array)  | convert an array to a string |


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
```
public function __construct(
        public string $name, 
        public array $powers, 
        public string $planet,
    ) {}
```

