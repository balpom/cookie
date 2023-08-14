<?php

/**
 *  @file CookieInterface.php
 *
 *  The CookieInterface interface
 *  Forked from Platine\Cookie\CookieInterface
 *
 *  @package    Balpom\Cookie
 *  @version 1.0.0
 *  @filesource
 */
declare(strict_types=1);

namespace Balpom\Cookie;

/**
 * Value object representing a cookie.
 *
 * Instances of this interface are considered immutable; all methods that might
 * change state MUST be implemented such that they retain the internal state of
 * the current instance and return an instance that contains the changed state.
 */
interface CookieInterface
{
    /**
     * Same site policy "None"
     */
    public const SAME_SITE_NONE = 'None';

    /**
     * Same site policy "Lax"
     */
    public const SAME_SITE_LAX = 'Lax';

    /**
     * Same site policy "Strict"
     */
    public const SAME_SITE_STRICT = 'Strict';

    /**
     * Return the name of the cookie
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Return the value of the cookie
     * @return string
     */
    public function getValue(): string;

    /**
     * Return an instance with the specified value.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified value.
     *
     * @param string $value
     *
     * @return CookieInterface
     */
    public function withValue(string $value): self;

    /**
     * Return the max age of the cookie
     *
     * @return int
     */
    public function getMaxAge(): int;

    /**
     * Return the expires of the cookie
     *
     * @return int
     */
    public function getExpires(): int;

    /**
     * Check whether the cookie is expired
     *
     * @return bool
     */
    public function isExpired(): bool;

    /**
     * Return an instance that will expire immediately.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified expires.
     *
     * @return CookieInterface
     */
    public function expire(): self;

    /**
     * Return an instance with the specified expires.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified expires.
     *
     * The `$expire` value can be an `DateTimeInterface` instance,
     * a string representation of a date, or a integer Unix timestamp, or `null`.
     *
     * If the `$expire` was not specified or has an empty value,
     * the cookie MUST be converted to a session cookie,
     * which will expire as soon as the browser is closed.
     *
     *
     * @param int|string|\DateTimeInterface|null $expire
     *
     * @return CookieInterface
     */
    public function withExpires($expire = null): self;

    /**
     * Return the domain of the cookie
     *
     * @return string
     */
    public function getDomain(): ?string;

    /**
     * Return an instance with the specified set of domains.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified set of domains.
     *
     * @param string|null $domain
     *
     * @return CookieInterface
     */
    public function withDomain(?string $domain): self;

    /**
     * Return the path of the cookie
     *
     * @return string
     */
    public function getPath(): ?string;

    /**
     * Return an instance with the specified set of paths.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified set of paths.
     *
     * @param string|null $path
     *
     * @return CookieInterface
     */
    public function withPath(?string $path): self;

    /**
     * Whether the cookie should only be transmitted over a secure HTTPS connection.
     *
     * @return bool
     */
    public function isSecure(): bool;

    /**
     * Return an instance with the specified enabling or
     * disabling cookie transmission over a secure HTTPS connection.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified security flag.
     *
     * @param bool $secure
     *
     * @return CookieInterface
     */
    public function withSecure(bool $secure = true): self;

    /**
     * Whether the cookie should only be accessed through the HTTP protocol.
     *
     * @return bool
     */
    public function isHttpOnly(): bool;

    /**
     * Return an instance with the specified enable or
     * disable cookie transmission over the HTTP protocol only.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified httpOnly flag.
     *
     * @param bool $httpOnly
     *
     * @return CookieInterface
     */
    public function withHttpOnly(bool $httpOnly = true): self;

    /**
     * Return the path of the cookie
     *
     * @return string
     */
    public function getSameSite(): ?string;

    /**
     * Return an instance with the specified SameSite attribute.
     *
     * This method MUST retain the state of the current instance,
     * and return a new instance that contains the specified same site attribute.
     *
     * @param string|null $sameSite
     *
     * @return CookieInterface
     */
    public function withSameSite(?string $sameSite): self;

    /**
     * Whether this cookie is a session cookie.
     *
     * @return bool
     */
    public function isSession(): bool;

    /**
     * Return the string representation of this cookie
     *
     * @return string
     */
    public function __toString(): string;
}
