<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/cart")
 * @Template
 */
class CartController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(CartService $cartService): array
    {
        $cartDatas = $cartService->getTotalCart();
        $total = $cartService->getTotal();
        if ($cartDatas) {
            $cart[] = [
                'productname' => $cartDatas[0]['product']->getId(),
                'productPrice' => $cartDatas[0]['product']->getPrice(),
            ];
        }
        return [
            'cartDatas' => $cartDatas,
            'total' => $total
        ];
    }

    /**
     * @Route("/add/{id}")
     */
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);
        $this->addFlash('cart', 'The Product '.$id.' was added');
        return $this->redirectToRoute('app_productcustomer_showwheelchair');
    }

    /**
     * @Route("/remove/{id}")
     */
    public function remove($id, CartService $cartService)
    {
        $cartService->remove($id);
        return $this->redirectToRoute('app_cart_index');
    }
}
