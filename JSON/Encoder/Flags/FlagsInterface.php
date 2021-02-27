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
namespace GI\JSON\Encoder\Flags;

use GI\JSON\Base\Flags\FlagsInterface as BaseInterface;

/**
 * Interface EncodeInterface
 * @package GI\JSON\Encode\Flags
 *
 * @method bool getJsonForceObject()
 * @method FlagsInterface setJsonForceObject(bool $flag)
 *
 * @method bool getJsonHexQuot()
 * @method FlagsInterface setJsonHexQuot(bool $flag)
 *
 * @method bool getJsonHexTag()
 * @method FlagsInterface setJsonHexTag(bool $flag)
 *
 * @method bool getJsonHexAmp()
 * @method FlagsInterface setJsonHexAmp(bool $flag)
 *
 * @method bool getJsonHexApos()
 * @method FlagsInterface setJsonHexApos(bool $flag)
 *
 * @method bool getJsonInvalidUtf8Ignore()
 * @method FlagsInterface setJsonInvalidUtf8Ignore(bool $flag)
 *
 * @method bool getJsonInvalidUtf8Substitute()
 * @method FlagsInterface setJsonInvalidUtf8Substitute(bool $flag)
 *
 * @method bool getJsonNumericCheck()
 * @method FlagsInterface setJsonNumericCheck(bool $flag)
 *
 * @method bool getJsonPartialOutputOnError()
 * @method FlagsInterface setJsonPartialOutputOnError(bool $flag)
 *
 * @method bool getJsonPreserveZeroFraction()
 * @method FlagsInterface setJsonPreserveZeroFraction(bool $flag)
 *
 * @method bool getJsonPrettyPrint()
 * @method FlagsInterface setJsonPrettyPrint(bool $flag)
 *
 * @method bool getJsonUnescapedLineTerminators()
 * @method FlagsInterface setJsonUnescapedLineTerminators(bool $flag)
 *
 * @method bool getJsonUnescapedSlashes()
 * @method FlagsInterface setJsonUnescapedSlashes(bool $flag)
 *
 * @method bool getJsonUnescapedUnicode()
 * @method FlagsInterface setJsonUnescapedUnicode(bool $flag)
 *
 * @method bool getJsonThrowOnError()
 * @method FlagsInterface setJsonThrowOnError(bool $flag)
 */
interface FlagsInterface extends BaseInterface
{

}