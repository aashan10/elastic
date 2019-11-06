<?php

namespace Elastic\Contracts;

interface CollectionInterface{
    public function get() : array ;
    public static function buildFromArray(array $array);
}