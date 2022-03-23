<?php

namespace JanCejka\PosEvidence\Console\Command;

use JanCejka\PosEvidence\Api\Data\PosInterface;
use JanCejka\PosEvidence\Api\Data\PosInterfaceFactory;
use JanCejka\PosEvidence\Command\Pos\SaveCommand;
use Magento\Framework\DataObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class CommandPosAdd extends Command
{
    const OPTION_NAME = 'name';
    const OPTION_ADDRESS = 'address';
    const OPTION_IS_AVAILABLE = 'is_available';

    /**
     * @var SaveCommand
     */
    private $saveCommand;

    /**
     * @var PosInterfaceFactory
     */
    private $entityDataFactory;

    /**
     * @param SaveCommand $saveCommand
     * @param PosInterfaceFactory $entityDataFactory
     */
    public function __construct(
        SaveCommand $saveCommand,
        PosInterfaceFactory $entityDataFactory,
        string $name = null
    ) {
        $this->saveCommand = $saveCommand;
        $this->entityDataFactory = $entityDataFactory;

        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('magexo:pos:add');
        $this->setDescription('Add POS');

        $options = [
            new InputOption(
                self::OPTION_NAME,
                null,
                InputOption::VALUE_REQUIRED,
                'POS Name'
            ),
            new InputOption(
                self::OPTION_ADDRESS,
                null,
                InputOption::VALUE_REQUIRED,
                'POS Address'
            ),
            new InputOption(
                self::OPTION_IS_AVAILABLE,
                null,
                InputOption::VALUE_REQUIRED,
                'Is Available'
            ),
        ];

        $this->setDefinition($options);

        parent::configure();
    }

    /**
     * CLI command description
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $name = $input->getOption(self::OPTION_NAME);
        $address = $input->getOption(self::OPTION_ADDRESS);
        $is_available = $input->getOption(self::OPTION_IS_AVAILABLE);

        /** @var PosInterface|DataObject $entityModel */
        $entityModel = $this->entityDataFactory->create();
        $entityModel->addData([
            'name' => $name,
            'address' => $address,
            'is_available' => $is_available,
        ]);
        $this->saveCommand->execute($entityModel);

        $output->writeln(__('The Pos data was saved successfully'));
    }
}
