<?php
namespace App\Controllers\API;

use App\Models\ProductCategories;
use CodeIgniter\RESTful\ResourceController;

class ProductCategoriesController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $query = new ProductCategories();

        $items = $query->orderBy('created_at', 'desc')->findAll();
        $totalItems = $query->countAllResults();

        $data = [
            'items' => $items,
            'total_items' => $totalItems
        ];

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Get Product Categories.'
            ],
            'data' => $data
        ];

        return $this->respond($response);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $query = new ProductCategories();
        $data = $query->where('id', $id)->first();
        if ($data) {
            return $this->respond($data, 200, 'Show Product Categories');
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
        $query = new ProductCategories();

        $data = [
            'name' => $this->request->getVar('name'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query->insert($data);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Created Product Category.'
            ]
        ];

        return $this->respondCreated($response, 'Created Product Category.');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $query = new ProductCategories();

        $raw = $this->request->getRawInput();

        $data = [
            'name' => $raw['name'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $query->update($id, $data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Updated Product Category.'
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
        $query = new ProductCategories();
        $data = $query->find($id);
        if ($data) {
            $query->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Deleted Product Category'
                ]
            ];

            return $this->respondDeleted($response);
        }

        return $this->failNotFound('Data not found with id ' . $id . '.', 404);
    }
}
