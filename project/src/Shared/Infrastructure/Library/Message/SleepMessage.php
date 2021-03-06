<?php
# project/src/Shared/Infrastructure/Library/Message/SleepMessage.php

namespace App\Shared\Infrastructure\Library\Message;

class SleepMessage
{
    private $seconds;
    private $output;

    public function __construct(int $seconds, string $output)
    {
        $this->seconds = $seconds;
        $this->output = $output;
    }

    public function getSeconds()
    {
        return $this->seconds;
    }

    public function getOutput()
    {
        return $this->output;
    }
}