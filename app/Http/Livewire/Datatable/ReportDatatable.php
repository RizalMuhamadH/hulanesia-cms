<?php

namespace App\Http\Livewire\Datatable;

use App\Models\Post;
use App\Models\User;
use ArrayObject;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ReportDatatable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $start = null;
    public $end = null;
    public $report = ['Article', 'Author', 'Editor'];
    public $reportSelected = 0;

    protected $updatesQueryString = [
        ['query' => ['search' => '', 'start' => '', 'end' => '']]
    ];


    protected $listeners = [
        'getDateForInput' => 'getDateForInput',
        'setSelectReport' => 'setSelectReport',
    ];

    public function render()
    {
        if ($this->start == null && $this->end == null) {
            $this->start = Carbon::now()->subDays(30)->format('Y-m-d');
            $this->end = Carbon::now()->format('Y-m-d');
        }

        if ($this->reportSelected == 0) {
            $data = $this->article();
        } else {
            $data = $this->users();
        }

        return view('livewire.datatable.report-datatable', [
            'start' => $this->start,
            'end' => $this->end,
            'data' => $data
        ]);
    }

    public function article()
    {
        $status = Post::select('status', DB::raw('count(*) as total'))
            ->whereBetween('created_at', [$this->start, $this->end])
            ->groupBy('status')
            ->get();

        $collection = (new Collection($status))->toArray();

        $softDelete = Post::onlyTrashed()
            ->whereBetween('created_at', [$this->start, $this->end])
            ->count();

        if ($softDelete > 0) {
            $collection[] = ['status' => 'TRASH', 'total' => $softDelete];
        }

        return $collection;
    }

    public function users()
    {
        $role = $this->reportSelected == 1 ? 'writter' : 'editor';
        $users = User::query()->withWhereHas('roles', fn($q) => $q->where('name', $role))->withCount([$role == 'writter' ? 'authorPost' : 'editorPost' => function ($query) {
            $query->whereBetween('created_at', [$this->start, $this->end]);
        }])->get();
        return $users;
    }

    public function getDateForInput($param)
    {
        $this->start = $param['start'];
        $this->end = $param['end'];
    }

    public function setSelectReport($param)
    {
        $this->reportSelected = $param;
    }
}
