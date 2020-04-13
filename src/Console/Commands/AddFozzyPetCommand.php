<?php
namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\ServiceEntityManager;
use App\Entity\MyPet;
use App\Entity\KindPet;

class AddFozzyPetCommand extends Command
{
    protected static $defaultName = 'add';

    protected function configure()
    {
        $this->setDescription('The command allows to add your favorite pets');

        $this
            // configure an argument
            ->addArgument('kindOfPet', InputArgument::REQUIRED, 'The pet type like dog, cat, hamster and etc.')
            ->addArgument('nickname', InputArgument::REQUIRED, 'The pet`s nickname.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $kindOfPet = $input->getArgument('kindOfPet');
        $nickname = $input->getArgument('nickname');

        $entityManager = ServiceEntityManager::getInstance();
        $kindPet = $entityManager->getRepository(KindPet::class)->findPetByType($kindOfPet);
        if (!$kindPet) {
            $output->writeln('Error: Failed to recognize pet!');
            return 0;
        }

        $myPet = new MyPet();
        $myPet->setKindOfPet($kindPet);
        $myPet->setNickname($nickname);

        $entityManager->persist($myPet);
        $entityManager->flush();

        $output->writeln('Pet added successfully!');
        return 0;
    }
}