<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $categories = Category::all();
        // return $categories = Category::latest()->get(); // latest use korle new insurt data gulo age pabo.
        // $categories = Category::latest()->get(['id', 'name', 'slug']);

        // ---- Paginate -----//
        $categories = Category::latest()->paginate(5);

        return view()->exists('category.index') ? view('category.index', compact('categories')) : abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view()->exists('category.create') ? view('category.create') : abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'unique:categories,name'],
        //     'image' => ['required', 'mimes:jpg,png']
        // ]);

        /*
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->name;
        $category->save();
        */

        $file = $request->file('image');
        $fileName = time() . '_' . uniqid() . '.' . $file->extension();
        storage::putFileAs("public/image/category", $file, $fileName);
        $path = "storage/image/category/" . $fileName;

        $result = Category::create([
            'name' => $request->name,
            'slug' => $request->name,
            'image' => $path
        ]);

        if($result){
            // session()->flash('success', 'Data Save Successfully!');
            $this->setNotificationMessage('Data Save Successfully!', 'success');

            return redirect()->route('category.index');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view()->exists('category.show') ? view('category.show', compact('category')) : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view()->exists('category.edit') ? view('category.edit', compact('category')) : abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $oldImgPath = $category->image;
        
        if($request->file('image')){

            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->extension();
            storage::putFileAs("public/image/category", $file, $fileName);
            $path = "storage/image/category/" . $fileName;
            
            
            
            $data = [
                'name'=> $request->name,
                'slug'=> $request->name,
                'image'=> $path,
            ];
            $category->update($data);

            if(file_exists($oldImgPath)){
                unlink($oldImgPath);
            }
        }else{
            $category->update([
                'name'=> $request->name,
                'slug'=> $request->name

            ]);
        }
        $this->setNotificationMessage('Data Update Successfully!', 'success');
        return redirect()->route('category.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(file_exists($category->image)){
            unlink($category->image);
        }
        $category->delete();
        $this->setNotificationMessage('Data Delete Successfully!', 'danger');
        return back();
    }
}
