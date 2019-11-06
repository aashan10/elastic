<?php
/**
 * Index
 *
 * @copyright Copyright © 2019. All rights reserved.
 * @author Ashan Ghimire  <ashanghimire10@gmail.com>
 */


namespace Elastic\Core\Entities;

use Elastic\Collections\AliasCollection;
use Elastic\Collections\MappingCollection;
use Elastic\Collections\SettingsCollection;
use Elasticsearch\Client;

class Index extends AbstractCoreEntity
{

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sync(array $data){
        if(!empty($data)){
//            dd($data);
            if(array_key_exists('mappings', $data[$this->getIndexName()])){
                $this->mappings = MappingCollection::buildFromArray($data[$this->getIndexName()]['mappings']);
            }
            if(array_key_exists('settings',$data[$this->getIndexName()])){
                $this->settings = SettingsCollection::buildFromArray($data[$this->getIndexName()]['settings']);
            }
            if(array_key_exists('aliases', $data[$this->getIndexName()])){
                $this->aliases = AliasCollection::buildFromArray($data[$this->getIndexName()]['aliases']);
            }
        }
        return $this;
    }



    public function setData(array $data){
        $this->data = $data;
        return;
    }

    public function getIndexName(){
        if(array_key_exists('index', $this->data)){
            return $this->data['index'];
        }
        if(!empty($this->data)){
            $this->index =  array_keys($this->data)[0];
            return $this->index;
        }
        return false;
    }
}