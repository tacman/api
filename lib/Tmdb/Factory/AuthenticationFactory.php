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

namespace Tmdb\Factory;

use DateTime;
use RuntimeException;
use Tmdb\Model\AbstractModel;
use Tmdb\Token\Session\GuestSessionToken;
use Tmdb\Token\Session\RequestToken;
use Tmdb\Token\Session\SessionToken;

/**
 * Class AuthenticationFactory
 * @package Tmdb\Factory
 */
class AuthenticationFactory extends AbstractFactory
{
    /**
     * @param array $data
     *
     * @throws RuntimeException
     */
    public function create(array $data = []): ?AbstractModel
    {
        throw new RuntimeException(sprintf(
            'Class "%s" does not support method "%s".',
            __CLASS__,
            __METHOD__
        ));
    }

    /**
     * @param array $data
     *
     * @throws RuntimeException
     */
    public function createCollection(array $data = []): ?AbstractModel
    {
        throw new RuntimeException(sprintf(
            'Class "%s" does not support method "%s".',
            __CLASS__,
            __METHOD__
        ));
    }

    /**
     * Create request token
     *
     * @param array $data
     */
    public function createRequestToken(array $data = []): \Tmdb\Token\Session\RequestToken
    {
        $token = new RequestToken();

        if (array_key_exists('expires_at', $data)) {
            $token->setExpiresAt(new DateTime($data['expires_at']));
        }

        if (array_key_exists('request_token', $data)) {
            $token->setToken($data['request_token']);
        }

        if (array_key_exists('success', $data)) {
            $token->setSuccess($data['success']);
        }

        return $token;
    }

    /**
     * Create session token for user
     *
     * @param array $data
     */
    public function createSessionToken(array $data = []): \Tmdb\Token\Session\SessionToken
    {
        $token = new SessionToken();

        if (array_key_exists('session_id', $data)) {
            $token->setToken($data['session_id']);
        }

        if (array_key_exists('success', $data)) {
            $token->setSuccess($data['success']);
        }

        return $token;
    }

    /**
     * Create session token for guest
     *
     * @param array $data
     */
    public function createGuestSessionToken(array $data = []): \Tmdb\Token\Session\GuestSessionToken
    {
        $token = new GuestSessionToken();

        if (array_key_exists('expires_at', $data)) {
            $token->setExpiresAt(new DateTime($data['expires_at']));
        }

        if (array_key_exists('guest_session_id', $data)) {
            $token->setToken($data['guest_session_id']);
        }

        if (array_key_exists('success', $data)) {
            $token->setSuccess($data['success']);
        }

        return $token;
    }
}
