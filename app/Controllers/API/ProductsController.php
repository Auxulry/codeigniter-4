<?php
namespace App\Controllers\API;

use App\Models\Products;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class ProductsController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function ajaxList()
    {
        $request = Services::request();
        $datatable = new Products($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $list->id;
                $row[] = $list->name;
                $row[] = $list->category_name;
                $row[] = $list->description;
                $row[] = $list->price;
                $row[] = '<div class="d-flex justify-content-evenly align-items-center"><button class="btn btn-primary" onclick="update(' . $list->id . ')" >edit</button><button class="btn btn-danger" onclick="destroy(' . $list->id . ')">delete</button></div>';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $query = new Products($this->request);
        $data = $query->where('id', $id)->first();
        if ($data) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Show Product.'
                ],
                'data' => $data
            ];

            return $this->respond($response);
        }

        return $this->failNotFound('Data not found with id ' . $id . '.', 404);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $query = new Products($this->request);

        $img = $this->request->getFile('image');

        if ($img) {
            $filepath = $img->getRandomName();
            $img->move('uploads/', $filepath);
        }
        $data = ['errors' => 'The file has already been moved.'];

        $data = [
            'name' => $this->request->getVar('name'),
            'category_id' => $this->request->getVar('category_id'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'image' => '/uploads/' . $filepath,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query->insert($data);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Created Product.'
            ]
        ];

        return $this->respondCreated($response, 'Created Product.');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $query = new Products($this->request);

        $data = [
            'name' => $this->request->getVar('name'),
            'category_id' => $this->request->getVar('category_id'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query->update($id, $data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Updated Product.'
            ]
        ];

        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $query = new Products($this->request);
        $data = $query->find($id);
        if ($data) {
            $query->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Deleted Product'
                ]
            ];

            return $this->respondDeleted($response);
        }

        return $this->failNotFound('Data not found with id ' . $id . '.', 404);
    }
}
