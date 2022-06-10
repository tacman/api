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

namespace Tmdb\Model\Common\QueryParameter;

/**
 * Class Language
 * @package Tmdb\Model\Common\QueryParameter
 */
class Language implements QueryParameterInterface
{
    private $language;

    public function __construct($language)
    {
        $this->language = $language;
    }

    public function getKey(): string
    {
        return 'language';
    }

    public function getValue(): string
    {
        return $this->language;
    }
}
