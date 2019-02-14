<?php


namespace App\Controller;

use App\Entity\Documents;
use App\Entity\Category;
use App\Form\DocumentsType;
use App\Form\RentType;
use App\Repository\DocumentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CategoryTriType;


/**
 * @Route("/documents")
 */

class DocumentsController extends AbstractController
{
    /**
     * @Route("/", name="documents_index")
     */
    // public function index(DocumentsRepository $documentsRepository): Response
    // {
    //
    //     return $this->render('documents/index.html.twig', [
    //         'documents' => $documentsRepository->findCategoryDocuments(),
    //     ]);
    // }
    public function index(DocumentsRepository $Documents, Request $request): Response
    {
        $form = $this->createForm(CategoryTriType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $category = $form->getData()["category"];
          var_dump($category);
          $documents = $this->getDoctrine()->getRepository(Documents::class)->findCategoryDocuments($category);
        }
        else {
          $documents = $this->getDoctrine()->getRepository(Documents::class)->findCategoryDocuments();
        }

        return $this->render('documents/index.html.twig', [
            'documents' => $documents,
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("/new", name="documents_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $document = new Documents();
        $form = $this->createForm(DocumentsType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush();

            return $this->redirectToRoute('documents_index');
        }

        return $this->render('documents/new.html.twig', [
            'document' => $document,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="documents_show", methods={"GET"})
     */
    public function show(Documents $document): Response
    {
        return $this->render('documents/show.html.twig', [
            'document' => $document,
        ]);
    }
     /**
     * @Route("/rent/{id}", name="documents_rent", methods={"GET"})
     */
    public function rent($id, Request $request)
    {
        // je recupère mon repository que je stock dans $rpository
        $repository = $this->getDoctrine()->getRepository(Documents::class);

        $document = $repository->find($id);
            $form = $this->createForm(RentType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->valid()){
        
            }

              return $this->render('documents/_rent.html.twig', [
                  'form' => $form->createView(),

              ]);

    }
    
    /**
     * @Route("/{id}/edit", name="documents_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Documents $document): Response
    {
        $form = $this->createForm(DocumentsType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documents_index', [
                'id' => $document->getId(),
            ]);
        }

        return $this->render('documents/edit.html.twig', [
            'document' => $document,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="documents_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Documents $document): Response
    {
        if ($this->isCsrfTokenValid('delete'.$document->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($document);
            $entityManager->flush();
        }

        return $this->redirectToRoute('documents_index');
    }
}
