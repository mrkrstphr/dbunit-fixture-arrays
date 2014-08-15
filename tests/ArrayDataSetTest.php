<?php

namespace Mrkrstphr\DbUnit\DataSet;

use PHPUnit_Framework_TestCase;

/**
 * Class ArrayDataSetTest
 * @package Mrkrstphr\DbUnit\DataSet
 */
class ArrayDataSetTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test construction with no arguments runs without error/exception.
     */
    public function testConstructWithNoFiles()
    {
        $dataSet = new ArrayDataSet();
    }

    /**
     * Test construction with files passed.
     */
    public function testConstructWithFiles()
    {
        $dataSet = new ArrayDataSet(__DIR__ . '/data/this.php');

        $this->assertCount(1, $dataSet->getIterator());

        foreach ($dataSet->getIterator() as $table) {
            $this->assertInstanceOf('PHPUnit_Extensions_Database_DataSet_DefaultTable', $table);
        }
    }

    /**
     * Test adding files to the data set.
     */
    public function testAddingFiles()
    {
        $dataSet = new ArrayDataSet();
        $dataSet->addFile(__DIR__ . '/data/this.php');

        $this->assertCount(1, $dataSet->getIterator());

        foreach ($dataSet->getIterator() as $table) {
            $this->assertInstanceOf('PHPUnit_Extensions_Database_DataSet_DefaultTable', $table);
        }

        $dataSet->addFile(__DIR__ . '/data/that.php');

        $this->assertCount(3, $dataSet->getIterator());

        foreach ($dataSet->getIterator() as $table) {
            $this->assertInstanceOf('PHPUnit_Extensions_Database_DataSet_DefaultTable', $table);
        }
    }
}
