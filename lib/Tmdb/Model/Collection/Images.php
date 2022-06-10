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

use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Filter\ImageFilter;
use Tmdb\Model\Image;

/**
 * Class Images
 * @package Tmdb\Model\Collection
 */
class Images extends GenericCollection
{
    /**
     * Returns all images
     */
    public function getImages(): array
    {
        return $this->data;
    }

    /**
     * Retrieve a image from the collection
     *
     * @param $id
     */
    public function getImage($id): ?\Tmdb\Model\AbstractModel
    {
        return $this->filterId($id);
    }

    /**
     * Add a image to the collection
     *
     * @param Image $image
     *
     * @return void
     */
    public function addImage(Image $image): void
    {
        $this->add(null, $image);
    }

    /**
     * Filter poster images
     */
    public function filterPosters(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) {
                if ($value instanceof ImageFilter && $value instanceof Image\PosterImage) {
                    return true;
                }
            }
        );
    }

    /**
     * Filter backdrop images
     */
    public function filterBackdrops(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) {
                if ($value instanceof ImageFilter && $value instanceof Image\BackdropImage) {
                    return true;
                }
            }
        );
    }

    /**
     * Filter profile images
     */
    public function filterProfile(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) {
                if ($value instanceof ImageFilter && $value instanceof Image\ProfileImage) {
                    return true;
                }
            }
        );
    }

    /**
     * Filter still images
     */
    public function filterStills(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) {
                if ($value instanceof ImageFilter && $value instanceof Image\StillImage) {
                    return true;
                }
            }
        );
    }

    /**
     * Filter by image size
     *
     * @param $width
     */
    public function filterMaxWidth($width): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) use ($width) {
                if ($value instanceof ImageFilter && $value->getWidth() <= $width && $value->getWidth() !== null) {
                    return true;
                }
            }
        );
    }

    /**
     * Filter by image size
     *
     * @param $width
     */
    public function filterMinWidth($width): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) use ($width) {
                if ($value instanceof ImageFilter && $value->getWidth() >= $width && $value->getWidth() !== null) {
                    return true;
                }
            }
        );
    }

    /**
     * Filter by image size
     *
     * @param $height
     */
    public function filterMaxHeight($height): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) use ($height) {
                if (
                    $value instanceof ImageFilter &&
                    $value->getHeight() <= $height && $value->getHeight() !== null
                ) {
                    return true;
                }
            }
        );
    }

    /**
     * Filter by image size
     *
     * @param $height
     */
    public function filterMinHeight($height): \Tmdb\Model\Common\GenericCollection
    {
        return $this->filter(
            function ($key, $value) use ($height) {
                if (
                    $value instanceof ImageFilter &&
                    $value->getHeight() >= $height &&
                    $value->getHeight() !== null
                ) {
                    return true;
                }
            }
        );
    }

    /**
     * Return a single image that is rated highest
     *
     * @return ImageFilter|null
     */
    public function filterBestVotedImage(): ?\Tmdb\Model\Filter\ImageFilter
    {
        $currentImage = null;
        $voteAverage = -1;

        /**
         * @var $image Image
         */
        foreach ($this->data as $image) {
            if ($image->getVoteAverage() > $voteAverage) {
                $voteAverage = $image->getVoteAverage();
                $currentImage = $image;
            }
        }

        return $currentImage;
    }
}
