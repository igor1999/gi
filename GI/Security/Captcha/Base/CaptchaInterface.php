<?php
/*
 * This file is part of PHP-framework GI.
 *
 * PHP-framework GI is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PHP-framework GI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PHP-framework GI. If not, see <https://www.gnu.org/licenses/>.
 */
namespace GI\Security\Captcha\Base;

use GI\SessionExchange\BaseInterface\Aware\DefaultCacheClassAwareInterface;

interface CaptchaInterface extends DefaultCacheClassAwareInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getValue();

    /**
     * @return \DateTime
     */
    public function getExpires();

    /**
     * @return int
     */
    public function getExpirationTime();

    /**
     * @return static
     * @throws \Exception
     */
    public function generate();

    /**
     * @param string $id
     * @param mixed $value
     * @return bool
     */
    public function validate(string $id, $value);

    /**
     * @param string $id
     * @return bool
     */
    public function remove(string $id);
}