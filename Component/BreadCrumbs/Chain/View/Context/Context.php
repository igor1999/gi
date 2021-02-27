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
namespace GI\Component\BreadCrumbs\Chain\View\Context;

use GI\Component\BreadCrumbs\Base\View\Context\AbstractContext as Base;
use GI\Pattern\Validation\ValidationTrait;

class Context extends Base implements ContextInterface
{
    use ValidationTrait;


    const DEFAULT_SEPARATOR = '&raquo;';


    /**
     * @return string
     */
    public function getSeparator()
    {
        return self::DEFAULT_SEPARATOR;
    }

    /**
     * @validate
     * @throws \Exception
     */
    protected function validateSeparator()
    {
        if (empty($this->getSeparator())) {
            $this->giThrowIsEmptyException('Separator');
        }
    }
}