<?php
/**
 * Mapping
 *
 * @copyright Copyright © 2019. All rights reserved.
* @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Entities;

class Mapping extends AbstractCoreEntity
{

    public static function buildFromArray(iterable $array){
        $mapping = new Mapping();
        $mapping->data = $array;
        return $mapping;
    }

}