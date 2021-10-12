<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = UserSkill::latest()->paginate(5);
        return view()->exists('skill.index') ? view('skill.index', compact('skills')) : abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Policy prevant in controller
        // Create method er jonno instance pass korte hoy na. jsut model class ta bole dile e hoy.
        // Karon e ekane Use er roel e upor base kore condition use korci.
        $this->authorize('create', UserSkill::class);
        return view()->exists('skill.create') ? view('skill.create') : abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = time() . '_' . uniqid() . '.' . $file->extension();
        storage::putFileAs("public/image/skill", $file, $fileName);
        $path = "storage/image/skill/" . $fileName;

        $result = UserSkill::create([
            'name' => $request->name,
            'user_id' => rand(1, 3),
            'slug' => $request->name,
            'image' => $path
        ]);

        if($result){
            // session()->flash('success', 'Data Save Successfully!');
            $this->setNotificationMessage('Data Save Successfully!', 'success');

            return redirect()->route('skill.index');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserSkill $skill)
    {
        // Policy prevant in controller
        // Protome policy Method ta dite hobe tar por Model er instance ta pass kore dite hobe.
        $this->authorize('view', $skill);

        return view()->exists('skill.show') ? view('skill.show', compact('skill')) : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSkill $skill)
    {
        // Policy prevant in controller
        // Protome policy Method ta dite hobe tar por Model er instance ta pass kore dite hobe.
        $this->authorize('update', $skill);

        return view()->exists('skill.edit') ? view('skill.edit', compact('skill')) : abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSkill $skill)
    {
        $oldImgPath = $skill->image;
        
        if($request->file('image')){

            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->extension();
            storage::putFileAs("public/image/skill", $file, $fileName);
            $path = "storage/image/skill/" . $fileName;
            
            
            
            $data = [
                'name'=> $request->name,
                'slug'=> $request->name,
                'image'=> $path,
            ];
            $skill->update($data);

            if(file_exists($oldImgPath)){
                unlink($oldImgPath);
            }
        }else{
            $skill->update([
                'name'=> $request->name,
                'slug'=> $request->name

            ]);
        }
        $this->setNotificationMessage('Data Update Successfully!', 'success');
        return redirect()->route('skill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSkill $skill)
    {
        if(file_exists($skill->image)){
            unlink($skill->image);
        }
        $skill->delete();
        $this->setNotificationMessage('Data Delete Successfully!', 'danger');
        return back();
    }
}
