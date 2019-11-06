<?php
/**
 * AliasCollection
 *
 * @copyright Copyright © 2019. All rights reserved.
 * @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Collections;

use Elastic\Entities\Alias;

class AliasCollection extends AbstractCollection
{
    public static function buildFromArray(array $array)
    {
        $collection = new AliasCollection();
        foreach ($array as $key => $alias) {
            if ($alias instanceof Alias) {
                $collection->add($alias->setName($key));
            }
            if (is_array($alias)) {
                $alias = Alias::buildFromArray($alias);
                $alias->setName($key);
                $collection->add($alias);
            }
        }
        return $collection;
    }
}