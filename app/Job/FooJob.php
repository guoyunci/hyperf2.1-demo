<?php

declare(strict_types=1);

namespace App\Job;

use Hyperf\AsyncQueue\Job;

class FooJob extends Job
{
    protected $id;
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        dump($this->id);
    }
}
