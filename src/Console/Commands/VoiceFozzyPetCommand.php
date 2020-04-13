<?php
namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\ServiceEntityManager;
use App\Entity\MyPet;

class VoiceFozzyPetCommand extends Command
{
    protected static $defaultName = 'voice';

    protected function configure()
    {
        $this->setDescription('The command allows to talk to pet');

        $this
            // configure an argument
            ->addArgument('nickname', InputArgument::OPTIONAL, 'The pet`s nickname.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $nickname = $input->getArgument('nickname');

        $entityManager = ServiceEntityManager::getInstance();
        if ($nickname) {
            $myPets = $entityManager->getRepository(MyPet::class)->findPetByNickname($nickname);
        } else {
            $myPets = $entityManager->getRepository(MyPet::class)->findAll();
        }

        if (!$myPets) {
            $output->writeln('Sorry. But you don\'t have a pet yet!');
            return 0;
        }

        foreach ($myPets as $pet) {
            /* @var MyPet $pet */
            $output->writeln(sprintf('Pet "%s" say %s.', $pet->getNickname(), $pet->getKindOfPet()->getVoice()));
        }


        return 0;
    }
}