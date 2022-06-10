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

use Tmdb\Model\Collection\Images;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Image\BackdropImage;
use Tmdb\Model\Image\PosterImage;

/**
 * Class Collection
 * @package Tmdb\Model
 */
class Collection extends AbstractModel
{
    /**
     * @var string
     */
    private $backdropPath;
    /**
     * @var BackdropImage
     */
    private $backdrop;
    /**
     * @var integer
     */
    private $id;
    /**
     * @var Images
     */
    private $images;

    /**
     * @var GenericCollection
     */
    private $translations;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $overview;
    /**
     * @var Common\GenericCollection
     */
    private $parts;
    /**
     * @var string
     */
    private $posterPath;
    /**
     * @var PosterImage
     */
    private $poster;

    public static $properties = [
        'backdrop_path',
        'id',
        'name',
        'overview',
        'poster_path',
    ];

    public function __construct()
    {
        $this->parts        = new GenericCollection();
        $this->images       = new Images();
        $this->translations = new GenericCollection();
    }

    /**
     * @param BackdropImage $backdrop
     * @return $this
     */
    public function setBackdropImage(BackdropImage $backdrop): self
    {
        $this->backdrop = $backdrop;

        return $this;
    }

    public function getBackdropImage(): \Tmdb\Model\Image\BackdropImage
    {
        return $this->backdrop;
    }

    public function getBackdropPath(): string
    {
        return $this->backdropPath;
    }

    /**
     * @param string $backdropPath
     * @return $this
     */
    public function setBackdropPath($backdropPath): self
    {
        $this->backdropPath = $backdropPath;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = (int)$id;

        return $this;
    }

    public function getImages(): \Tmdb\Model\Collection\Images
    {
        return $this->images;
    }

    /**
     * @param Images $images
     * @return $this
     */
    public function setImages(Images $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  GenericCollection $translations
     * @return $this
     */
    public function setTranslations($translations): self
    {
        $this->translations = $translations;
         return $this;
    }

    public function getTranslations(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->translations;
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

    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     * @return $this
     */
    public function setOverview($overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getParts(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->parts;
    }

    /**
     * @param GenericCollection $parts
     * @return $this
     */
    public function setParts($parts): self
    {
        $this->parts = $parts;

        return $this;
    }

    /**
     * @param PosterImage $poster
     * @return $this
     */
    public function setPosterImage(PosterImage $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getPosterImage(): \Tmdb\Model\Image\PosterImage
    {
        return $this->poster;
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
