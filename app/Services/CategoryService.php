<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Notifications\CategoryNotification; 
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories(Request $request)
    {
        $search = $request->input('search', null);
        $perPage = 10; 
        return $this->categoryRepository->getAll($search, $perPage);
    }

    public function createCategory(array $data)
    {
        $category = $this->categoryRepository->create($data);
        $this->sendCategoryNotification($category, 'created');
        return $category;
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function updateCategory($id, array $data)
    {
        $category = $this->categoryRepository->update($id, $data);
        $this->sendCategoryNotification($category, 'updated');
        return $category;
    }

    public function deleteCategory($id)
    {
      
        $category = $this->categoryRepository->findById($id);
        $this->sendCategoryNotification($category, 'deleted');
     
        return $this->categoryRepository->delete($id);
    }

    protected function sendCategoryNotification($category, string $action)
    {
      
        $user = User::find(1); 
        if ($user) {
            Notification::route('mail', $user->email)
            ->notify(new CategoryNotification($category, $action));
        }
    }
}
