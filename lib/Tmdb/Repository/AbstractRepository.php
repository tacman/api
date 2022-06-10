<?php

/**
 * This file is part of the Tmdb PHP API created by Michael Roterman.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Tmdb
 * @author Michael Roterman <michael@wtfz.net>
 * @copyright (c) 2013, Michael Roterman
 * @version 4.0.0
 */

namespace Tmdb\Repository;

use Psr\EventDispatcher\EventDispatcherInterface;
use Tmdb\Api\ApiInterface;
use Tmdb\Client;
use Tmdb\Factory\AbstractFactory;
use Tmdb\HttpClient\Adapter\AdapterInterface;

/**
 * Class AbstractRepository
 * @package Tmdb\Repository
 */
abstract class AbstractRepository
{
    protected $client = null;
    protected $api = null;

    /**
     * Constructor
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Return the client
     */
    public function getClient(): \Tmdb\Client
    {
        return $this->client;
    }

    /**
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher(): EventDispatcherInterface
    {
        return $this->client->getEventDispatcher();
    }

    /**
     * Return the API Class
     */
    abstract public function getApi(): \Tmdb\Api\ApiInterface;

    /**
     * Return the Factory Class
     */
    abstract public function getFactory(): \Tmdb\Factory\AbstractFactory;

    /**
     * Process query parameters
     *
     * @param array $parameters
     */
    protected function parseQueryParameters(array $parameters = []): array
    {
        foreach ($parameters as $key => $candidate) {
            if (is_a($candidate, 'Tmdb\Model\Common\QueryParameter\QueryParameterInterface')) {
                $interfaces = class_implements($candidate);

                if (array_key_exists('Tmdb\Model\Common\QueryParameter\QueryParameterInterface', $interfaces)) {
                    unset($parameters[$key]);

                    $parameters[$candidate->getKey()] = $candidate->getValue();
                }
            }
        }

        return $parameters;
    }
}
