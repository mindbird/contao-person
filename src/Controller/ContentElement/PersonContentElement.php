<?php

namespace Mindbird\Contao\Person\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\StringUtil;
use Mindbird\Contao\Person\Model\Person;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(type: PersonContentElement::TYPE, category: 'includes')]
class PersonContentElement extends AbstractContentElementController
{
    public const string TYPE = 'person';

    public function __construct(private readonly ScopeMatcher $scopeMatcher)
    {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $person = Person::findByPk($model->personID);
        if ($this->scopeMatcher->isBackendRequest($request)) {
            $template = new BackendTemplate('be_wildcard');
            $template->title = 'Person - ' . $person?->getFullName() ?? ''; // Person auslesen und Name ausgeben

            return $template->getResponse();
        }

        if ($person === null) {
            $template->person = null;
            return $template->getResponse();
        }
        $template->person = $person;
        $template->imageSize = StringUtil::deserialize($model->size);

        return $template->getResponse();
    }
}