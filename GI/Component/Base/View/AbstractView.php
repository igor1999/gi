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
namespace GI\Component\Base\View;

use GI\Markup\Renderer\AbstractRenderer;
use GI\Component\Base\View\LoadingImage\LoadingImage;

use GI\Component\Base\View\ClientAttributes\ClientAttributesTrait;
use GI\Component\Base\View\Relations\RelationsAwareTrait;
use GI\Component\Base\View\ServerData\ServerDataAwareTrait;

use GI\Component\Base\View\LoadingImage\LoadingImageInterface;

abstract class AbstractView extends AbstractRenderer implements ViewInterface
{
    use ClientAttributesTrait, RelationsAwareTrait, ServerDataAwareTrait;


    const CLIENT_JS  = '';

    const CLIENT_CSS = '';


    /**
     * @return string
     */
    public function getClientJSClass()
    {
        return static::CLIENT_JS;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function renderRelationList()
    {
        return $this->getRelationList()->toString();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function renderServerDataList()
    {
        return $this->getServerDataList()->toString();
    }

    /**
     * @param string $giId
     * @return LoadingImageInterface
     * @throws \Exception
     */
    public function createLoadingImage(string $giId = '')
    {
        try {
            $image = $this->getGiServiceLocator()->getDependency(LoadingImageInterface::class);
        } catch (\Exception $exception) {
            $image = new LoadingImage();
        }

        $this->addClientAttributes($image);

        return $image;
    }
}