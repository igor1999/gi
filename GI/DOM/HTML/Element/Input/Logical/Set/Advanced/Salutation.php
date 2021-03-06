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
namespace GI\DOM\HTML\Element\Input\Logical\Set\Advanced;

use GI\DOM\HTML\Element\Input\Logical\Set\AbstractSet;

use GI\ClientContents\Selection\Advanced\Salutation\SalutationInterface as OptionsInterface;

class Salutation extends AbstractSet implements SalutationInterface
{
    /**
     * @var OptionsInterface
     */
    private $options;


    /**
     * Salutation constructor.
     * @param array $commonName
     * @throws \Exception
     */
    public function __construct(array $commonName)
    {
        parent::__construct($commonName);

        $this->options = $this->getGiServiceLocator()->getClientSelectionFactory()->createSalutation();
    }

    /**
     * @return OptionsInterface
     */
    public function getOptions()
    {
        return $this->options;
    }
}