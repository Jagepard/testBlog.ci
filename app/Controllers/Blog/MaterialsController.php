<?php

namespace App\Controllers\Blog;

use App\Controllers\BaseController;
use App\Models\Materials;
use CodeIgniter\HTTP\ResponseInterface;

class MaterialsController extends BaseController
{
    public function __construct()
    {
        $this->model = new Materials();
    }

    public function index()
    {
        return view('blog/index', [
            'materials'   => $this->model->paginate(1, 'group1'),
            'pager'       => $this->model->pager,
            'currentPage' => $this->model->pager->getCurrentPage('group1'), // The current page number
            'totalPages'  => $this->model->pager->getPageCount('group1'),   // The total page count
            'title' => 123456
        ]);
    }

    public function item(string $slug)
    {
        return view('blog/item', [
            'material' => $this->model->find($slug),
            'title' => 123456
        ]);
    }
}
