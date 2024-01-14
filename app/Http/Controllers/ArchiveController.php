<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class ArchiveController extends Controller
{
    public function ShowArchive()
    {
        $animal = Animal::with('archive')
            ->whereHas('archive', function ($query) {
                $query->where('archive_status', 'archived');
            })
            ->paginate(10);

        return view('admin.admin-archive', compact('animal'));
    }
}
