<?php

namespace App\Controller;

use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class VoteMessageController extends AbstractController
{
    public function __construct(

    ) {}

    public function __invoke(Message $message): Message
    {
        // Si le user connecté est le même que le user qui vote
        if ($message->getOwner() === $this->getUser()) {
            throw new AccessDeniedHttpException();
        } else {
            $message->addVotes();
        }
        return $message;
    }
}