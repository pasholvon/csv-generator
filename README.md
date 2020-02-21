# csv-generator

This package handles generation of CSV data. 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- `PHP >=7.0`

### Installing


Official installation method is via composer and its packagist package [pasholvon/csv-generator](https://packagist.org/packages/pasholvon/csv-generator).

```
$ composer require pasholvon/csv-generator
```

### Usage

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$csv_generator = new Pasholvon\CsvGenerator();
$csv_generator->startGenerator();
$rows = [
    ['value4', 'value5', 'value6', ],
    ['value1', 'value2', 'value3', ],
];
foreach ($rows as $row) {
  $csv_generator->addRow($row);
}

var_dump($csv_generator->getCsv());
```
Outputs:

```
"value4","value5","value6"
"value1","value2","value3"
```

#### Advanced examples:

- Custom start row and column

````
<?php

require_once __DIR__ . '/vendor/autoload.php';

$csv_generator = new Pasholvon\CsvGenerator();
$csv_generator->startGenerator(3, 5);
$rows = [
    ['value4', 'value5', 'value6', ],
    ['value1', 'value2', 'value3', ],
];
foreach ($rows as $row) {
  $csv_generator->addRow($row);
}
var_dump($csv_generator->getCsv());
$csv_generator->endGenerator();
````
Outputs:

```
"","","",""
"","","",""
"","","",""
"","","",""
"","","value4","value5","value6"
"","","value1","value2","value3"
```

- Custom enclosure

````
<?php

require_once __DIR__ . '/vendor/autoload.php';

$csv_generator = new Pasholvon\CsvGenerator();
$csv_generator->setEnclosure(':');
$csv_generator->startGenerator();
$rows = [
    ['value4', 'value5', 'value6', ],
    ['value1', 'value2', 'value3', ],
];
foreach ($rows as $row) {
  $csv_generator->addRow($row);
}
var_dump($csv_generator->getCsv());
$csv_generator->endGenerator();
````
Outputs:

```
:value4:,:value5:,:value6:
:value1:,:value2:,:value3:
```

- Custom delimiter

````
<?php

require_once __DIR__ . '/vendor/autoload.php';

$csv_generator = new Pasholvon\CsvGenerator();
$csv_generator->setDelimiter("|");
$csv_generator->startGenerator();
$rows = [
    ['value4', 'value5', 'value6', ],
    ['value1', 'value2', 'value3', ],
];
foreach ($rows as $row) {
  $csv_generator->addRow($row);
}
var_dump($csv_generator->getCsv());
$csv_generator->endGenerator();
````
Outputs:

```
"value4"|"value5"|"value6"
"value1"|"value2"|"value3"
```


### Author

 **Maciej Jakubowski - jakubowski421@gmail.com**

### License

This project is licensed under the MIT License - see the [LICENSE.txt](LICENSE.txt) file for details