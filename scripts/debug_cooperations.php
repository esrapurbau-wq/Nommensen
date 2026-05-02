<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

/** @var \Illuminate\Contracts\Console\Kernel $kernel */
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$rows = \Illuminate\Support\Facades\DB::table('cooperations')
    ->orderByDesc('id')
    ->limit(10)
    ->get(['id', 'image', 'created_at']);

foreach ($rows as $row) {
    echo $row->id . ' | ' . ($row->image ?? 'NULL') . ' | ' . ($row->created_at ?? '') . PHP_EOL;
}

