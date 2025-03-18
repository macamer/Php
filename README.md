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

