<?php
/**
 * AliasCollection
 *
 * @copyright Copyright © 2019 Javra Softwares. All rights reserved.
 * @author Ashan Ghimire  <ashan.ghimire@javra.com>
 */


namespace Elastic\Collections;

use Elastic\Core\Entities\Alias;

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