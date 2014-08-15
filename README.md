# dbunit-fixture-arrays

> A native PHP array-based fixture provider for PHPUnit's DbUnit

dbunit-fixture-arrays provides the capability to provide fixtures (data sets) to 
PHPUnit's DbUnit as native PHP arrays, as opposed to the many other drivers 
currently supported by DbUnit, such as Yaml, XML, CSV, etc.

## How?

Simply install with composer:

    composer require mrkrstphr/dbunit-fixture-arrays:@stable

Then plug into DbUnit as you would with any other data set format: 

```php
public function getDataSet() {
    return new ArrayDataSet([
        '/path_to_file.php',
        '/path_to_other_file.php'
    ]);
}
```

Where the files look something like: 

```php
return [
    'table_name' => [
        ['id' => 1, 'name' => 'Row Data 1'],
        ['id' => 2, 'name' => 'Row Data 2'],
    ],
    'other_table_name' => [
        ['id' => 99, 'color' => 'Red'],
        ['id' => 88, 'color' => 'Blue'],
    ],
];
```

## Why?

Sometimes it's nice to be able to slip a little logic into the fixtures files. Say
for instance that you need some test data that contains a date in the future, but
not more than 1 year away. Without continually updating your fixture data, there's
no way to reliably do this.

With dbunit-fixture-arrays, you can:

```php
return [
    'table_name' => [
        ['id' => 1, 'date' => (new DateTime('+1 year'))->format('Y-m-d')],
        ['id' => 2, 'date' => '2014-05-01'
    ]
];
```

Other benefits include slightly, but probably not very noticably, faster tests with
less memory footprint due to not needing to parse Yaml or XML - your results may vary.

## Contributing

Suggestions or bugs? Submit an issue or open a pull request!
