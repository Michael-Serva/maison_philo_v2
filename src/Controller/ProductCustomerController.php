<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/customer/product")
 */
class ProductCustomerController extends AbstractController
{
    /**
     * @Route("/")
     * @Template
     */
    public function index(): array
    {
        return [];
    }

    /**
     * @Route("/mobility")
     * @Template
     */
    public function showWheelchair(
        ProductRepository $productRepository,
        PaginatorInterface $paginator,
        Request $request
    ): array {

        $productPerPage = 5;
        $datas = $productRepository->findWheelchair(25);
        $products = $paginator->paginate(
            $datas,
            $request->query->getInt('page', 1),
            $productPerPage
        );
        $productsTotalPage =ceil(count($datas) / $productPerPage);
        return [
            'products' => $products,
            'productsTotalPage' => $productsTotalPage
        ];
    }

    /**
     * @Route("/{id}", name="app_productcustomer_show", methods={"GET"})
     * @Template
     */
    public function show(Product $product): array
    {
        return  [
            'product' => $product,
        ];
    }
}
