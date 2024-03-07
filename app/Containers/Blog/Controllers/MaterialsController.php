<?php

namespace Blog\Controllers;

use Blog\Models\Materials;
use Blog\Helpers\HelperTrait;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MaterialsController extends BaseController
{
    use HelperTrait;

    public function __construct()
    {
        $this->model = new Materials();
    }

    public function index()
    {
        $this->model->orderBy('id', 'DESC');

        return view('Blog\index', [
            'materials'   => $this->model->paginate(10, 'group1'),
            'pager'       => $this->model->pager,
            'currentPage' => $this->model->pager->getCurrentPage('group1'), // The current page number
            'totalPages'  => $this->model->pager->getPageCount('group1'),   // The total page count
            'title'       => $this->title
        ]);
    }

    public function item(string $slug)
    {
        $material = $this->model->find($this->getIdFromSlug($slug));

        return view('Blog\item', [
            'material' => $material,
            'title'    => "$this->title :: {$material['title']}"
        ]);
    }
}
