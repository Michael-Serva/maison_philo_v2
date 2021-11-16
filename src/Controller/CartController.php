<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\CartService;
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
    public function index(CartService $cartService): array
    {
        $cartDatas = $cartService->getTotalCart();
        $total = $cartService->getTotal();

        $cart[] = [
            'productname' => $cartDatas[0]['product']->getId(),
            'productPrice' => $cartDatas[0]['product']->getPrice(),

        ];
                dd($cartDatas[0]['product']);

        //dd($cart);

        //dd($cartDatas[0]['product']->getId());
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
        return $this->redirectToRoute('app_cart_index');
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
