<?php
/**
 * Setting
 *
 * @copyright Copyright © 2019 Javra Softwares. All rights reserved.
 * @author Ashan Ghimire  <ashan.ghimire@javra.com>
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