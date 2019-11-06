<?php
/**
 * SettingsCollection
 *
 * @copyright Copyright © 2019 Javra Softwares. All rights reserved.
 * @author Ashan Ghimire  <ashan.ghimire@javra.com>
 */


namespace Elastic\Collections;

use Elastic\Core\Entities\Setting;

class SettingsCollection extends AbstractCollection
{

    public static function buildFromArray(array $array){
        $collection = new SettingsCollection();
        foreach ($array as $setting){
            if($setting instanceof Setting){
                $collection->add($setting);
            }
            if(is_array($setting)){
                $collection->add(Setting::buildFromArray($setting));
            }
        }
        return $collection;
    }
}