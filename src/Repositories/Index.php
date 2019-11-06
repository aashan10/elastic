<?php
/**
 * Elasticsearch Index Actions
 *
 * @copyright Copyright © 2019. All rights reserved.
 * @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */

namespace Elastic\Repositories;

use Elastic\Entities\AbstractCoreEntity;
use Elasticsearch\Client;
use Elastic\Entities\Index as IndexEntity;

class Index extends AbstractCoreEntity
{
    /**
     * @var Client $client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $index
     * @param array $mappings
     * @param array $settings
     * @param array $aliases
     * @return IndexEntity | bool
     */
    public function create(string $index, array $mappings = [], array $settings = [], array $aliases = []): IndexEntity
    {
        $params = [
            'index' => $index,
            'body' => [
                'settings' => $settings,
                'mappings' => $mappings
            ]
        ];
        $result = $this->client->indices()->create($params);
        if (is_array($result) && array_key_exists('acknowledged', $result) && $result['acknowledged']) {
            if (!empty($aliases)) {
                $this->setAlias([
                    $index => $aliases
                ]);
            }
            $indexEntity = new IndexEntity($this->client);
            return $indexEntity->sync($result);
        }
        return false;
    }

    /**
     * @return array
     */
    public function cat(): array
    {
        return $this->client->cat()->indices();
    }

    /**
     * @param string $index
     * @return bool
     */
    public function delete(string $index): bool
    {
        $response = $this->client->indices()->delete([
            'index' => [$index]
        ]);

        if (is_array($response) && array_key_exists('acknowledged', $response) && $response['acknowledged']) {
            return true;
        }
        return false;
    }

    /**
     * @param array $options Options should be in the format [ index1 => [ alias1, alias2, ... ], ... ]
     * @return bool
     */
    public function setAlias(array $options): bool
    {
        $aliasMap = [
            'body' => [
                'actions' => []
            ]
        ];
        foreach ($options as $index => $aliases) {
            if (is_array($aliases)) {
                foreach ($aliases as $alias) {
                    $add = [
                        'add' => [
                            'index' => $index,
                            'alias' => $alias
                        ]
                    ];
                    array_push($aliasMap['body']['actions'], $add);
                }
            }
            if (is_string($aliases) || is_numeric($aliases)) {
                $add = [
                    'add' => [
                        'index' => $index,
                        'alias' => (string)$aliases
                    ]
                ];
                array_push($aliasMap['body']['actions'], $add);
            }
        }
        $response = $this->client->indices()->updateAliases($aliasMap);
        if (is_array($response) && array_key_exists('acknowledged', $response) && $response['acknowledged']) {
            return true;
        }
        return false;
    }

    public function actions()
    {
        return $this->client->indices();
    }

    public function get(string $index)
    {
        $response = $this->client->indices()->get([
            'index' => [$index]
        ]);

        $object = new IndexEntity($this->client);
        $object->setIndex(array_keys($response)[0]);
        $object->sync($response);
        return $object;
    }
}