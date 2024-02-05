<?php

namespace App\Controllers\Admin;

use App\Models\Materials;
use App\Controllers\BaseController;
use App\Helpers\HelperTrait;
use App\Helpers\Translator;
use CodeIgniter\HTTP\ResponseInterface;

class MaterialsController extends BaseController
{
    use Translator;
    use HelperTrait;

    public function __construct()
    {
        $this->model = new Materials();
    }

    public function materials()
    {
        $this->model->orderBy('id', 'DESC');

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
        $data['slug'] = $this->translit($data['title']);

        if (!$this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'text'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            return $this->add();
        }

        $this->model->insert($data);
        return redirect()->to('/admin');
    }

    public function edit(string $slug)
    {
        return view('admin/materials/edit', [
            'title' => 'АДМИНКА: Обновить материал',
            'material' => $this->model->find($this->getIdFromSlug($slug)),
            'redirect' => request()->getServer('HTTP_REFERER')
        ]);
    }

    public function update(string $slug)
    {
        $data = $this->request->getPost(['title', 'text']);
        $data['slug'] = $this->translit($data['title']);

        if (!$this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'text'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            return $this->edit($slug);
        }

        $this->model->update($this->getIdFromSlug($slug), $data);
        return redirect()->to($this->request->getPost('redirect'));
    }

    public function delete()
    {
        $this->model->delete($this->request->getGet('id'));
        return redirect()->to('/admin');
    }
}
