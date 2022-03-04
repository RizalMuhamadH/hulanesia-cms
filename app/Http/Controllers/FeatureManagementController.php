<?php

namespace App\Http\Controllers;

use App\Repository\Elasticsearch;
use Illuminate\Http\Request;

class FeatureManagementController extends Controller
{
    
    public function editorChoice()
    {
        return view('test');
    }
}
