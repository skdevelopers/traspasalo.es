<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateSeeders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-seeders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate seeders from SQL files';

    // Mapping array for SQL table names to Laravel model names
    protected array $tableMapping = [
        'account_type' => 'groups',
        'account_groups' => 'chart_of_accounts',
        'accounts' => 'accounts',
        // Add more mappings as needed
    ];

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Get all SQL files from the public/sql directory
        $sqlFiles = glob(public_path('sql/*.sql'));

        foreach ($sqlFiles as $sqlFile) {
            $sqlContent = file_get_contents($sqlFile);

            // Extract INSERT INTO statements for each table
            preg_match_all("/INSERT INTO `(.*?)` \((.*?)\) VALUES \((.*?)\);/", $sqlContent, $matches);

            // Parse column names and data rows
            foreach ($matches[1] as $key => $tableName) {
                // Get corresponding Laravel model name from the mapping array
                $laravelModelName = $this->tableMapping[$tableName] ?? null;

                if ($laravelModelName) {
                    $columns = explode(',', str_replace('`', '', $matches[2][$key]));
                    $dataRows = explode('),(', $matches[3][$key]);

                    // Initialize array
                    $dataArray = [];

                    // Process data rows
                    foreach ($dataRows as $row) {
                        $rowData = explode(',', $row);
                        $rowData = array_map('trim', $rowData);
                        $rowData = array_map(function ($value) {
                            return str_replace("'", '', $value);
                        }, $rowData);

                        $rowDataAssoc = array_combine($columns, $rowData);
                        $dataArray[] = $rowDataAssoc;
                    }

                    // Write array to PHP file
                    $phpContent = "<?php\n\n\$data = " . var_export($dataArray, true) . ";\n";
                    $fileName = str_replace('.sql', '_seeder.php', basename($sqlFile, '.sql'));
                    file_put_contents(database_path("seeders/{$fileName}"), $phpContent);

                    $this->info("Seeder for table '{$tableName}' (Laravel model: '{$laravelModelName}') generated successfully!");
                } else {
                    $this->error("No Laravel model mapping found for table '{$tableName}'");
                }
            }
        }

        $this->info('All seeders generated successfully!');
    }
}
