<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
	/**
	 * @Route("/homepage")
	 */
	
	public function numberAction()
	{
		$number = '404';
	
	/*	return new Response(
				'<html><body>Lucky number: '.$number.'</body></html>'
				);*/
	
		return $this->render('homepage/homepage.html.twig', array(
			'number'=>$number,
		));
		
	//	throw $this->createNotFoundException('The product does not exist');;
	}
}