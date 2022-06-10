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

namespace Tmdb\Model\Common;

use Tmdb\Model\Filter\CountryFilter;
use Tmdb\Model\Filter\LanguageFilter;

/**
 * Class Translation
 * @package Tmdb\Model\Common
 */
class Translation extends SpokenLanguage implements CountryFilter, LanguageFilter
{
    public static $properties = [
        'iso_3166_1',
        'iso_639_1',
        'name',
        'english_name',
        'data'
    ];
    private $iso31661;
    private $englishName;
    private $data;

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

    public function getEnglishName(): ?string
    {
        return $this->englishName;
    }

    /**
     * @param string $englishName
     * @return $this
     */
    public function setEnglishName($englishName): self
    {
        $this->englishName = $englishName;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return $this
     */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }
}
