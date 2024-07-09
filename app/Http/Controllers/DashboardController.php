<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index() {
        $composerLockPath = base_path('composer.lock');

        $composerLockContent = json_decode(File::get($composerLockPath), true);
        $dependencies = $composerLockContent['packages'] ?? [];

        $dependencyList = [];
        foreach ($dependencies as $package) {
            $dependencyList[] = [
                'name' => $package['name'],
                'version' => $package['version'],
                'description' => $package['description'] ?? '',
            ];
        }

        return view('dashboard.index', [
            'dependencies' => $dependencyList,
        ]);
    }
}
