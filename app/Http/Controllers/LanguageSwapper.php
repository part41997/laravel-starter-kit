<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageSwapper extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $locale = $request->locale;
        if (! in_array($locale, ['en', 'es', 'fr'])) {
            abort(400);
        }

        session()->forget('locale');
        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
