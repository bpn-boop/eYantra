<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Display the list of categories
    public function index()
    {
        // Assuming you will fetch categories later
        // $categories = Category::all(); // Uncomment and modify as needed
        return view('admin.category.index'); // Replace with your actual view
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.category.create');
    }

    // Store a newly created category
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        // If validation passes
        if ($validator->passes()) {
            // Create the category (uncomment when you have a Category model)
            // $category = Category::create($request->only(['name', 'slug', 'status']));

            return response()->json([
                'status' => true,
                'message' => 'Category created successfully.',
                // 'data' => $category, // Include this if you return the created category
            ]);
        } else {
            // Return validation errors
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    // Show the form for editing a category
    public function edit($id)
    {
        // Assuming you will fetch the category later
        // $category = Category::findOrFail($id);
        return view('admin.category.edit'); // Replace with your actual view
    }

    // Update an existing category
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        ]);

        // If validation passes
        if ($validator->passes()) {
            // Update the category (uncomment when you have a Category model)
            // $category = Category::findOrFail($id);
            // $category->update($request->only(['name', 'slug', 'status']));

            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully.',
                // 'data' => $category, // Include this if you return the updated category
            ]);
        } else {
            // Return validation errors
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    // Delete a category
    public function destroy($id)
    {
        // Assuming you will delete the category later
        // $category = Category::findOrFail($id);
        // $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully.',
        ]);
    }
}
