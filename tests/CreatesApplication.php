<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Reset data for submitting form.
     *
     * @param array $data
     * @param array|string $key
     * @return array
     */
    public function resetData($data = [], $key): array
    {
        if (is_array($key)) {
            $data = array_merge($data, $key);
        } else {
            unset($data[$key]);
        }
        return $data;
    }
}
