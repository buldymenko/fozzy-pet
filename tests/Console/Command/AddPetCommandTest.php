<?php
namespace Tests\Console\Command;

use App\Console\Command\AddFozzyPetCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Dotenv\Dotenv;

class AddPetCommandTest extends TestCase
{
    /** @var CommandTester */
    private $commandTester;

    protected function setUp() : void
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../../.env');

        $application = new Application();
        $application->add(new AddFozzyPetCommand());
        $command = $application->find('add');
        $this->commandTester = new CommandTester($command);
    }

    public function testExecute()
    {
        $this->commandTester->execute([
            'kindOfPet' => 'cat',
            'nickname' => 'Tom',
        ]);
        $output = $this->commandTester->getDisplay();
        $this->assertStringContainsString('Pet added successfully!', $output);
    }

    public function testExecuteShouldThrowError()
    {
        $this->commandTester->execute([
            'kindOfPet' => 'husband',
            'nickname' => 'Bob',
        ]);
        $output = $this->commandTester->getDisplay();
        $this->assertStringContainsString('Error: Failed to recognize pet!', $output);
    }
}