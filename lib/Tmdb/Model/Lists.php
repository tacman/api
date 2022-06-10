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

namespace Tmdb\Model;

use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Image\PosterImage;

/**
 * Class Lists
 * @package Tmdb\Model
 */
class Lists extends AbstractModel
{
    public static $properties = [
        'created_by',
        'description',
        'favorite_count',
        'id',
        'item_count',
        'iso_639_1',
        'name',
        'poster_path'
    ];
    /**
     * @var string
     */
    private $createdBy;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $favoriteCount;
    /**
     * @var string
     */
    private $id;
    /**
     * @var GenericCollection
     */
    private $items;
    /**
     * @var int
     */
    private $itemCount;
    /**
     * @var string
     */
    private $iso6391;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $posterPath;
    /**
     * @var PosterImage
     */
    private $posterImage;

    public function __construct()
    {
        $this->items = new GenericCollection();
    }

    public function getCreatedBy(): string
    {
        return $this->createdBy;
    }

    /**
     * @param string $createdBy
     * @return $this
     */
    public function setCreatedBy($createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFavoriteCount(): int
    {
        return $this->favoriteCount;
    }

    /**
     * @param int $favoriteCount
     * @return $this
     */
    public function setFavoriteCount($favoriteCount): self
    {
        $this->favoriteCount = $favoriteCount;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    /**
     * @param string $iso6391
     * @return $this
     */
    public function setIso6391($iso6391): self
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getItemCount(): int
    {
        return $this->itemCount;
    }

    /**
     * @param int $itemCount
     * @return $this
     */
    public function setItemCount($itemCount): self
    {
        $this->itemCount = $itemCount;

        return $this;
    }

    public function getItems(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->items;
    }

    /**
     * @param GenericCollection $items
     * @return $this
     */
    public function setItems($items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPosterImage(): \Tmdb\Model\Image\PosterImage
    {
        return $this->posterImage;
    }

    /**
     * @param PosterImage $posterImage
     * @return $this
     */
    public function setPosterImage($posterImage): self
    {
        $this->posterImage = $posterImage;

        return $this;
    }

    public function getPosterPath(): string
    {
        return $this->posterPath;
    }

    /**
     * @param string $posterPath
     * @return $this
     */
    public function setPosterPath($posterPath): self
    {
        $this->posterPath = $posterPath;

        return $this;
    }
}
