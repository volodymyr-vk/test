<?php

namespace VK\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VKBlogBundle:Default:index.html.twig');
    }
}
