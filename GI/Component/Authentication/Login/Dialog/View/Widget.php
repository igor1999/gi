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

use GI\Component\Authentication\Login\Dialog\ViewModel\ViewModelInterface;
use GI\Component\Authentication\Login\Dialog\I18n\GlossaryInterface;
use GI\DOM\HTML\Element\Form\Layouts\Form\FormInterface as FormLayoutInterface;
use GI\DOM\HTML\Element\Input\Text\TextInterface;
use GI\DOM\HTML\Element\Input\Text\PasswordInterface;
use GI\DOM\HTML\Element\Input\Logical\CheckboxInterface;
use GI\DOM\HTML\Element\TextContainer\Label\LabelInterface;
use GI\DOM\HTML\Element\Input\Button\SubmitInterface;

/**
 * Class Widget
 * @package GI\Component\Authentication\Login\Dialog\View
 *
 * @method ViewModelInterface getViewModel()
 * @method WidgetInterface setViewModel(ViewModelInterface $viewModel)
 * @method bool isHasCookie()
 * @method WidgetInterface setHasCookie(bool $hasCookie)
 * @method string getLoginCheckAction()
 * @method WidgetInterface setLoginCheckAction(string $loginCheckAction)
 */
class Widget extends AbstractWidget implements WidgetInterface
{
    const CLIENT_JS        = 'gi-authentication-login-dialog';

    const CLIENT_CSS       = self::CLIENT_JS;

    const SAVE_CHECKBOX_ID = 'save-checkbox';

    const SAVE_LABEL       = 'remember me';


    /**
     * @var ResourceRendererInterface
     */
    private $resourceRenderer;

    /**
     * @var FormLayoutInterface
     */
    private $form;

    /**
     * @var TextInterface
     */
    private $loginTextbox;

    /**
     * @var PasswordInterface
     */
    private $passwordTextbox;

    /**
     * @var CheckboxInterface
     */
    private $saveCheckbox;

    /**
     * @var LabelInterface
     */
    private $saveLabel;

    /**
     * @var SubmitInterface
     */
    private $submitButton;


    /**
     * Widget constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $this->resourceRenderer = $this->getGiServiceLocator()->getDependency(
            ResourceRendererInterface::class, ResourceRenderer::class
        );

        $this->setTitleText($this->getGiServiceLocator()->translate(GlossaryInterface::class, Glossary::class, 'Login'))
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

        $this->form
            ->build(5, 2)
            ->set(0, 0, $this->loginTextbox)
            ->set(1, 0, $this->passwordTextbox)
            ->set(3, 0, $this->submitButton)
            ->set(3, 1, $this->createLoadingImage());

        if ($this->isHasCookie()) {
            $this->form->set(2, 0, [$this->saveCheckbox, $this->saveLabel]);
        }

        $this->getContent()->getChildNodes()->set($this->form);

        return $this;
    }

    /**
     * @gi-id form
     * @return FormLayoutInterface
     */
    protected function getForm()
    {
        if (!($this->form instanceof FormLayoutInterface)) {
            $this->form = $this->getGiServiceLocator()->getDOMFactory()->createFormLayout(
                RequestMethods::POST, $this->getLoginCheckAction()
            );
        }

        return $this->form;
    }

    /**
     * @gi-id login-textbox
     * @return TextInterface
     */
    protected function getLoginTextbox()
    {
        if (!($this->loginTextbox instanceof TextInterface)) {
            $this->loginTextbox = $this->getGiServiceLocator()->getDOMFactory()->getInputFactory()->createText(
                $this->getViewModel()->getLoginName()
            );

            $this->loginTextbox->getAttributes()->setPlaceholder(
                $this->getGiServiceLocator()->translate(GlossaryInterface::class, Glossary::class, 'login')
            );
        }

        return $this->loginTextbox;
    }

    /**
     * @gi-id password-textbox
     * @return PasswordInterface
     */
    protected function getPasswordTextbox()
    {
        if (!($this->passwordTextbox instanceof PasswordInterface)) {
            $this->passwordTextbox = $this->getGiServiceLocator()->getDOMFactory()->getInputFactory()->createPassword(
                $this->getViewModel()->getPasswordName()
            );

            $this->passwordTextbox->getAttributes()->setPlaceholder(
                $this->getGiServiceLocator()->translate(GlossaryInterface::class, Glossary::class, 'password')
            );
        }

        return $this->passwordTextbox;
    }

    /**
     * @gi-id save-checkbox
     * @return CheckboxInterface
     */
    protected function getSaveCheckbox()
    {
        if (!($this->saveCheckbox instanceof CheckboxInterface)) {
            $this->saveCheckbox = $this->getGiServiceLocator()->getDOMFactory()->getInputFactory()->createCheckbox(
                $this->getViewModel()->getSaveName(), 1
            );

            $this->addObjectSpecifiedId($this->saveCheckbox, static::SAVE_CHECKBOX_ID);
        }

        return $this->saveCheckbox;
    }

    /**
     * @gi-id save-label
     * @return LabelInterface
     */
    protected function getSaveLabel()
    {
        if (!($this->saveLabel instanceof LabelInterface)) {
            $this->saveLabel = $this->getGiServiceLocator()->getDOMFactory()->createLabel(
                $this->getGiServiceLocator()->translate(GlossaryInterface::class, Glossary::class, static::SAVE_LABEL)
            );
        }

        return $this->saveLabel;
    }

    /**
     * @gi-id submit-button
     * @return SubmitInterface
     */
    protected function getSubmitButton()
    {
        if (!($this->submitButton instanceof SubmitInterface)) {
            $this->submitButton = $this->getGiServiceLocator()->getDOMFactory()->getInputFactory()->createSubmit(
                [], $this->getGiServiceLocator()->translate(GlossaryInterface::class, Glossary::class, 'login!')
            );
        }

        return $this->submitButton;
    }
}