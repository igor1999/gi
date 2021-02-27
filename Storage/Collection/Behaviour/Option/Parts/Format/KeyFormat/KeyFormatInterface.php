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
namespace GI\Storage\Collection\Behaviour\Option\Parts\Format\KeyFormat;

interface KeyFormatInterface
{
    const KEY_FORMAT_CAMEL_CASE_UCFIRST   = 'camel_case_ucfirst';

    const KEY_FORMAT_HYPHEN_UPPER_CASE    = 'hyphen_upper_case';

    const KEY_FORMAT_HYPHEN_LOWER_CASE    = 'hyphen_lower_case';

    const KEY_FORMAT_HYPHEN_UCFIRST       = 'hyphen_ucfirst';

    const KEY_FORMAT_UNDERLINE_UPPER_CASE = 'underline_upper_case';

    const KEY_FORMAT_UNDERLINE_LOWER_CASE = 'underline_lower_case';

    const KEY_FORMAT_UNDERLINE_UCFIRST    = 'underline_ucfirst';


    /**
     * @return string
     */
    public function getKeyFormat();

    /**
     * @return static
     */
    public function setKeyFormatToCamelCaseUcFirst();

    /**
     * @return static
     */
    public function setKeyFormatToHyphenUpperCase();

    /**
     * @return static
     */
    public function setKeyFormatToHyphenLowerCase();

    /**
     * @return static
     */
    public function setKeyFormatToHyphenUcFirst();

    /**
     * @return static
     */
    public function setKeyFormatToUnderlineUpperCase();

    /**
     * @return static
     */
    public function setKeyFormatToUnderlineLowerCase();

    /**
     * @return static
     */
    public function setKeyFormatToUnderlineUcFirst();
}