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
namespace GI\Component\Base\Gate\Usecase;

use GI\Component\Base\Gate\AbstractGate;

use GI\Component\Layout\LayoutInterface;
use GI\Component\Base\ComponentInterface;

abstract class AbstractUsecase extends AbstractGate implements UsecaseInterface
{
    /**
     * @return LayoutInterface
     */
    abstract protected function getLayout();

    /**
     * @return ComponentInterface
     */
    abstract protected function createUsecase();

    /**
     * @return static
     */
    protected function dispatchIfOK()
    {
        $usecase = $this->createUsecase();

        $this->getCall()->setResponseToSimple($usecase);

        return $this;
    }

    /**
     * @return static
     * @throws \Throwable
     */
    public function dispatch()
    {
        try {
            $this->dispatchIfOK();
        } catch (\Throwable $throwable) {
            $this->handleError($throwable);
        }

        return $this;
    }
}