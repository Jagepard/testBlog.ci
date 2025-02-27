<?php

namespace Admin\Controllers;

use Admin\Models\Materials;
use App\Controllers\BaseController;
use Admin\Helpers\HelperTrait;
use Admin\Helpers\Translator;
use CodeIgniter\HTTP\ResponseInterface;

class MaterialsController extends BaseController
{
    use Translator;
    use HelperTrait;

    public function __construct()
    {
        $this->model = new Materials();
        $user = auth()->user();
        
        if (!$user->inGroup('admin')) {
            return redirect()->to('/');
        }
    }

    public function materials()
    {
        $this->model->orderBy('id', 'DESC');

        return view('Admin\materials/index', [
            'materials'   => $this->model->paginate(3, 'group1'),
            'pager'       => $this->model->pager,
            'currentPage' => $this->model->pager->getCurrentPage('group1'), // The current page number
            'totalPages'  => $this->model->pager->getPageCount('group1'),   // The total page count
            'title'       => 'АДМИНКА: список материалов'
        ]);
    }

    public function add()
    {
        return view('Admin\materials/add', [
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

        $data['image'] = $this->imgUpload();
        $this->model->insert($data);
        return redirect()->to('/admin');
    }

    public function edit(string $slug)
    {
        return view('Admin\materials/edit', [
            'title'    => 'АДМИНКА: Обновить материал',
            'material' => $this->model->find($this->getIdFromSlug($slug)),
            'redirect' => $this->request->getServer('HTTP_REFERER')
        ]);
    }

    public function update(string $slug)
    {
        $data = $this->request->getPost(['title', 'text', 'image']);
        $data['slug'] = $this->translit($data['title']);

        if (!$this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'image' => 'max_length[255]',
            'text'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            return $this->edit($slug);
        }

        $imgName = $this->imgUpload();
        $oldImg  = $data['image'];
        
        if (!empty($imgName)) {
            $data['image'] = $imgName;

            if (!empty($oldImg)) {
                $this->removeImg(FCPATH . 'uploads/' . $oldImg);
                $this->removeImg(FCPATH . 'uploads/thumb/' . $oldImg);
            }
        }

        $this->model->update($this->getIdFromSlug($slug), $data);
        return redirect()->to($this->request->getPost('redirect'));
    }

    public function delete()
    {
        $id       = $this->request->getGet('id');
        $material = $this->model->find($id);

        if(!empty($material['image'])) {
            $this->removeImg(FCPATH . 'uploads/' . $material['image']);
            $this->removeImg(FCPATH . 'uploads/thumb/' . $material['image']);
        }

        $this->model->delete($id);

        return redirect()->to('/admin');
    }

    private function imgUpload(): string
    {
        $img = $this->request->getFile('file');
        $imgName = '';

        if ($img->isFile()) {
            if ($this->validateData($this->request->getPost(['file']), [
                'file' =>  [
                        'uploaded[file]',
                        'is_image[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        // 'max_size[file,5000]',
                        // 'max_dims[file,1920,1080]',
                    ],
            ])) {
                if (!$img->hasMoved()) {
                    $imgName = time() . '_' . basename($img->getName());
                    $img->move(FCPATH . 'uploads', $imgName);

                    $thumb = \Config\Services::image();
                    $thumb
                        ->withFile(FCPATH . 'uploads/' . $imgName)
                        ->resize(200, 100, true)
                        ->save(FCPATH . 'uploads/thumb/' . $imgName);
                }
            }
        }

        return $imgName;
    }

    public function imgDelete()
    {
        $id        = $this->request->getGet('id');
        $material  = $this->model->find($id);
        $imgName   = $material['image'];

        $this->model->update($id, ['image' => '']);
        $this->removeImg(FCPATH . 'uploads/' . $imgName);
        $this->removeImg(FCPATH . 'uploads/thumb/' . $imgName);

        return redirect()->to($this->request->getServer('HTTP_REFERER'));
    }

    private function removeImg(string $imgLink): void
    {
        if (file_exists($imgLink)) {
            unlink($imgLink);
        }
    }
}
