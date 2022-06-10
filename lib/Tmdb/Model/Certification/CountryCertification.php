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

namespace Tmdb\Model\Certification;

use Tmdb\Model\AbstractModel;

/**
 * Class CountryCertification
 * @package Tmdb\Model\Certification
 */
class CountryCertification extends AbstractModel
{
    public static $properties = [
        'certification',
        'meaning',
        'order',
    ];
    /**
     * @var string
     */
    private $certification;
    /**
     * @var string
     */
    private $meaning;
    /**
     * @var integer
     */
    private $order;

    public function getCertification(): string
    {
        return $this->certification;
    }

    /**
     * @param string $certification
     * @return $this
     */
    public function setCertification($certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    public function getMeaning(): string
    {
        return $this->meaning;
    }

    /**
     * @param string $meaning
     * @return $this
     */
    public function setMeaning($meaning): self
    {
        $this->meaning = $meaning;

        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return $this
     */
    public function setOrder($order): self
    {
        $this->order = $order;

        return $this;
    }
}
