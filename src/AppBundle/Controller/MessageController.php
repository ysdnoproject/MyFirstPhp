<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Entity\User;
use AppBundle\Entity\UserFile;
use AppBundle\Form\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/message")
 */
class MessageController extends Controller
{

    /**
     * @Route("/index", name="message_index")
     */
    public function indexAction(Request $request)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:Message')->queryLatest();

        $paginator  = $this->get('knp_paginator');
        $messages = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        $message = new Message();

        for ($x=0; $x<=1; $x++) {
            $userFile = new UserFile();

            $message->getFile()->add($userFile);
        }

        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $message -> setCreatetime(new \DateTime('now'));
            $user = $this -> getUser();
            $message -> setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

            $files=$message->getFile();
            foreach ($files as $item) {
                $userFile = $item;
                $userFile->setMessage($message);
                if($userFile->getFile()){
                    $userFile->setMimeType($userFile->getFile()->getMimeType());
                }
                $em->persist($userFile);
            }
            $em->flush();

            return $this->redirectToRoute('message_index');
        }

        return $this->render('message/index.html.twig', array(
            'messages' => $messages,
            'form' => $form->createView(),
        ));
    }
}
