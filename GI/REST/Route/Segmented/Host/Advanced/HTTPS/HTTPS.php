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
namespace GI\REST\Route\Segmented\Host\Advanced\HTTPS;

use GI\REST\Route\Segmented\Host\Advanced\AbstractAdvanced;

use GI\REST\Route\Simple\Protocol\HTTPS\HTTPSInterface as ProtocolInterface;
use GI\REST\Route\Segmented\Behaviour\Constraint\ConstraintsInterface;

class HTTPS extends AbstractAdvanced implements HTTPSInterface
{
    /**
     * HTTPS constructor.
     * @param string $template
     * @param ConstraintsInterface|null $constraints
     * @throws \Exception
     */
    public function __construct(string $template, ConstraintsInterface $constraints = null)
    {
        parent::__construct($template, $constraints);

        $this->getChain()->setHTTPSProtocol();
    }

    /**
     * @return ProtocolInterface
     */
    public function getProtocolRoute()
    {
        /** @var ProtocolInterface $result */
        $result = $this->getChain()->getProtocol();

        return $result;
    }
}