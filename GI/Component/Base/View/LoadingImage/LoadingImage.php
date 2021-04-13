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
namespace GI\Component\Base\View\LoadingImage;

use GI\DOM\HTML\Element\Image\Image;
use GI\Component\Base\View\ResourceRenderer\Core\Core;

use GI\Component\Base\View\ResourceRenderer\Core\CoreInterface;

class LoadingImage extends Image implements LoadingImageInterface
{
    const DEFAULT_GI_ID = 'loading-image';


    /**
     * @var CoreInterface
     */
    private $resourceRenderer;

    /**
     * @var string
     */
    private $giId = '';


    /**
     * LoadingImage constructor.
     * @param string $giId
     * @throws \Exception
     */
    public function __construct(string $giId = '')
    {
        $this->giId = $giId;

        $this->resourceRenderer = $this->giGetDi(CoreInterface::class, Core::class);
        $src = $this->resourceRenderer->getLoading();

        parent::__construct($src);

        $this->hide();
    }

    /**
     * @return CoreInterface
     */
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @param string $giId
     * @return static
     */
    protected function setGiId(string $giId)
    {
        $this->giId = $giId;

        return $this;
    }

    /**
     * @return string
     */
    public function getGiId()
    {
        return empty($this->giId) ? static::DEFAULT_GI_ID : $this->giId;
    }
}