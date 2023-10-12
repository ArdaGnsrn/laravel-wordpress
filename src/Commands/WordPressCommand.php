<?php

namespace ArdaGnsrn\WordPress\Commands;

use Illuminate\Console\Command;

class WordPressCommand extends Command
{
    public $signature = 'laravel-wordpress';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
