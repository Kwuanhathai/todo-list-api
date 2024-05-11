<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;


class TodoController extends Controller
{
  
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }


    public function store(Request $request)
    {
        try {
            $attribute = $request->validate([
                'title' => 'required',
                'description' => 'nullable'
            ]);
    
            Todo::create($attribute);

            return response()->json([
                'message' => 'To-do list created successfully!'
            ]);
        }catch(\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something foes wrong while creating a to-do list!'
            ], 500);

        }
        
    }


    public function show(Todo $todo)
    {
        return response()->json([
            'todo'=>$todo
        ]);
    }


    public function update(Request $request, $id)
    {
        
        if ($request->has('isDone')){

            try {
                $todo = Todo::findOrFail($id);
                
                $todo->isDone = !$todo->isDone;
                $todo->save();
        
                return response()->json(['message' => 'Boolean attribute toggled successfully'], 200);
            } catch (\Exception $e) {

                return response()->json(['error' => 'Failed to toggle boolean attribute'], 500);
            }
            
        }else {

            $request->validate([
                'title' => 'required',
                'description' => 'nullable',
            ]);
    
            try {
                $todo = Todo::findOrFail($id);
                $todo->update($request->all());
    
                return response()->json(['message' => 'Todo updated successfully', 'todo' => $todo]);
    
            } catch(\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json(['message' => 'Failed to update todo'], 500);
            }

        }

    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
    }

}
