<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

/**
 * @Route("/cart")
 * @Template
 */
class CartController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(SessionInterface $session, ProductRepository $productRepository): array
    {
        $cart = $session->get('cart', []);
        $cartDatas = [];
        foreach ($cart as $id => $quantity) {
            $cartDatas[] = [
                'product' => $productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $total=0;
        foreach ($cartDatas as $cartData) {
           $cartDataTotalPrice = $cartData['product']->getPrice() *$cartData['quantity'];
           $total += $cartDataTotalPrice;
        }
        //dd($cartDatas);
        return [
            'cartDatas' => $cartDatas,
            'total' => $total
        ];
    }

    /**
     * @Route("/add/{id}")
     */
    public function add($id, SessionInterface $session, FlashBagInterface $flashbag)
    {
        // we initialize the cart to a empty array 
        $cart = $session->get('cart', []);
        if (!empty($cart[$id])) {
            //allows you to buy the same product several times
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $flashbag->add('Success', "Le produit a bien été ajouté à votre panier");
        //we add a product with an id for key

        //we save the contents of the cart in the session
        $session->set('cart', $cart); 
        
        return $this->redirectToRoute('app_cart_index');
    }

   /**
    * @Route("/remove/{id}")
    */
   public function remove($id, SessionInterface $session)
   {
       $cart = $session->get('cart', []);
       if (!empty($cart[$id])) {
           unset($cart[$id]);
       }
       $session->set('cart', $cart);;
        return $this->redirectToRoute('app_cart_index');
   }
}
