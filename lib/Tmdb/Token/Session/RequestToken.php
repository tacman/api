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

namespace Tmdb\Token\Session;

use DateTime;

/**
 * Class RequestToken
 * @package Tmdb
 */
class RequestToken
{
    /**
     * The token for obtaining a session
     *
     * @var string|null
     */
    private $token;

    /**
     * Expiry date UTC
     *
     * @var \DateTime
     */
    private $expiresAt;

    /**
     * @var bool
     */
    private $success;

    /**
     * Token bag
     *
     * @param string|null $requestToken
     */
    public function __construct($requestToken = null)
    {
        $this->token = $requestToken;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     * @return $this
     */
    public function setToken(string $token = null): self
    {
        $this->token = $token;

        return $this;
    }

    public function getExpiresAt(): \DateTime
    {
        return $this->expiresAt;
    }

    /**
     * @param DateTime|string $expiresAt
     * @return $this
     */
    public function setExpiresAt($expiresAt): self
    {
        if (!$expiresAt instanceof DateTime) {
            $expiresAt = new DateTime($expiresAt);
        }

        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     * @return $this
     */
    public function setSuccess(bool $success): self
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->token;
    }
}
