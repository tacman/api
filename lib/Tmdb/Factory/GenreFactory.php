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

namespace Tmdb\Factory;

use Tmdb\Model\Collection\Genres;
use Tmdb\Model\Genre;

/**
 * Class GenreFactory
 * @package Tmdb\Factory
 */
class GenreFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [], $key = 'genres'): \Tmdb\Model\Collection\Genres
    {
        $collection = new Genres();

        if (array_key_exists($key, $data)) {
            $data = $data[$key];
        }

        foreach ($data as $item) {
            $collection->addGenre($this->create($item));
        }

        return $collection;
    }

    /**
     * @param array $data
     */
    public function create(array $data = []): \Tmdb\Model\AbstractModel
    {
        return $this->hydrate(new Genre(), $data);
    }
}
