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

namespace Tmdb\Model\Collection\People;

use Tmdb\Model\Collection\People;
use Tmdb\Model\Person;

/**
 * Class GuestStars
 * @package Tmdb\Model\Collection\People
 */
class GuestStars extends People
{
    /**
     * Returns all people
     *
     * @return Person[]
     */
    public function getGuestStars(): array
    {
        return parent::getPeople();
    }

    /**
     * Retrieve a cast member from the collection
     *
     * @param $id
     */
    public function getGuestStar($id): ?\Tmdb\Model\Collection\People\PersonInterface
    {
        return parent::getPerson($id);
    }
}
