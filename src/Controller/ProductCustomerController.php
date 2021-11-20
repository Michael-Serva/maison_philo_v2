<?php

namespace App\Controller;

use App\Entity\Product;
use App\Data\SearchData;
use App\Form\SearchForm;
use App\Form\SearchType;
use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\Pagination\PaginationInterface;
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

        $data = new SearchData();
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
      

        $productPerPage = 5;
        $datas = $productRepository->findSearch($data);
//dd($datas);


        $products = $paginator->paginate(
            $datas,
            $request->query->getInt('page', 1),
            $productPerPage
        );
        $productsTotalPage =ceil(count($datas) / $productPerPage);
        return [
            'products' => $products,
            'productsTotalPage' => $productsTotalPage,
            'form' => $form->createView(),
          
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
