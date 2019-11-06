<?php
/**
 * Alias
 *
 * @copyright Copyright © 2019 Javra Softwares. All rights reserved.
 * @author Ashan Ghimire  <ashan.ghimire@javra.com>
 */


namespace Elastic\Core\Entities;

class Alias extends AbstractCoreEntity
{

    public static function buildFromArray(array $array) : self
    {
        $alias = new Alias();
        $alias->data = $array;
        return $alias;
    }


}