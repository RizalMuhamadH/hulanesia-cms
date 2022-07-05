<?php

namespace App\Http\Controllers\ContentTypes;

use Illuminate\Http\Request;

abstract class BaseType
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var
     */
    protected $slug;

    /**
     * @var
     */
    protected $row;

    /**
     * @var
     */
    protected $options;

    /**
     * Password constructor.
     *
     * @param Request $request
     * @param $slug
     * @param $row
     */
    public function __construct(Request $request, $slug, $row, $options, $file = null)
    {
        $this->request = $request;
        $this->slug = $slug;
        $this->row = $row;
        $this->options = $options;
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    abstract public function handle();
}