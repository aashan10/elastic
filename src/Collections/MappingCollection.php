<?php
/**
 * MappingCollection
 *
 * @copyright Copyright © 2019 Javra Softwares. All rights reserved.
 * @author Ashan Ghimire  <ashan.ghimire@javra.com>
 */


namespace Elastic\Collections;

use Elastic\Core\Entities\Mapping;

class MappingCollection extends AbstractCollection
{
    public static function buildFromArray(array $array)
    {
        $collection = new MappingCollection();
        foreach ($array as $map){
            if($map instanceof  Mapping){
                $collection->add($map);
            }
            if(is_array($map)){
                $collection->add(Mapping::buildFromArray($map));
            }
        }
        return $collection;
    }
}