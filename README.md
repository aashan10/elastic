# Elastic
A high level PHP client for Elasticsearch.

## Table of Contents
- [ Introduction ](#Introduction)
- [ System Requirements ](#system-requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Contribution](#contribution)

## Introduction
Elastic is a high level PHP client for [Elasticsearch](https://elastic.co), a search and indexing engine build on top of Apache Lucene. This project uses [elastic/elasticsearch-php](https://github.com/elastic/elasticsearch-php) on its core. 
## System Requirements

The project is highly dependent on [elastic/elasticsearch-php](https://github.com/elastic/elasticsearch-php). Therefore, you need to see the system requirements of the project accordingly. Currently, this project only supports elasticsearch v6.x.
The system requirements are:

| Software | Version |
|----------|---------|
|Elasticsearch|6.x and above|
|PHP|7.1.x and above|


## Installation

Elastic can be installed via composer. To install Elastic via composer, use the following command.
```
composer require aashan10/elastic
```

## Usage

The project has main namespace of `Elastic`. Under `Elastic` namespace, there are entities, repositories, collections and contracts with respective namespaces. Elastic search hosts can be configured and accessed by the `Elasticsearch\ClientBuilder` class.

```php
<?php
use Elasticsearch\ClientBuilder;
$elasticHosts = [
	'localhost:9200',
	'somehost.com'
];

$client = ClientBuilder::create()->setHosts($hosts)->build();

``` 
The client object needs to be passed to all the repositories in order to access the repositories.

#### Index
Indices can be created using Index repository;
```php
use Elastic\Repositories\Index;

$index = new Index($client);
$newIndex = $index->create('some_index_name'); // returns a new Index entity object.

// mappings, settings and aliases can be set as arrays and passed to the create method as parameters.
```

The indices can be deleted by calling the `delete()` method on the Index Entity object.
```php
$newIndex->delete();
```

Since elasticsearch doesn't allow the modification of indices, in case of alteration, new index can be created from the old index.

The existing index can be obtained as

```php
$indexEntityObject = $indexRepositoryObject->get(['elastic-search-index-name']);
``` 

The documents can be accessed, created and deleted in a similar manner.

## Contribution
The contributing guide will be published shortly. For now, please follow the standard procedure of forks and pull requests.

