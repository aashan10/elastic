<?php
/**
 * DocumentCollection
 *
 * @copyright Copyright © 2019. All rights reserved.
 * @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Collections;

use Elastic\Entities\Document;

class DocumentCollection extends AbstractCollection
{
    public static function buildFromArray(array $array): DocumentCollection
    {
        $collection = new DocumentCollection();
        if (array_key_exists('hits', $array) && array_key_exists('hits', $array['hits'])) {
            foreach ($array['hits']['hits'] as $document) {
                if ($document instanceof Document) {
                    $collection->add($document);
                }

                if (is_array($document)) {
                    $document = Document::buildFromArray($document);
                    $collection->add($document);
                }
            }
        }

        return $collection;
    }
}