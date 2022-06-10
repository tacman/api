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
 * Class Crew
 * @package Tmdb\Model\Collection\People
 */
class Crew extends People
{
    /**
     * Returns all people
     *
     * @return Person[]
     */
    public function getCrew(): array
    {
        return parent::getPeople();
    }

    /**
     * Retrieve a crew member from the collection
     *
     * @param $id
     */
    public function getCrewMember($id): ?\Tmdb\Model\Collection\People\PersonInterface
    {
        return parent::getPerson($id);
    }
}
