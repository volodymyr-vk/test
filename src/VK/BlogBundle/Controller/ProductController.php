<?php

namespace VK\BlogBundle\Controller;

use VK\BlogBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{
    /**
     * Create product
     *
     */
	//
	public function newAction()
	{
		$product = new Product();
		$product->setName('Keyboard');
		$product->setPrice(19.99);
		$product->setDescription('Ergonomic and stylish!');
	
		$em = $this->getDoctrine()->getManager();
	
		// tells Doctrine you want to (eventually) save the Product (no queries yet)
		$em->persist($product);
	
		// actually executes the queries (i.e. the INSERT query)
		$em->flush();
	
		//return new Response('Saved new product with id '.$product->getId());
		return $this->redirectToRoute('product_index');
	}
	
	/**
	 * Show id_product
	 *
	 */
	
	public function listAction()
	{
		$products = $this->getDoctrine()
		->getRepository('VKBlogBundle:Product')
		->findAll();
	
		if (!$products) {
			throw $this->createNotFoundException(
					'No products found for id '
					);
		}
	
		return $this->render('VKBlogBundle:Product:list.html.twig', array(
				'products' => $products,
				//'productId' => $productId,
		));
	}
	
	/**
	 * Show id_product
	 *
	 */
	
	public function showAction($productId)
	{
		$product = $this->getDoctrine()
		->getRepository('VKBlogBundle:Product')
		->find($productId);
	
		if (!$product) {
			throw $this->createNotFoundException(
					'No product found for id '.$productId
					);
		}
	
		return $this->render('VKBlogBundle:Product:show.html.twig', array(
				'product' => $product,
		));
	}
	
	/**
	 * Update product
	 *
	 */
	public function updateAction($productId)
	{
		$em = $this->getDoctrine()->getManager();
		$product = $em->getRepository('VKBlogBundle:Product')->find($productId);
	
		if (!$product) {
			throw $this->createNotFoundException(
					'No product found for id '.$productId
					);
		}
	
		$product->setName('New product name');
		$em->flush();
	
		return $this->redirectToRoute('product_index');
	}
	
	/**
	 * Delete product
	 *
	 */
	public function deleteAction($productId)
	{
		$em = $this->getDoctrine()->getManager();
		$product = $em->getRepository('VKBlogBundle:Product')->find($productId);
	
		if (!$product) {
			throw $this->createNotFoundException(
					'No product found for id '.$productId
					);
		}
	
		$em->remove($product);
		$em->flush();
	
		return $this->redirectToRoute('product_index');
	}
}
