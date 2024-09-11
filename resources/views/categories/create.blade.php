<!-- resources/views/categories/form.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h1>

        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif

            <!-- Name Input -->
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" 
                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Publish Checkbox -->
            <div class="mb-6 flex items-center space-x-3">
                <input type="checkbox" id="is_publish" name="is_publish" value="1" {{ old('is_publish', $category->is_publish ?? false) ? 'checked' : '' }}
                       class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                <label for="is_publish" class="text-lg font-medium text-gray-700">Publish</label>
                @error('is_publish')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Save</button>
                <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
