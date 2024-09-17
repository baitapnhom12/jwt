<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;

class GenerateSwagger extends Command
{
    protected $signature = 'swagger:generate';
    protected $description = 'Generate Swagger documentation';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $openapi = Generator::scan([app_path('Swagger')]);
        $outputPath = storage_path('api-docs/api-docs.json');
        file_put_contents($outputPath, $openapi->toJson());
        $this->info('Swagger documentation generated successfully.');
    }
}
