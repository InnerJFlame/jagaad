<?php

declare(strict_types=1);

namespace App\Command;

use App\Api\Musement\Client as MusementClient;
use App\Api\Weather\Client as WeatherClient;
use App\Api\Weather\Formatter\FetchFormatter;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

class ForecastProcessCommand extends Command
{
    protected static $defaultName = 'application:forecast:process';

    private LoggerInterface $logger;
    private MusementClient $musementClient;
    private WeatherClient $weatherClient;

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
        } catch (Throwable $e) {
            $this->logger->critical($e->getMessage(), $e->getTrace());
        }

        return Command::FAILURE;
    }
}
