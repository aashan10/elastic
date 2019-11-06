<?php

namespace Elastic\Contracts;

interface CollectionInterface{
    public function get() : iterable ;
    public static function buildFromArray(array $array);
}