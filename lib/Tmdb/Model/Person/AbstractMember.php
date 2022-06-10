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

namespace Tmdb\Model\Person;

use Tmdb\Model\AbstractModel;
use Tmdb\Model\Image;

/**
 * Class AbstractMember
 * @package Tmdb\Model\Person
 */
abstract class AbstractMember extends AbstractModel
{
    public static $properties = [
        'id',
        'name',
        'profile_path'
    ];
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $profilePath;
    /**
     * @var Image\ProfileImage
     */
    private $profile;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = (int)$id;

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

    public function getProfilePath(): string
    {
        return $this->profilePath;
    }

    /**
     * @param string $profilePath
     * @return $this
     */
    public function setProfilePath($profilePath): self
    {
        $this->profilePath = $profilePath;

        return $this;
    }

    /**
     * @param Image\ProfileImage $profile
     * @return $this
     */
    public function setProfileImage($profile = null): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getProfileImage(): \Tmdb\Model\Image\ProfileImage
    {
        return $this->profile;
    }

    /**
     * Assert if there is an profile image object
     */
    public function hasProfileImage(): bool
    {
        return $this->profile instanceof Image;
    }
}
