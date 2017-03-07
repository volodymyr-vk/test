<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GenusController extends Controller
{
	/**
	 * @Route("/genus")
	 */
	
	public function numberAction()
	{
		$number = mt_rand(0, 100);
	
	/*	return new Response(
				'<html><body>Lucky number: '.$number.'</body></html>'
				);*/
	
		return $this->render('genus/genus.html.twig', array(
			'number'=>$number,
		));
		
	//	throw $this->createNotFoundException('The product does not exist');;
	}
}