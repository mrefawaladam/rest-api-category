<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAll($search = null, $perPage = 10)
    {
        $query = Category::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->paginate($perPage)->withQueryString();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function findById($id)
    {
        return Category::find($id);
    }

    public function update($id, array $data)
    {
        $category = $this->findById($id);
        if ($category) {
            $category->update($data);
        }
        return $category;
    }

    public function delete($id)
    {
        $category = $this->findById($id);
        if ($category) {
            $category->delete();
        }
        return $category;
    }
}
