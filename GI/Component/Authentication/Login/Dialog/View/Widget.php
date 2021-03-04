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
namespace GI\Component\Authentication\Login\Dialog\View;

use GI\Component\Dialog\View\AbstractWidget;
use GI\REST\Constants\RequestMethods;
use GI\Component\Authentication\Login\Dialog\I18n\Glossary;

use GI\Component\Authentication\Login\Dialog\I18n\GlossaryInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Input\Text\TextInterface;
use GI\DOM\HTML\Element\Input\Text\PasswordInterface;
use GI\DOM\HTML\Element\Input\Logical\CheckboxInterface;
use GI\DOM\HTML\Element\TextContainer\Label\LabelInterface;
use GI\DOM\HTML\Element\Div\DivInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;

class Widget extends AbstractWidget implements WidgetInterface
{
    use ContentsTrait;


    const CLIENT_JS        = 'gi-authentication-login-dialog';

    const CLIENT_CSS       = self::CLIENT_JS;

    const SAVE_CHECKBOX_ID = 'save-checkbox';

    const SAVE_LABEL       = 'remember me';


    const SUCCESS_MESSAGE_KEY  = 'success-message';

    const SUCCESS_MESSAGE      = 'You have a successfully login. Please wait a moment...';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->resourceRenderer = $this->giGetDi(
            ResourceRendererInterface::class, ResourceRenderer::class
        );

        $this->setTitleText($this->giTranslate(GlossaryInterface::class, Glossary::class, 'Login'))
            ->setModality(false);
    }

    /**
     * @return ResourceRendererInterface
     */
    protected function getResourceRenderer()
    {
        return $this->resourceRenderer;
    }

    /**
     * @return static
     * @throws \Exception
     */
    protected function build()
    {
        parent::build();

        $this->saveLabel->getAttributes()->setFor($this->saveCheckbox->getAttributes()->getId());

        $message = $this->giTranslate(
            GlossaryInterface::class, Glossary::class, static::SUCCESS_MESSAGE
        );
        $this->getServerDataList()->set(static::SUCCESS_MESSAGE_KEY, $message);

        $this->form
            ->build(5, 1)
            ->set(0, 0, $this->loginTextbox)
            ->set(1, 0, $this->passwordTextbox)
            ->set(3, 0, $this->submitButton)
            ->set(4, 0, $this->resultMessageContainer)
            ->getLayout()
            ->toggleCellFloat(3, 0, false);

        if ($this->hasCookie) {
            $this->form->set(2, 0, [$this->saveCheckbox, $this->saveLabel]);
        }

        $this->getContent()->getChildNodes()->set($this->form);

        return $this;
    }

    /**
     * @gi-id form
     * @return FormLayoutInterface
     */
    protected function createForm()
    {
        $this->form = $this->giGetDOMFactory()->createFormLayout(RequestMethods::POST, $this->loginCheckAction);

        return $this->form;
    }

    /**
     * @gi-id login-textbox
     * @return TextInterface
     */
    protected function createLoginTextbox()
    {
        $this->loginTextbox = $this->giGetDOMFactory()->getInputFactory()->createText(
            $this->getViewModel()->getLoginName()
        );

        $this->loginTextbox->getAttributes()->setPlaceholder(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'login')
        );

        return $this->loginTextbox;
    }

    /**
     * @gi-id password-textbox
     * @return PasswordInterface
     */
    protected function createPasswordTextbox()
    {
        $this->passwordTextbox = $this->giGetDOMFactory()->getInputFactory()->createPassword(
            $this->getViewModel()->getPasswordName()
        );

        $this->passwordTextbox->getAttributes()->setPlaceholder(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, 'password')
        );

        return $this->passwordTextbox;
    }

    /**
     * @gi-id save-checkbox
     * @return CheckboxInterface
     */
    protected function createSaveCheckbox()
    {
        $this->saveCheckbox = $this->giGetDOMFactory()->getInputFactory()->createCheckbox(
            $this->getViewModel()->getSaveName(), 1
        );

        $this->addObjectSpecifiedId($this->saveCheckbox, static::SAVE_CHECKBOX_ID);

        return $this->saveCheckbox;
    }

    /**
     * @gi-id save-label
     * @return LabelInterface
     */
    protected function createSaveLabel()
    {
        $this->saveLabel = $this->giGetDOMFactory()->createLabel(
            $this->giTranslate(GlossaryInterface::class, Glossary::class, static::SAVE_LABEL)
        );

        return $this->saveLabel;
    }

    /**
     * @gi-id submit-button
     * @return SubmitInterface
     */
    protected function createSubmitButton()
    {
        $this->submitButton = $this->giGetDOMFactory()->getInputFactory()->createSubmit(
            [], $this->giTranslate(GlossaryInterface::class, Glossary::class, 'login!')
        );

        return $this->submitButton;
    }

    /**
     * @gi-id result-message-container
     * @return DivInterface
     */
    protected function createResultMessageContainer()
    {
        $this->resultMessageContainer = $this->giGetDOMFactory()->createDiv();

        return $this->resultMessageContainer;
    }
}