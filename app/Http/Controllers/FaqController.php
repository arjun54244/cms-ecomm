<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqCategories = Faq::active()
            ->orderBy('sort_order')
            ->orderBy('category')
            ->get()
            ->groupBy('category')
            ->chunk(2);

        return view('faq', compact('faqCategories'));
    }
}
