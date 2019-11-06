<?php
/**
 * Document
 *
 * @copyright Copyright © 2019. All rights reserved.
* @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Entities;

class Document extends AbstractCoreEntity
{
    public static function buildFromArray(iterable $array): Document
    {
        $document = new Document();
        $document->data = $array;
        return $document;
    }

    public function getSource()
    {
        return $this->_source;
    }

    public function getIndex()
    {
        return $this->_index;
    }

}