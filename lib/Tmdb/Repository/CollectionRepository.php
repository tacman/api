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

use Tmdb\Api\Collections;
use Tmdb\Client;
use Tmdb\Factory\CollectionFactory;
use Tmdb\Factory\ImageFactory;
use Tmdb\Model\Collection as ApiCollection;
use Tmdb\Model\Collection\QueryParameter\AppendToResponse;

/**
 * Class CollectionRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#collections
 */
class CollectionRepository extends AbstractRepository
{
    private $imageFactory;

    public function __construct(Client $client)
    {
        parent::__construct($client);

        $this->imageFactory = new ImageFactory($this->getClient()->getHttpClient());
    }

    /**
     * Load a collection with the given identifier
     *
     * If you want to optimize the result set/bandwidth you
     * should define the AppendToResponse parameter
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return ApiCollection
     */
    public function load($id, array $parameters = [], array $headers = []): ApiCollection
    {
        if (empty($parameters)) {
            $parameters = [
                new AppendToResponse([
                    AppendToResponse::IMAGES,
                    AppendToResponse::TRANSLATIONS,
                ])
            ];
        }

        $data = $this->getApi()->getCollection($id, $this->parseQueryParameters($parameters), $headers);

        return $this->getFactory()->create($data);
    }

    /**
     * Return the Collection API Class
     */
    public function getApi(): \Tmdb\Api\Collections
    {
        return $this->getClient()->getCollectionsApi();
    }

    public function getFactory(): \Tmdb\Factory\CollectionFactory
    {
        return new CollectionFactory($this->getClient()->getHttpClient());
    }

    /**
     * Get all of the images for a particular collection by collection id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return ApiCollection\Images
     */
    public function getImages($id, array $parameters = [], array $headers = []): ApiCollection\Images
    {
        $data = $this->getApi()->getImages($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['images' => $data]);

        return $movie->getImages();
    }

    /**
     * Get the list of translations that exist for a particular collection by collection id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return null|\Tmdb\Model\AbstractModel
     */
    public function getTranslations($id, array $parameters = [], array $headers = []): ApiCollection
    {
        $data = $this->getApi()->getTranslations($id, $this->parseQueryParameters($parameters), $headers);

        return $this->getFactory()->create(['translations' => $data]);
    }

    /**
     * @return mixed
     */
    public function getImageFactory(): \Tmdb\Factory\ImageFactory
    {
        return $this->imageFactory;
    }

    /**
     * @param mixed $imageFactory
     * @return $this
     */
    public function setImageFactory($imageFactory): self
    {
        $this->imageFactory = $imageFactory;

        return $this;
    }
}
