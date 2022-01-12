<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ShowMyNameController extends AbstractController
{
    //route towards showing name, homepage and should stay there, a form should be available to edit.


    #[Route('/show_my_name', name: 'show_my_name')]
    public function show(Request $request): Response
    {
        $session = new Session;
        $session->start();

        //checking if session is set, otherwise resorting to default unknown & giving the session that value to check in whatishappenng.
        if($session->get('name') === null) {
            $name = "unknown";
            $session->set('name', "unknown");
        }
        else {
            $name = $session->get('name');
        }

        //creating a user object
        $user = new User();
        //what does this do.
        $user->setUser($_SESSION["name"]);
        //
        $form = $this->createForm(UserType::class, $user);

        //The recommended way of processing forms is to use a single action for both rendering the form and handling the form submit.
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $user = $form->getData();

            // ... perform some action, such as saving the task to the database
            $_SESSION["name"] =  $_POST['user']['user'];



            return $this->redirectToRoute('change', $_SESSION);
        }

        return $this->renderForm('show_my_name/index.html.twig', [
            'name' => $name,
            'form' => $form,
        ]);
    }

    #[Route('/change', name: 'change_my_name')]
    public function change(Request $request): Response
    {
        $user = new User();
        //what does this do.

        $_SESSION["name"] = $_POST['user']['user'];
        $user->setUser($_SESSION["name"]);

          function whatIsHappening() {
            echo '<h2>$_GET</h2>';
            var_dump($_GET);
            echo '<h2>$_POST</h2>';
            var_dump($_POST);
            echo '<h2>$_COOKIE</h2>';
            var_dump($_COOKIE);
            echo '<h2>$_SESSION</h2>';
            var_dump($_SESSION);
        }
        whatIsHappening();

        $form = $this->createForm(UserType::class, $user);
        return $this->renderForm('show_my_name/index.html.twig', [
            'name' => $_SESSION["name"],
            'form' => $form,
        ]);
    }

    public function homepage(): RedirectResponse
    {
        // redirects to the "homepage" route
        return $this->redirectToRoute('homepage');
    }

    #[Route('/about-me', name: 'about-me')]
    public function aboutMe(Request $request): Response
    {
        if(!isset($_SESSION["name"])) {
            //return $this->homepage();
            $name = "unknown";
            $_SESSION["name"] = $name;
        }

        function whatIsHappening() {
            echo '<h2>$_GET</h2>';
            var_dump($_GET);
            echo '<h2>$_POST</h2>';
            var_dump($_POST);
            echo '<h2>$_COOKIE</h2>';
            var_dump($_COOKIE);
            echo '<h2>$_SESSION</h2>';
            var_dump($_SESSION);
        }

        whatIsHappening();

        return $this->render('about_me/index.html.twig', [
            'name' => $_SESSION["name"],
            'controller_name' => 'AboutMeController',
        ]);
    }
    //options: make multiple routes in one controller,


}
