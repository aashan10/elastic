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

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->collection;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->collection[$this->key];
    }

    /**
     * increment the index
     */
    public function next()
    {
        ++$this->key;
    }

    /**
     * Rewind the key back to 0
     */
    public function rewind()
    {
        $this->key = 0;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        if (array_key_exists($this->key, $this->collection)) {
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

    /**
     * @param $item
     */
    protected function add($item)
    {
        array_push($this->collection, $item);
    }
}