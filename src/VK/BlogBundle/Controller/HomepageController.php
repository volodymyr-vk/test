<?php

namespace VK\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
        return $this->render('VKBlogBundle:Homepage:index.html.twig');
    }
    
    
}
