<?php
/**
 * AbstractCoreEntity
 *
 * @copyright Copyright © 2019. All rights reserved.
* @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Entities;

use Exception;

abstract class AbstractCoreEntity
{
    protected $data = [];

    /**
     * @param $name
     * @param $value
     * @return AbstractCoreEntity
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        return $this;
    }

    /**
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            return null;
        }
    }

    public function __call($name, $arguments)
    {
        $delimiter = substr($name, 0, 3);
        $fieldName = substr($name, 3);
        $fieldName = $this->camelCaseToSnakeCase($fieldName);
        if ($delimiter == 'get') {
            return $this->$fieldName;
        }
        if ($delimiter == 'set') {
            return $this->$fieldName = $arguments[0];
        }

        if ($delimiter == 'has') {
            if (array_key_exists($fieldName, $this->data)) {
                return true;
            }
            return false;
        }
        return null;
    }

    protected function camelCaseToSnakeCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

}