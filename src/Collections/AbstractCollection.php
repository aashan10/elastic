<?php
/**
 * AbstractCollection
 *
 * @copyright Copyright © 2019. All rights reserved.
 * @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Collections;
use Elastic\Contracts\CollectionInterface;
use Iterator;
abstract class AbstractCollection implements Iterator, CollectionInterface
{
    protected $collection = [];
    private $key = 0;
    public function get(): iterable
    {
        $this->collection;
    }
    public function current()
    {
        return $this->collection[$this->key];
    }

    public function next()
    {
        ++$this->key;
    }

    public function rewind()
    {
        $this->key = 0;
    }

    public function valid()
    {
        if(array_key_exists($this->key, $this->collection)){
            return true;
        }
        return false;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->key;
    }

    protected function add($item){
        array_push($this->collection, $item);
    }
}