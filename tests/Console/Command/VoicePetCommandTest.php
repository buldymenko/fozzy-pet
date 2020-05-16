<?php
namespace Tests\Console\Command;

use App\Console\Command\VoiceFozzyPetCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Dotenv\Dotenv;

class VoicePetCommandTest extends TestCase
{
    /** @var CommandTester */
    private $commandTester;

    protected function setUp() : void
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../../.env');

        $application = new Application();
        $application->add(new VoiceFozzyPetCommand());
        $command = $application->find('voice');
        $this->commandTester = new CommandTester($command);
    }

    public function testExecute()
    {
        $this->commandTester->execute([
            'nickname' => 'Tom',
        ]);
        $output = $this->commandTester->getDisplay();
        $this->assertStringContainsString('Pet "Tom" say meow.', $output);
    }

    public function testExecuteShouldThrowError()
    {
        $this->commandTester->execute([
            'nickname' => 'Karl',
        ]);
        $output = $this->commandTester->getDisplay();
        $this->assertStringContainsString('Sorry. But you don\'t have a pet yet!', $output);
    }
}