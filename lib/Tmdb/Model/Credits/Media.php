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

namespace Tmdb\Model\Credits;

use Tmdb\Model\AbstractModel;
use Tmdb\Model\Common\GenericCollection;

/**
 * Class Media
 * @package Tmdb\Model\Credits
 */
class Media extends AbstractModel
{
    public static $properties = [
        'id',
        'name',
        'original_name',
        'character',
    ];
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $originalName;
    /**
     * @var string
     */
    private $character;
    /**
     * @var GenericCollection
     */
    private $episodes;
    /**
     * @var GenericCollection
     */
    private $seasons;

    public function getCharacter(): string
    {
        return $this->character;
    }

    /**
     * @param string $character
     * @return $this
     */
    public function setCharacter($character): self
    {
        $this->character = $character;

        return $this;
    }

    public function getEpisodes(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->episodes;
    }

    /**
     * @param GenericCollection $episodes
     * @return $this
     */
    public function setEpisodes($episodes): self
    {
        $this->episodes = $episodes;

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
        $this->id = $id;

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

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     * @return $this
     */
    public function setOriginalName($originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getSeasons(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->seasons;
    }

    /**
     * @param GenericCollection $seasons
     * @return $this
     */
    public function setSeasons($seasons): self
    {
        $this->seasons = $seasons;

        return $this;
    }
}
