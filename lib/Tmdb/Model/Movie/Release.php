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

namespace Tmdb\Model\Movie;

use DateTime;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Filter\CountryFilter;

/**
 * Class Release
 * @package Tmdb\Model\Movie
 * @deprecated Use ReleaseDate instead
 */
class Release extends AbstractModel implements CountryFilter
{
    public static $properties = [
        'iso_3166_1',
        'certification',
        'primary',
        'release_date'
    ];
    private $iso31661;
    private $certification;
    private $primary;
    private $releaseDate;

    /**
     * @return mixed
     */
    public function getCertification()
    {
        return $this->certification;
    }

    /**
     * @param mixed $certification
     * @return $this
     */
    public function setCertification($certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    public function getIso31661(): ?string
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

    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param string|DateTime|null $releaseDate
     * @return $this
     */
    public function setReleaseDate($releaseDate = null): self
    {
        if (!$releaseDate instanceof DateTime && $releaseDate !== null) {
            $releaseDate = new DateTime($releaseDate);
        }

        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @param mixed $primary
     * @return $this
     */
    public function setPrimary($primary): self
    {
        $this->primary = $primary;

        return $this;
    }
}
