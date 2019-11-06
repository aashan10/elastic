<?php
/**
 * Setting
 *
 * @copyright Copyright © 2019. All rights reserved.
* @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Core\Entities;

class Setting extends AbstractCoreEntity
{

    public static function buildFromArray(iterable $array){
        $setting = new Setting();
        $setting->data = $array;
        return $setting;
    }

}