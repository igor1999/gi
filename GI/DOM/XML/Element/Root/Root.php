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
namespace GI\DOM\XML\Element\Root;

use GI\DOM\XML\Element\ContainerElement;

use GI\DOM\XML\Element\Root\Declaration\DeclarationInterface;

class Root extends ContainerElement implements RootInterface
{
    /**
     * @var DeclarationInterface
     */
    private $declaration;


    /**
     * Root constructor.
     * @param string $tag
     * @param string $namespace
     * @throws \Exception
     */
    public function __construct(string $tag = '', string $namespace = '')
    {
        parent::__construct($tag, $namespace);

        $this->declaration = $this->getGiServiceLocator()->getDOMFactory()->createXMLDeclaration();
    }

    /**
     * @return DeclarationInterface
     */
    public function getDeclaration()
    {
        return $this->declaration;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        return $this->getDeclaration()->toString() . PHP_EOL . parent::toString();
    }
}