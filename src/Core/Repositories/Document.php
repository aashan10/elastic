<?php
/**
 * Document
 *
 * @copyright Copyright © 2019. All rights reserved.
* @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Core\Repositories;

use Elasticsearch\Client;
use Elastic\Collections\DocumentCollection;

class Document
{
    protected $client;
    protected $indices = [];

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setIndices(array $indices)
    {
        $this->indices = $indices;
        return $this;
    }

    public function matchAll()
    {
        $documents = $this->client->search([
            'index' => $this->indices,
            'body' => [
                'query' => [
                    'match_all' => (object)[]
                ]
            ]
        ]);
        return DocumentCollection::buildFromArray($documents);
    }
}