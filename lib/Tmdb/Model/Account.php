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

/**
 * Class Account
 * @package Tmdb\Model
 */
class Account extends AbstractModel
{
    /**
     * @var array
     */
    public static $properties = [
        'id',
        'include_adult',
        'iso_3166_1',
        'iso_639_1',
        'name',
        'username'
    ];
    /**
     * @var integer
     */
    private $id;
    /**
     * @var boolean
     */
    private $includeAdult;
    /**
     * @var string
     */
    private $iso31661;
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
    private $username;
    /**
     * @var GenericCollection
     */
    private $avatar;

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

    public function getIncludeAdult(): bool
    {
        return $this->includeAdult;
    }

    /**
     * @param boolean $includeAdult
     * @return $this
     */
    public function setIncludeAdult($includeAdult): self
    {
        $this->includeAdult = $includeAdult;

        return $this;
    }

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    /**
     * @param string $iso31661
     * @return $this
     */
    public function setIso31661($iso31661): self
    {
        $this->iso31661 = $iso31661;

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

    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getAvatar(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->avatar;
    }

    /**
     * @param GenericCollection $avatar
     * @return $this
     */
    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}
