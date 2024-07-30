<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TruncateAllTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate all tables in the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Truncating all tables...');

        Schema::disableForeignKeyConstraints();

        $tables = DB::select('SHOW TABLES');
        $database = DB::getDatabaseName();

        foreach ($tables as $table) {
            $table_array = get_object_vars($table);
            $table_name = $table_array["Tables_in_$database"];
            DB::table($table_name)->truncate();
            $this->info("Truncated $table_name");
        }

        Schema::enableForeignKeyConstraints();

        $this->info('All tables truncated successfully.');

        return 0;
    }
}
