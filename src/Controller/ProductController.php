<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/product/admin")
 * 
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"})
     * @Template
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", methods={"GET","POST"})
     * @Template
     */
    public function new(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('image')->getData();

            //dump($request->request);
            //dd($imageFile);
            if ($imageFile) // si $imageFile n'est pas vide (une image a été upload)
            {
                // 3 étapes pour le traitement de l'image


                // 1e : renommer l'image

                $nomReelImage = str_replace(" ", "-", $imageFile->getClientOriginalName());
                $nomImage = date("YmdHis") . "-" . uniqid() . "-" . $nomReelImage;
                // création d'une class pour le traitement de l'image
                // 20210622121848-60d1b9081f50d-montre5.jpg
                //dd($nomImage);


                // 2e : Envoyer l'image dans le dossier public / images / imagesUpload

                // move() permet de déplacer un fichier
                // 2 arguments :
                // 1e : le placement : getParameter()
                // 2e : le nom qu'aura le fichier 


                // getParameter() renvoit sur le fichier config/services.yaml 
                // Paramater à définir
                // reprendre le nom : associer le chemin 
                // %kernel.project_dir% c'est le projet
                // suivi du chemin : ex : public / images etc... 

                $imageFile->move(
                    $this->getParameter("image_product"),
                    $nomImage
                );


                // 3e étape : envoyer $nomImage en bdd

                $product->setImage($nomImage);
            }



            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('app_product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product/new.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/show", methods={"GET"})
     * @Template
     */
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/{id}/edit", methods={"GET","POST"})
     * @Template
     */
    public function edit(Request $request, Product $product): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('imageFile')->getData();


            if ($imageFile) // si image upload
            {

                $nomImage = date('YmdHis') . "-" . uniqid() . "-" . $imageFile->getClientOriginalName();
                //dd(strlen($nomImage));


                $imageFile->move(
                    $this->getParameter('image_product'),
                    $nomImage
                );

                //dump($product->getImage());

                // unlink() permet de supprimer un fichier
                // 1 argument : chemin avec le nom du fichier 

                if ($product->getImage()) {
                    unlink($this->getParameter('image_product') . '/' . $product->getImage());
                }



                $product->setImage($nomImage);
                //dd($product->getImage());


            }
            // image null => image null           OK
            // image null => upload image         OK
            // upload image => inchangé           OK
            // upload image => upload nouvelle image  (supp l'ancienne)   OK
            // upload image => image null (supp l'ancienne) 

            if ($request->request->get('imageQuestion') == "oui") {
                unlink($this->getParameter('image_product') . '/' . $product->getImage());
                $product->setImage(NULL);
            }




            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product/edit.html.twig', [
            'product' => $product,
            'form' => $form
        ]);
    }

    /**
     * @Route("/{id}", name="product_delete", methods={"POST"})
     */
    public function delete(Request $request, Product $product): Response
    {
        if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
    }
}
