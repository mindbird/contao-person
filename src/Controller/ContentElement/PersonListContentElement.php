<?php

namespace Mindbird\Contao\Person\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\Controller;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\FrontendTemplate;
use Contao\StringUtil;
use Mindbird\Contao\Person\Model\Person;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(type: PersonListContentElement::TYPE, category: 'includes')]
class PersonListContentElement extends AbstractContentElementController
{
    public const string TYPE = 'person_list';

    public function __construct(private readonly ScopeMatcher $scopeMatcher)
    {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        if ($this->scopeMatcher->isBackendRequest($request)) {
            $template = new BackendTemplate('be_wildcard');
            $template->title = 'Personen Liste';

            return $template->getResponse();
        }

        $people = Person::findBy(
            'pid',
            $model->person_archiv, array('order' => 'sorting ASC')
        );
        $template->imageSize = StringUtil::deserialize($model->imgSize);

        if ($people === null) {
            $template->people = [];
            return $template->getResponse();
        }

        $template->people = $people;
        return $template->getResponse();
    }
}