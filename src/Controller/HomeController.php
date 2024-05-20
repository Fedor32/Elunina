<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TranslatorInterface $translator): Response
    {
        // получаем локаль из ENV
        $current_language = $_ENV['APP_LANGUAGE'] ?? 'ru';

        $message = new Message();

        // опции с переводом для формирования полей формы
        $form_options = [
            'firstname_label' => $translator->trans('firstname', locale: $current_language),
            'lastname_label' => $translator->trans('lastname', locale: $current_language),
            'description_label' => $translator->trans('description', locale: $current_language),
            'save_label' => $translator->trans('save', locale: $current_language),
        ];

        $form = $this->createForm(MessageType::class, $message, $form_options);

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            'current_language' => $current_language,
        ]);
    }
}
