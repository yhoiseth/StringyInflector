# StringyInflector
A PHP library that helps you capitalize personal names. Extends [Stringy](https://github.com/danielstjules/Stringy), a PHP string manipulation library with multibyte support.

Personal names such as "Marcus Aurelius" are sometimes typed incorrectly using lowercase ("marcus aurelius").

Capitalizing "marcus aurelius" is a simple task. But some names are less simple. Consider "Zeno of Citium". If you have the string "zeno of citium", you should capitalize "zeno" and "citium", but not "of".

StringyInflector helps you capitalize personal names by checking against a list of special cases that shouldn't be capitalized. If the name is in the list, it isn't capitalized.

 
## Installation
```shell
composer require yhoiseth/stringy-inflector
```

## Usage
```php
<?php

use StringyInflector\StringyInflector as S;

$stringy = S::create('zeno of citium');

echo $stringy->capitalizePersonalName(); // 'Zeno of Citium'
```
