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

use Tmdb\Model\Credits\Media;

/**
 * Class Credits
 * @package Tmdb\Model
 */
class Credits extends AbstractModel
{
    /**
     * @var array
     */
    public static $properties = [
        'credit_type',
        'department',
        'job',
        'media_type',
        'id',
    ];
    /**
     * @var string
     */
    private $creditType;
    /**
     * @var string
     */
    private $department;
    /**
     * @var string
     */
    private $job;
    /**
     * @var Media
     */
    private $media;
    /**
     * @var string
     */
    private $mediaType;
    /**
     * @var string
     */
    private $id;
    /**
     * @var Person
     */
    private $person;

    public function __construct()
    {
        $this->media = new Media();
    }

    public function getCreditType(): string
    {
        return $this->creditType;
    }

    /**
     * @param string $creditType
     * @return $this
     */
    public function setCreditType($creditType): self
    {
        $this->creditType = $creditType;

        return $this;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     * @return $this
     */
    public function setDepartment($department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     * @return $this
     */
    public function setJob($job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getMedia(): \Tmdb\Model\Credits\Media
    {
        return $this->media;
    }

    /**
     * @param Media $media
     * @return $this
     */
    public function setMedia($media): self
    {
        $this->media = $media;

        return $this;
    }

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     * @return $this
     */
    public function setMediaType($mediaType): self
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getPerson(): \Tmdb\Model\Person
    {
        return $this->person;
    }

    /**
     * @param Person $person
     * @return $this
     */
    public function setPerson($person): self
    {
        $this->person = $person;

        return $this;
    }
}
