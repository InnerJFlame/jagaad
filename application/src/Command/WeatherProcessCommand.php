<?php

declare(strict_types=1);

namespace App\Command;

use App\Component\Api\Musement\Client as MusementClient;
use App\Component\Api\Weather\Client as WeatherClient;
use App\Component\Api\Weather\Request\FetchFormatter;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WeatherProcessCommand extends Command
{
    protected static $defaultName = 'application:weather:process';

    private $logger;
    private $musementClient;
    private $weatherClient;

    public function __construct(
        LoggerInterface $logger,
        MusementClient $musementClient,
        WeatherClient $weatherClient,
        string $name = null
    ) {
        parent::__construct($name);

        $this->logger = $logger;
        $this->musementClient = $musementClient;
        $this->weatherClient = $weatherClient;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $musementResponse = $this->musementClient->fetch();
            foreach ($musementResponse->getData() as $item) {
                $weatherResponse = $this->weatherClient->fetch($item);
                $output->writeln((new FetchFormatter())->format($weatherResponse));
            }

            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $this->logger->critical($e->getMessage(), $e->getTrace());
        }

        return Command::FAILURE;
    }
}
