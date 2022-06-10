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

namespace Tmdb\Model\Collection;

use Tmdb\Model\Collection\People\Cast;
use Tmdb\Model\Collection\People\Crew;
use Tmdb\Model\Collection\People\GuestStars;

/**
 * Class CreditsCollection
 * @package Tmdb\Model\Collection
 */
class CreditsCollection
{
    /**
     * @var Cast
     */
    public $cast;

    /**
     * @var Crew
     */
    private $crew;


    private $guestStars;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cast = new Cast();
        $this->crew = new Crew();
        $this->guestStars = new GuestStars();
    }

    public function getCast(): \Tmdb\Model\Collection\People\Cast
    {
        return $this->cast;
    }

    /**
     * @param Cast $cast
     * @return $this
     */
    public function setCast(Cast $cast): self
    {
        $this->cast = $cast;

        return $this;
    }

    public function getCrew(): \Tmdb\Model\Collection\People\Crew
    {
        return $this->crew;
    }

    /**
     * @param Crew $crew
     * @return $this
     */
    public function setCrew(Crew $crew): self
    {
        $this->crew = $crew;

        return $this;
    }

    public function getGuestStars(): \Tmdb\Model\Collection\People\GuestStars
    {
        return $this->guestStars;
    }

    /**
     * @param GuestStars $guestStars
     *
     * @return void
     */
    public function setGuestStars($guestStars): void
    {
        $this->guestStars = $guestStars;
    }
}
