<?php
namespace App\Command;

use App\Services\JLPPasserelle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;
use Symfony\Component\Console\Helper\ProgressBar;


/**
 * Class PasserelleExecuteCommand
 * @package App\Command
 */
class PasserelleExecuteCommand extends Command
{

    private $jlpPasserelle;

    public function __construct(JLPPasserelle $jlpPasserelle)
    {
        parent::__construct('passerelle:execute');
        $this->jlpPasserelle = $jlpPasserelle;
    }
    /**
     *
     */
    protected function configure()
    {
        $this->setName('passerelle:execute')->setDescription(
            'Execute the passerelle on the current connectimmo.zip'
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
            
            $verbosityLevelMap = array(
                LogLevel::NOTICE => OutputInterface::VERBOSITY_NORMAL,
                LogLevel::INFO   => OutputInterface::VERBOSITY_NORMAL
            );
            
            
            $logger = new ConsoleLogger($output, $verbosityLevelMap);
            $progressBar = new ProgressBar($output);
            $progressBar->setFormat("<info>[info] %message% : %current%/%max% [</info>%bar%<info>] %percent:3s%% %elapsed:6s%/%estimated:-6s%</info>");
            $progressBar->setEmptyBarCharacter('<fg=red>-</>');
            $progressBar->setBarCharacter('<info>=</info>');
            $progressBar->setProgressCharacter('<info>></info>');
            
            $output->writeln("\n\r<question>Execution de la passerelle JLP-IMMO</question>");

            $responsePasserelle = $this->jlpPasserelle->execute($logger, $progressBar);
            
            $output->writeln("<info>Passerelle resultat : ".print_r($responsePasserelle, true)."</info>");
            
            $output->writeln("\n\r");
            
        } catch (\Exception $e) {
            $output->writeln(
                "\t<error>Passerelle Exception : ".$e.'</error>'
            );
        }
    }
}
