<?php

namespace Dmelnyk\Command\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Command\Command;

class GetCurrentDateCommand extends Command
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    private $dateTime;

    public function __construct(\Magento\Framework\Stdlib\DateTime\DateTime $dateTime,
                                $name = null)
    {
        parent::__construct($name);
        $this->dateTime = $dateTime;
    }


    protected function configure()
    {
        $this->setName('get-curent-date')
            ->setAliases(array('getcurrentdate'))
            ->setDescription('Get Current Date')
            ->setDefinition(array(
                new InputOption('format', 'f', InputOption::VALUE_OPTIONAL, 'Date Format'),
            ))->setHelp('<info>Get Current Date</info>');


    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            if ($input->getOption("format")) {
                $date = $this->dateTime->date($input->getOption('format'));
            }
            else {
                $date = $this->dateTime->gmtDate();
            }

            $output->writeln('Current Date ' . $date);
        } catch (\Exception $e) {
        }
    }

}