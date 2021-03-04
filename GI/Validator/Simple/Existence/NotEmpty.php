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
namespace GI\Validator\Simple\Existence;

use GI\Validator\Simple\Base\AbstractSimple;
use GI\Validator\I18n\DefaultMessages;
use GI\Validator\I18n\Glossary\Glossary;

use GI\Validator\I18n\Glossary\GlossaryInterface;

class NotEmpty extends AbstractSimple implements NotEmptyInterface
{
    /**
     * NotEmpty constructor.
     * @param string $validatedParam
     */
    public function __construct(string $validatedParam = '')
    {
        parent::__construct($validatedParam);

        $this->setRequired(true);
    }

    /**
     * @return bool
     */
    protected function doValidation()
    {
        return !empty($this->getSource());
    }

    /**
     * @return string
     */
    protected function getMessage()
    {
        return $this->giTranslate(
            GlossaryInterface::class, Glossary::class,DefaultMessages::NOT_EMPTY
        );
    }
}