<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;


/**
 * Class PasserelleInfoCommand
 * @package App\Command
 */
class PasserelleInfoCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this->setName('passerelle:info')->setDescription(
            'Fetching the current status of the passerelle and the age of the last connectimmo.zip found.'
        );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $formatLevelMap = array(
                LogLevel::CRITICAL => ConsoleLogger::INFO,
                LogLevel::DEBUG    => ConsoleLogger::ERROR,
            );
            
            $verbosityLevelMap = array(
                LogLevel::NOTICE => OutputInterface::VERBOSITY_NORMAL,
                LogLevel::INFO   => OutputInterface::VERBOSITY_NORMAL,
            );
            
            
            $logger = new ConsoleLogger($output, $verbosityLevelMap, $formatLevelMap);
            
            $output->writeln("\n\r<question>Informations de la passerelle JLP-IMMO</question>");

            // Appel du service correpondant au CRON
            $services = $this->getContainer()->get('admin.passerelle');
            $responseServices = $services->informations($logger);

            $output->writeln(
                "\t<info>Passerelle informations : ".$responseServices.'</info>'
            );
            
            $output->writeln("\n\r");
            
        } catch (\Exception $e) {
            $output->writeln(
                "\t<error>Passerelle Exception : ".$e.'</error>'
            );
        }
    }
}
