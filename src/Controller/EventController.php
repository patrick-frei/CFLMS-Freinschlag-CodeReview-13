<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Event;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EventController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public  function indexAction()
    {
        $events = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findAll();
        return $this->render('event/index.html.twig', array("events" => $events));
    }

    /**
     * @Route("/filter/{eventType}", name="filteredHome")
     */
    public  function filteredIndexAction($eventType)
    {
        $events = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findBy([
                'type' => $eventType
            ]);
        return $this->render('event/index.html.twig', array("events" => $events));
    }

    /**
     * @Route("/new-event", name="new-event")
     */
    public function form(Request $request)
    {
        $event = new Event;
        $form = $this->createFormBuilder($event)
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('datetime', DateTimeType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('file', FileType::class, [
                'mapped' => false,
                'label' => 'Image',
                'attr' => [
                    'class' => 'custom-file'
                ]
            ])
            ->add('capacity', NumberType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('street', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('ZIP_code', TextType::class, [
                'label' => 'ZIP-code',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('URL', TextType::class, [
                'label' => 'URL',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('type', ChoiceType::class, [
                'choices'=> [
                    'Sightseeing' => 'Sightseeing',
                    'Music & Stage Shows' => 'Music & Stage Shows',
                    'Shopping, Wining & Dining' => 'Shopping, Wining & Dining',
                    'Lifestyle & Scene' => 'Lifestyle & Scene'
                ],
                'attr' => [
                    'class'=> 'form-control'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Add event', 'attr' => [
                    'class' => 'btn btn-secondary mt-3'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
        if ($form->isSubmitted() && $form->isValid()) {
            //fetching data

            // taking the data from the inputs by the name of the inputs then getData() function
            $name = $form['name']->getData();
            $datetime = $form['datetime']->getData();
            $description = $form['description']->getData();
            $file = $form['file']->getData();
            $image = bin2hex(random_bytes(10)) . '.' . $file->guessExtension();
            $capacity = $form['capacity']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $street = $form['street']->getData();
            $ZIP_code = $form['ZIP_code']->getData();
            $city = $form['city']->getData();
            $URL = $form['URL']->getData();
            $type = $form['type']->getData();

            /* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
            $event->setName($name);
            $event->setDatetime($datetime);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setEmail($email);
            $event->setPhone($phone);
            $event->setStreet($street);
            $event->setZIPCode($ZIP_code);
            $event->setCity($city);
            $event->setURL($URL);
            $event->setType($type);
            $file->move('../var/uploads', $image);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash(
                'notice',
                'Event Added'
            );
            return $this->redirectToRoute('home');
        }
        return $this->render('event/add.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/edit-event/{eventId}", name="edit-event")
     */
    public function editForm(Request $request, $eventId)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Event::class)->find($eventId);

        $event->setName($event->getName());
        $event->setDatetime($event->getDatetime());
        $event->setDescription($event->getDescription());
        $event->setImage($event->getImage());
        $event->setCapacity($event->getCapacity());
        $event->setEmail($event->getEmail());
        $event->setPhone($event->getPhone());
        $event->setStreet($event->getStreet());
        $event->setZIPCode($event->getZIPCode());
        $event->setCity($event->getCity());
        $event->setURL($event->getURL());
        $event->setType($event->getType());

        $form = $this->createFormBuilder($event)
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('datetime', DateTimeType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('file', FileType::class, [
                'mapped' => false,
                'label' => 'Image',
                'attr' => [
                    'class' => 'custom-file'
                ]
            ])
            ->add('capacity', NumberType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('street', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('ZIP_code', TextType::class, [
                'label' => 'ZIP-code',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('URL', TextType::class, [
                'label' => 'URL',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('type', ChoiceType::class, [
                'choices'=> [
                    'Sightseeing' => 'Sightseeing',
                    'Music & Stage Shows' => 'Music & Stage Shows',
                    'Shopping, Wining & Dining' => 'Shopping, Wining & Dining',
                    'Lifestyle & Scene' => 'Lifestyle & Scene'
                ],
                'attr' => [
                    'class'=> 'form-control'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Save changes', 'attr' => [
                    'class' => 'btn btn-secondary mt-3'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
        if ($form->isSubmitted() && $form->isValid()) {
            //fetching data

            // taking the data from the inputs by the name of the inputs then getData() function
            $name = $form['name']->getData();
            $datetime = $form['datetime']->getData();
            $description = $form['description']->getData();
            $file = $form['file']->getData();
            $image = bin2hex(random_bytes(10)) . '.' . $file->guessExtension();
            $capacity = $form['capacity']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $street = $form['street']->getData();
            $ZIP_code = $form['ZIP_code']->getData();
            $city = $form['city']->getData();
            $URL = $form['URL']->getData();
            $type = $form['type']->getData();

            /* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
            $event->setName($name);
            $event->setDatetime($datetime);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setEmail($email);
            $event->setPhone($phone);
            $event->setStreet($street);
            $event->setZIPCode($ZIP_code);
            $event->setCity($city);
            $event->setURL($URL);
            $event->setType($type);
            $file->move('../var/uploads', $image);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash(
                'notice',
                'Event Added'
            );
            return $this->redirectToRoute('home');
        }
        return $this->render('event/add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/events/{eventId}", name="getDetailsAction")
     */
    public function getDetailsAction($eventId)
    {
        $event = $this->getDoctrine()
            ->getRepository(Event::class)
            ->find($eventId);
        if (!$event) {
            throw  $this->createNotFoundException(
                'No product found for id ' . $eventId
            );
        } else {
            return $this->render('event/view.html.twig', array("event" => $event));
        }
    }
    /**
     * @Route("/remove-event/{eventId}", name="deleteAction")
     */
    public function deleteAction($eventId)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Event::class)->find($eventId);
        $em->remove($event);
        unlink('../var/uploads/' . $event->getImage());
        $em->flush();
        $this->addFlash(
            'notice',
            'Event Removed'
        );
        return $this->redirectToRoute('home');
    }
}
