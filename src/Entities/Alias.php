<?php
/**
 * Alias
 *
 * @copyright Copyright © 2019. All rights reserved.
* @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Entities;

/**
 * @method setName(int|string $key)
 */
class Alias extends AbstractCoreEntity
{

    public static function buildFromArray(array $array) : self
    {
        $alias = new Alias();
        $alias->data = $array;
        return $alias;
    }


}