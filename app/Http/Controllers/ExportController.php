<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportController extends Controller
{
    public function __invoke()
    {
        $request = request();
        $rows = [];
        if ($request->report == 'Article') {
            Post::select('status', DB::raw('count(*) as total'))
                ->whereBetween('created_at', [$request->start, $request->end])
                ->groupBy('status')
                ->chunk(100, function ($posts) use (&$rows) {
                    foreach ($posts as $key => $post) {
                        $rows[$key] = [
                            'status' => $post->status->value,
                            'total' => $post->total
                        ];
                    }
                });
        }

        if ($request->report == 'Author' || $request->report == 'Editor') {
            $report = $request->report;
            User::query()->withWhereHas('roles', fn($q) => $q->where('name', $report == 'Author' ? 'writter' : 'editor'))->withCount([$report == 'Author' ? 'authorPost' : 'editorPost' => function ($query) use ($request) {
                $query->whereBetween('created_at', [$request->start, $request->end]);
            }])->chunk(100, function ($users) use (&$rows) {
                foreach ($users as $key => $user) {
                    $rows[$key] = [
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->roles->implode('name', ', '),
                        'total' => $user->author_post_count
                    ];
                }
            });
        }

        SimpleExcelWriter::streamDownload('reports_' . $request->report . '_' . $request->start . '_' . $request->end . '.xlsx')
            ->noHeaderRow()
            ->addRows($rows);
    }
}
