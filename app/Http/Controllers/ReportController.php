<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }
    
    public function author(Request $request)
    {
        $authors = User::query()->withCount('authorPost')->get();
        return $authors;
    }

    public function article(Request $request)
    {
        $status = Post::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        $softDelete = Post::onlyTrashed()
            ->count();

        $status[] = ['status' => 'soft_delete', 'total' => $softDelete];

        return $status;
    }
}
