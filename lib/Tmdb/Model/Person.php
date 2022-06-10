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

use DateTime;
use Tmdb\Model\Collection\CreditsCollection;
use Tmdb\Model\Collection\CreditsCollection\CombinedCredits;
use Tmdb\Model\Collection\CreditsCollection\MovieCredits;
use Tmdb\Model\Collection\CreditsCollection\TvCredits;
use Tmdb\Model\Collection\Images;
use Tmdb\Model\Collection\People\PersonInterface;
use Tmdb\Model\Common\ExternalIds;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Image\ProfileImage;

/**
 * Class Person
 * @package Tmdb\Model
 */
class Person extends AbstractModel implements PersonInterface
{
    public static $properties = [
        'adult',
        'also_known_as',
        'biography',
        'birthday',
        'deathday',
        'homepage',
        'id',
        'name',
        'place_of_birth',
        'profile_path',
        'gender',
        'imdb_id',
        'popularity'
    ];

    /**
     * @var Common\GenericCollection
     */
    protected $knownFor;
    /**
     * @var MovieCredits
     */
    protected $movieCredits;
    /**
     * @var TvCredits
     */
    protected $tvCredits;
    /**
     * @var CombinedCredits
     */
    protected $combinedCredits;
    /**
     * @var Collection\Images
     */
    protected $images;
    /**
     * @var Common\GenericCollection
     */
    protected $changes;
    /**
     * External Ids
     *
     * @var ExternalIds
     */
    protected $externalIds;
    /**
     * @var GenericCollection
     */
    protected $taggedImages;
    protected $gender = 0;
    /**
     * @var bool
     */
    private $adult;
    /**
     * @var array
     */
    private $alsoKnownAs = [];
    /**
     * @var string
     */
    private $biography;
    /**
     * @var DateTime
     */
    private $birthday;
    /**
     * @var DateTime|boolean
     */
    private $deathday;
    /**
     * @var string
     */
    private $homepage;
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $knownForDepartment;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $placeOfBirth;
    /**
     * @var string
     */
    private $profilePath;
    /**
     * @var string|null
     */
    private $imdbId;
    /**
     * @var ProfileImage
     */
    private $profileImage;
    /**
     * @var float
     */
    private $popularity;

    /**
     * Constructor
     *
     * Set all default collections
     */
    public function __construct()
    {
        $this->movieCredits = new MovieCredits();
        $this->tvCredits = new TvCredits();
        $this->combinedCredits = new CombinedCredits();
        $this->images = new Images();
        $this->changes = new GenericCollection();
        $this->externalIds = new ExternalIds();
        $this->knownFor = new GenericCollection();
    }

    public function getAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param boolean $adult
     * @return $this
     */
    public function setAdult($adult): self
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAlsoKnownAs(): array
    {
        return $this->alsoKnownAs;
    }

    /**
     * @param array $alsoKnownAs
     * @return $this
     */
    public function setAlsoKnownAs($alsoKnownAs): self
    {
        $this->alsoKnownAs = $alsoKnownAs;

        return $this;
    }

    public function getBiography(): string
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     * @return $this
     */
    public function setBiography($biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getBirthday(): \DateTime
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     * @return $this
     */
    public function setBirthday($birthday): self
    {
        if (!$birthday instanceof DateTime && !empty($birthday)) {
            if (ctype_digit($birthday) && strlen(4)) {
                $birthday = DateTime::createFromFormat(
                    'Y-m-d',
                    sprintf('%d-01-01', $birthday),
                    new \DateTimeZone('UTC')
                );
            } elseif (strtotime($birthday) === false) {
                $birthday = DateTime::createFromFormat('Y-d-m', $birthday);
            } else {
                $birthday = new DateTime($birthday);
            }
        }

        if (empty($birthday)) {
            $birthday = false;
        }

        $this->birthday = $birthday;

        return $this;
    }

    public function getChanges(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->changes;
    }

    /**
     * @param GenericCollection $changes
     * @return $this
     */
    public function setChanges(GenericCollection $changes): self
    {
        $this->changes = $changes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeathday()
    {
        return $this->deathday;
    }

    /**
     * @param mixed $deathday
     * @return $this
     */
    public function setDeathday($deathday): self
    {
        if (!$deathday instanceof DateTime && !empty($deathday)) {
            if (ctype_digit($deathday) && strlen(4)) {
                $deathday = DateTime::createFromFormat(
                    'Y-m-d',
                    sprintf('%d-01-01', $deathday),
                    new \DateTimeZone('UTC')
                );
            } elseif (strtotime($deathday) === false) {
                $deathday = DateTime::createFromFormat('Y-d-m', $deathday);
            } else {
                $deathday = new DateTime($deathday);
            }
        }

        if (empty($deathday)) {
            $deathday = false;
        }

        $this->deathday = $deathday;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    /**
     * @param string $homepage
     * @return $this
     */
    public function setHomepage($homepage): self
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = (int)$id;

        return $this;
    }

    public function getImages(): \Tmdb\Model\Collection\Images
    {
        return $this->images;
    }

    /**
     * @param Images $images
     * @return $this
     */
    public function setImages($images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string $knownForDepartment
     * @return $this
     */
    public function setKnownForDepartment($knownForDepartment): self
    {
        $this->knownForDepartment = $knownForDepartment;

        return $this;
    }

    public function getKnownForDepartment(): string
    {
        return $this->knownForDepartment;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPlaceOfBirth(): string
    {
        return $this->placeOfBirth;
    }

    /**
     * @param string $placeOfBirth
     * @return $this
     */
    public function setPlaceOfBirth($placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getProfilePath(): string
    {
        return $this->profilePath;
    }

    /**
     * @param string $profilePath
     * @return $this
     */
    public function setProfilePath($profilePath): self
    {
        $this->profilePath = $profilePath;

        return $this;
    }

    public function getProfileImage(): \Tmdb\Model\Image\ProfileImage
    {
        return $this->profileImage;
    }

    /**
     * @param ProfileImage $profileImage
     * @return $this
     */
    public function setProfileImage(ProfileImage $profileImage): self
    {
        $this->profileImage = $profileImage;

        return $this;
    }

    public function getCombinedCredits(): \Tmdb\Model\Collection\CreditsCollection\CombinedCredits
    {
        return $this->combinedCredits;
    }

    /**
     * @param CombinedCredits $combinedCredits
     * @return $this
     */
    public function setCombinedCredits($combinedCredits): self
    {
        $this->combinedCredits = $combinedCredits;

        return $this;
    }

    public function getMovieCredits(): \Tmdb\Model\Collection\CreditsCollection\MovieCredits
    {
        return $this->movieCredits;
    }

    /**
     * @param MovieCredits $movieCredits
     * @return $this
     */
    public function setMovieCredits($movieCredits): self
    {
        $this->movieCredits = $movieCredits;

        return $this;
    }

    public function getTvCredits(): \Tmdb\Model\Collection\CreditsCollection\TvCredits
    {
        return $this->tvCredits;
    }

    /**
     * @param TvCredits $tvCredits
     * @return $this
     */
    public function setTvCredits($tvCredits): self
    {
        $this->tvCredits = $tvCredits;

        return $this;
    }

    public function getExternalIds(): \Tmdb\Model\Common\ExternalIds
    {
        return $this->externalIds;
    }

    /**
     * @param ExternalIds $externalIds
     * @return $this
     */
    public function setExternalIds($externalIds): self
    {
        $this->externalIds = $externalIds;

        return $this;
    }

    public function getTaggedImages(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->taggedImages;
    }

    /**
     * @param GenericCollection $taggedImages
     * @return $this
     */
    public function setTaggedImages($taggedImages): self
    {
        $this->taggedImages = $taggedImages;

        return $this;
    }

    public function getKnownFor(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->knownFor;
    }

    /**
     * @param GenericCollection $knownFor
     * @return $this
     */
    public function setKnownFor($knownFor): self
    {
        $this->knownFor = $knownFor;

        return $this;
    }

    public function isMale(): bool
    {
        return $this->gender === 2;
    }

    public function isFemale(): bool
    {
        return $this->gender === 1;
    }

    public function isUnknownGender(): bool
    {
        return $this->gender === 0;
    }

    /**
     * @param int $gender
     *
     * @return void
     */
    public function setGender($gender): void
    {
        $this->gender = (int)$gender;
    }

    public function getPopularity(): float
    {
        return $this->popularity;
    }

    /**
     * @param float $popularity
     *
     * @return void
     */
    public function setPopularity($popularity): void
    {
        $this->popularity = $popularity;
    }

    /**
     * @return string|null
     */
    public function getImdbId(): ?string
    {
        return $this->imdbId;
    }

    /**
     * @param string|null $imdbId
     */
    public function setImdbId(?string $imdbId): void
    {
        $this->imdbId = $imdbId;
    }
}
