<?php
/**
 * Mapping
 *
 * @copyright Copyright © 2019 Javra Softwares. All rights reserved.
 * @author Ashan Ghimire  <ashan.ghimire@javra.com>
 */


namespace Elastic\Core\Entities;

class Mapping extends AbstractCoreEntity
{

    public static function buildFromArray(iterable $array){
        $mapping = new Mapping();
        $mapping->data = $array;
        return $mapping;
    }

}