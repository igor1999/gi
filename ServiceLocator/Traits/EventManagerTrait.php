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
namespace GI\ServiceLocator\Traits;

use GI\Event\Manager as EventManager;

use GI\Event\ManagerInterface as EventManagerInterface;

trait EventManagerTrait
{
    /**
     * @var EventManagerInterface
     */
    private $eventManager;


    /**
     * @return EventManagerInterface
     */
    protected function getEventManager()
    {
        if (!($this->eventManager instanceof EventManagerInterface)) {
            $this->eventManager = $this->createEventManager();
        }

        return $this->eventManager;
    }

    /**
     * @return EventManager
     */
    protected function createEventManager()
    {
        return new EventManager();
    }

    /**
     * @param EventManagerInterface $eventManager
     * @return static
     * @throws \Exception
     */
    public function mergeEvents(EventManagerInterface $eventManager)
    {
        $this->validateClosing();

        $this->getEventManager()->merge($eventManager);

        return $this;
    }

    /**
     * @param string $event
     * @param array $params
     * @return array
     */
    public function fireEvent(string $event, array $params = [])
    {
        return $this->getEventManager()->fire($event, $params);
    }
}