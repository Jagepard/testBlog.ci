<?php

namespace App\Controllers\Admin;

use App\Models\Materials;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MaterialsController extends BaseController
{
    public function __construct()
    {
        $this->model = new Materials();
    }

    public function materials()
    {
        return view('admin/materials/index', [
            'materials'   => $this->model->paginate(10, 'group1'),
            'pager'       => $this->model->pager,
            'currentPage' => $this->model->pager->getCurrentPage('group1'), // The current page number
            'totalPages'  => $this->model->pager->getPageCount('group1'),   // The total page count
            'title'       => 'АДМИНКА: список материалов'
        ]);
    }

    public function add()
    {
        return view('admin/materials/add', [
            'title' => 'АДМИНКА: Добавить материал',
        ]);
    }

    public function create()
    {
        $data = $this->request->getPost(['title', 'text']);

        if (!$this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'text'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            return $this->add();
        }

        $this->model->insert($data);
        return redirect()->to('admin');
    }
}
