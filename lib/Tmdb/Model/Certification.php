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
 * Class Certification
 * @package Tmdb\Model
 */
class Certification extends AbstractModel
{
    public static $properties = [
        'country',
    ];
    /**
     * @var string
     */
    private $country;
    /**
     * @var GenericCollection
     */
    private $certifications;

    public function __construct()
    {
        $this->certifications = new GenericCollection();
    }

    public function getCertifications(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->certifications;
    }

    /**
     * @param GenericCollection $certifications
     * @return $this
     */
    public function setCertifications($certifications): self
    {
        $this->certifications = $certifications;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country): self
    {
        $this->country = $country;

        return $this;
    }
}
