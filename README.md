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
| **implode()**  | [implode(", ", $array)](06-classes/classes.php) | convert an array into a string |
| **array_rand()**  | [$names[array_rand($names)]](06-classes/classes.php)  | Picks one or more **random** entries out of an array, and returns the key (or keys) of the random entries. |
| **extract(*variable*)**  | [extract($data);](05-importstructure/functions.php)  | Extracts the data and transform it into variables. Instead of array you have a variable. For example title instead of $data['title] |
| **array_merge(*array,array2*)**  | [array_merge($data,['until_message'=>$until_message]);](05-importstructure/index.php)  | Merges the elements of one or more arrays together so that the values of one are appended to the end of the previous one. It returns the resulting array. |
| **json_decore(*variable*)**  | [$data = json_decode($result, true);](05-importstructure/functions.php)  | When **true**, JSON objects will be returned as associative *arrays*; when **false**, JSON objects will be returned as *objects*. |
| **file_get_contents(*file*)**  | [$result = file_get_contents(API_URL);](05-importstructure/functions.php)  |Reads entire file into a string|


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

## AJAX with PHP
Use Javascript to conect with web server.
The followings lines are a basic structure of ajax:
```
var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
```

Web site conect to *gethint.php* and search variable called *q*.
```
//gethint.php
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}
```
*Example [08-basic-ajax](08-basic-ajax/index.html)*

|Property	|Description|
|---------|-----------|
|onreadystatechange	|Defines a function to be called when the readyState property changes|
|readyState	|Holds the status of the XMLHttpRequest.|
||0: request not initialized|
||1: server connection established|
||2: request received|
||3: processing request||
||4: request finished and response is ready|
|status |	200: "OK"|
||403: "Forbidden"|
||404: "Page not found"|
|statusText|	Returns the status-text (e.g. "OK" or "Not Found")*onreadystatechange* is an event that run every time the readyState of the request changes.|

**setRequestHeader()** \
The XMLHttpRequest method setRequestHeader() sets the value of an HTTP request header. When using setRequestHeader(), you must call it after calling *open()*, but before calling *send()*. If this method is called several times with the same header, the values are merged into one single request header.
```
xmlhttprequest.setRequestHeader(
    'Content-Type',
    'application/x-www-form-urlencoded'
);
```

**Send data to PHP** \
When you want to send the data from your website to the server.
```
theObject.send('username=Maria');
```
Then you can check if the data is empty or verify the information.
```
<?php
if (isset($_POST['username'])) {
    echo "Usuario: " . $_POST['username'];
} else {
    echo "No se ingresó ningún usuario.";
}
```
| Function  | Example | Explanation  |
| ------------- | ------------- | ------------|
| **isset()**  | [isset($_POST['username'];](09-basic-ajax-post/backend.php) | Determine if a variable is declared and is different than null |

With **'application/x-www-form-urlencoded'** we need to use variables like:
```
//option 1
theObject.send('username=Maria');
//option 2
theObject.send('username=' + encodeURIComponent(name));

<?php 
if (isset($_POST['username'])) {
    echo "Usuario: " . $_POST['username'];
}
```
If you prefer, you can use **json**
```
theObject.setRequestHeader('Content-Type', 'application/json');
theObject.send(JSON.stringify({ username: name }));

<?php 
$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['username'])) {
    echo "Usuario: " . $data['username'];
} 
```

<br/>

## Insert PHP from other file
In order to insert the code of another file we can use
| Function  | Example | Explanation  |
| ------------- | ------------- | ------------|
| **include**  | [include 'functions.php';](04-importfiles/index.php) | The include expression includes and evaluates the specified file.|
| **include_once**  | [include_once 'functions.php';](04-importfiles/index.php) | The include expression includes and evaluates the specified file only once |
| **require**  | [require 'functions.php';](04-importfiles/index.php) | The require expression includes and evaluates the specified file. |
| **require_once**  | [require_once 'functions.php';](04-importfiles/index.php) | The require expression includes and evaluates the specified file only once. |


> [!NOTE]
> The difference betweeen include and require is that the include construct will emit an E_WARNING if it cannot find a file; this is different behavior from require, which will emit an E_ERROR. So, the project of the includes will still be running although it doesn't find the file. 
