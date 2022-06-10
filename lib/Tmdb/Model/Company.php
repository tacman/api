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

use Tmdb\Model\Image\LogoImage;

/**
 * Class Company
 * @package Tmdb\Model
 */
class Company extends AbstractModel
{
    public static $properties = [
        'description',
        'headquarters',
        'homepage',
        'id',
        'logo_path',
        'name',
        'parent_company'
    ];
    private $description;
    private $headquarters;
    private $homepage;
    private $id;
    private $logo;
    private $logoPath;
    private $name;
    private $parentCompany;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeadquarters()
    {
        return $this->headquarters;
    }

    /**
     * @param mixed $headquarters
     * @return $this
     */
    public function setHeadquarters($headquarters): self
    {
        $this->headquarters = $headquarters;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @param mixed $homepage
     * @return $this
     */
    public function setHomepage($homepage): self
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getId(): ?int
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

    /**
     * @param LogoImage $logo
     * @return $this
     */
    public function setLogoImage(LogoImage $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getLogoImage(): ?\Tmdb\Model\Image\LogoImage
    {
        return $this->logo;
    }

    /**
     * @return mixed
     */
    public function getLogoPath()
    {
        return $this->logoPath;
    }

    /**
     * @param mixed $logoPath
     * @return $this
     */
    public function setLogoPath($logoPath): self
    {
        $this->logoPath = $logoPath;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentCompany()
    {
        return $this->parentCompany;
    }

    /**
     * @param mixed $parentCompany
     * @return $this
     */
    public function setParentCompany($parentCompany): self
    {
        $this->parentCompany = $parentCompany;

        return $this;
    }
}
