<?php

namespace App\Http\Controllers;

use App\Models\Library as Library;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): Redirector|Application|RedirectResponse
    {
        $library = Library::findOrFail($id);
        $slug = $library->library_name_slug;

        return redirect('/'.$slug, 301);

    }
}
