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
namespace GI\Validator\Factory;

use GI\Pattern\Factory\FactoryInterface as BaseInterface;

use GI\Security\Captcha\Base\CaptchaInterface as SecureCaptchaInterface;

use GI\Validator\ValidatorInterface;

use GI\Validator\Simple\ArrayContents\InArrayInterface;
use GI\Validator\Simple\ArrayContents\NotInArrayInterface;

use GI\Validator\Simple\Comparison\GreaterThanInterface;
use GI\Validator\Simple\Comparison\GreaterThanOrEqualInterface;
use GI\Validator\Simple\Comparison\LessThanInterface;
use GI\Validator\Simple\Comparison\LessThanOrEqualInterface;

use GI\Validator\Simple\DateTime\DateInterface;
use GI\Validator\Simple\DateTime\DateHourMinuteInterface;
use GI\Validator\Simple\DateTime\DateTimeInterface;
use GI\Validator\Simple\DateTime\HourMinuteInterface;
use GI\Validator\Simple\DateTime\TimeInterface;
use GI\Validator\Simple\DateTime\YearInterface;
use GI\Validator\Simple\DateTime\YearMonthInterface;

use GI\Validator\Simple\Email\EmailInterface;
use GI\Validator\Simple\Email\EmailsIdenticalInterface;

use GI\Validator\Simple\Existence\ExistenceInterface;
use GI\Validator\Simple\Existence\NotEmptyInterface;

use GI\Validator\Simple\FileContents\FileMimeTypesInterface;
use GI\Validator\Simple\FileContents\MaxFileSizeInterface;

use GI\Validator\Simple\Identity\IsIdenticalInterface;
use GI\Validator\Simple\Identity\IsNotIdenticalInterface;

use GI\Validator\Simple\Password\PasswordLengthMaxInterface;
use GI\Validator\Simple\Password\PasswordLengthMinInterface;
use GI\Validator\Simple\Password\PasswordsIdenticalInterface;
use GI\Validator\Simple\Password\SpecificPasswordFormatInterface;

use GI\Validator\Simple\Policy\LegalPolicyInterface;

use GI\Validator\Simple\Security\CaptchaInterface;

use GI\Validator\Simple\StringValidation\AlphaInterface;
use GI\Validator\Simple\StringValidation\AlphaNumericInterface;
use GI\Validator\Simple\StringValidation\DigitsInterface;
use GI\Validator\Simple\StringValidation\RegExpInterface;
use GI\Validator\Simple\StringValidation\StringLengthMaxInterface;
use GI\Validator\Simple\StringValidation\StringLengthMinInterface;
use GI\Validator\Simple\StringValidation\WordInterface;

use GI\Validator\Simple\TypeChecking\IsArrayInterface;
use GI\Validator\Simple\TypeChecking\IsFloatInterface;
use GI\Validator\Simple\TypeChecking\IsIntInterface;
use GI\Validator\Simple\TypeChecking\IsNumberInterface;
use GI\Validator\Simple\TypeChecking\IsObjectInterface;
use GI\Validator\Simple\TypeChecking\IsScalarInterface;

use GI\Validator\Simple\Web\IPInterface;
use GI\Validator\Simple\Web\URLInterface;

use GI\Validator\Container\Chain\ChainInterface;
use GI\Validator\Container\Recursive\RecursiveInterface;
use GI\Validator\Container\Map\MapInterface;

/**
 * Interface FactoryInterface
 * @package GI\Validator\Factory
 *
 * @method InArrayInterface createInArray(array $array, string $validatedParam = '')
 * @method NotInArrayInterface createNotInArray(array $array, string $validatedParam = '')
 *
 * @method GreaterThanInterface createGreaterThan(int $minimum, string $validatedParam = '')
 * @method GreaterThanOrEqualInterface createGreaterThanOrEqual(int $minimum, string $validatedParam = '')
 * @method LessThanInterface createLessThan(int $maximum, string $validatedParam = '')
 * @method LessThanOrEqualInterface createLessThanOrEqual($maximum, string $validatedParam = '')
 *
 * @method DateInterface createDate(string $validatedParam = '')
 * @method DateHourMinuteInterface createDateHourMinute(string $validatedParam = '')
 * @method DateTimeInterface createDateTime(string $validatedParam = '')
 * @method HourMinuteInterface createHourMinute(string $validatedParam = '')
 * @method TimeInterface createTime(string $validatedParam = '')
 * @method YearInterface createYear(string $validatedParam = '')
 * @method YearMonthInterface createYearMonth(string $validatedParam = '')
 *
 * @method EmailInterface createEmail(string $validatedParam = '')
 * @method EmailsIdenticalInterface createEmailsIdentical(\Closure $email2Finder, string $validatedParam = '')
 *
 * @method ExistenceInterface createExistence(string $validatedParam = '')
 * @method NotEmptyInterface createNotEmpty(string $validatedParam = '')
 *
 * @method FileMimeTypesInterface createFileMimeTypes(array $mimeTypes, string $validatedParam = '')
 * @method MaxFileSizeInterface createMaxFileSize(int $maxFileSize, string $validatedParam = '')
 *
 * @method IsIdenticalInterface createIsIdentical($token, string $validatedParam = '')
 * @method IsNotIdenticalInterface createIsNotIdentical($token, string $validatedParam = '')
 *
 * @method PasswordLengthMaxInterface createPasswordLengthMax(int $maximum, string $validatedParam = '')
 * @method PasswordLengthMinInterface createPasswordLengthMin(int $minimum, string $validatedParam = '')
 * @method PasswordsIdenticalInterface createPasswordsIdentical(\Closure $password2Finder, string $validatedParam = '')
 * @method SpecificPasswordFormatInterface createSpecificPasswordFormat(string $validatedParam = '')
 *
 * @method LegalPolicyInterface createLegalPolicy(string $validatedParam = '')
 *
 * @method CaptchaInterface createCaptcha(\Closure $idFinder, SecureCaptchaInterface $secureCaptcha, string $validatedParam = '')
 *
 * @method AlphaInterface createAlpha(string $validatedParam = '')
 * @method AlphaNumericInterface createAlphaNumeric(string $validatedParam = '')
 * @method DigitsInterface createDigits(string $validatedParam = '')
 * @method RegExpInterface createRegExp(string $regExp = '', string $validatedParam = '')
 * @method StringLengthMaxInterface createStringLengthMax(int $maximum, string $validatedParam = '')
 * @method StringLengthMinInterface createStringLengthMin(int $minimum, string $validatedParam = '')
 * @method WordInterface createWord(string $validatedParam = '')
 *
 * @method IsArrayInterface createIsArray(string $validatedParam = '')
 * @method IsFloatInterface createIsFloat(string $validatedParam = '')
 * @method IsIntInterface createIsInt(string $validatedParam = '')
 * @method IsNumberInterface createIsNumber(string $validatedParam = '')
 * @method IsObjectInterface createIsObject(string $validatedParam = '')
 * @method IsScalarInterface createIsScalar(string $validatedParam = '')
 *
 * @method IPInterface createIP(int $flags, string $validatedParam = '')
 * @method URLInterface createURL(int $flags, string $validatedParam = '')
 *
 * @method ChainInterface createChain(array $contents = [], string $validatedParam = '')
 * @method RecursiveInterface createRecursive(array $contents = [])
 * @method MapInterface createMap(ValidatorInterface $validator)
 */
interface FactoryInterface extends BaseInterface
{

}