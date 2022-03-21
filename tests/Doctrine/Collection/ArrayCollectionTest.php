<?php

namespace Knops\ToolboxTests\Doctrine\Collection;

use Knops\Toolbox\Doctrine\Collection\ArrayCollection;
use PHPUnit\Framework\TestCase;

class ArrayCollectionTest extends TestCase
{
    private ArrayCollection $collection;

    /**
     * @covers find()
     * @return void
     */
    public function testFind()
    {
        $this->assertEquals(
            'bar',
            $this->collection->find(function ($value, $i) {
                return $i === 1;
            })
        );
    }

    /**
     * @covers findIndex()
     * @return void
     */
    public function testFindIndex()
    {
        $this->assertEquals(
            1,
            $this->collection->findIndex(function ($value, $i) {
                return $i === 1;
            })
        );
    }

    /**
     * @covers findAll()
     * @return void
     */
    public function testFindAll()
    {
        $this->assertEquals(
            [0 => 'foo', 2 => 'baz'],
            $this->collection->findAll(function ($value) {
                return in_array($value, ['foo', 'baz']);
            })->toArray()
        );
    }

    /**
     * @covers reduce()
     * @return void
     */
    public function testReduce()
    {
        $this->assertEquals(
            'foobarbaz',
            $this->collection->reduce(function ($carry, $value) {
                return $carry . $value;
            })
        );
    }

    /**
     * @covers join()
     * @return void
     */
    public function testJoin()
    {
        $this->assertEquals('foo,bar,baz', $this->collection->join(','));
    }

    /**
     * @covers sort()
     * @return void
     */
    public function testSort()
    {
        $this->assertEquals('bar,baz,foo', $this->collection->sort(fn($a, $b) => $a <=> $b)->join(','));
    }

    protected function setUp(): void
    {
        $this->collection = new ArrayCollection(['foo', 'bar', 'baz']);
    }
}