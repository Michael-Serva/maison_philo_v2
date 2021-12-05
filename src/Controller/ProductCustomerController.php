<?php

namespace App\Controller;

use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Product;
use App\Data\SearchData;
use App\Entity\Comments;
use App\Form\SearchForm;
use App\Form\SearchType;
use App\Form\CommentsType;
use App\Repository\CommentsRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\Length;

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
    public function showProducts(
        ProductRepository $productRepository,
        PaginatorInterface $paginator,
        Request $request
    ) {

        $data = new SearchData();
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);

        $productPerPage = 5;
        $datas = $productRepository->findSearch($data);
        $products = $paginator->paginate(
            $datas,
            $request->query->getInt('page', 1),
            $productPerPage
        );
        $productsTotalPage = ceil(count($datas) / $productPerPage);

        if ($request->get('ajax')) {
            return new JsonResponse([

                'content' => $this->renderView('component/organisms/products.html.twig', ['products' => $products]),
                'sorting' =>  $this->renderView('component/organisms/sorting.html.twig', ['products' => $products]),
                'pagination' =>  $this->renderView('component/atoms/pagination.html.twig', [
                    'products' => $products,
                    'productsTotalPage' => $productsTotalPage
                ])
            ]);
        }


        return [
            'products' => $products,
            'productsTotalPage' => $productsTotalPage,
            'form' => $form->createView()

        ];
    }

    /**
     * @Route("/{id}", name="app_productcustomer_show", methods={"GET"})
     * @Template
     */
    public function show(
        ?Product $product,
        Request $request,
        EntityManagerInterface $entityManager,
        CommentsRepository $commentsRepository,
        PaginatorInterface $paginator,
        ?UserInterface $user
    ) {
        //comment creation
        $comment = new Comments;
        $commentForm = $this->createForm(CommentsType::class, $comment);
        $commentForm->handleRequest($request);
        if ($user) {
            if ($commentForm->isSubmitted() && $commentForm->isValid()) {
                $comment->setCreatedAt(new DateTimeImmutable('now'));
                $comment->setProducts($product);
                $comment->setUsers($user);
                $entityManager->persist($comment);
                $entityManager->flush();
                $this->addFlash('comment', 'Votre commentaire a bien été déposé');
                return $this->redirectToRoute('app_productcustomer_show', ['id' => $product->getId()]);
            }
        }
        $commentPerPage = 5;
        $datas = $commentsRepository->findByProducts($product->getTitle());
        $comments = $paginator->paginate(
            $datas,
            $request->query->getInt('page', 1),
            $commentPerPage
        );
        $users = [];
        for ($i = 0; $i < count($datas); $i++) {
            array_push($users, $datas[$i]->getUsers()->getPseudo());
        }
        $commentsTotal = ceil(count($datas) / $commentPerPage);
        return  [
            'product' => $product,
            'commentForm' => $commentForm->createView(),
            'pagination' => [
                "comments" => $comments,
                "commentsTotal" => $commentsTotal,
            ]

        ];
    }
}
