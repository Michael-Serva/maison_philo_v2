<?php

namespace App\Service;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{

    protected $session;

    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    public function add($id)
    {
        // we initialize the cart to a empty array
        $cart = $this->session->get('cart', []);
        if (!empty($cart[$id])) {
            //allows you to buy the same product several times
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        //we add a product with an id for key

        //we save the contents of the cart in the session
        $this->session->set('cart', $cart);
    }

    public function remove($id)
    {
        $cart = $this->session->get('cart', []);
        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }
        $this->session->set('cart', $cart);
        ;
    }

    public function getTotalCart(): array
    {
        $cart = $this->session->get('cart', []);
        $cartDatas = [];
        foreach ($cart as $id => $quantity) {
            $cartDatas[] = [
                'product' => $this->productRepository->find($id),
                'quantity' => $quantity
            ];
        }
        return $cartDatas;
    }

    public function getTotal(): float
    {
        $total = 0;
        $cartDatas = $this->getTotalCart();
        foreach ($cartDatas as $cartData) {
            $cartDataTotalPrice = $cartData['product']->getPrice() * $cartData['quantity'];
            $total += $cartDataTotalPrice;
        }
        return $total;
    }
}
