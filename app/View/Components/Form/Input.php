<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // Notes------
    // Ai class file e joto shob public Property or Variable ache shob Component er Blade file e availabe.
    // View te compect kore data pass korte hobe na. Se auto data gulo pass kore dei.

    // Component amara kokhon Use korbo---?
    // Jodi amon kono content thake jeta amader onek gulo view te lagete pare sei gulo amara componet use kore korbo.
    // Ata onek ta Include er moto kaj kore.

    // Component create korte hobe Artisan Comand use korte hobe - php artisan make:componet Alert
    // Sub Folder er modde create korte chaile use korbo - php artisna make:component Form/Input

    // Ata 2ta file create kore akta class file. jeta thake App/View/components er modde. 
    // je khane chaile amara logic use korte parbo. and view thek data pass kore oi gulo Constructor er mode dorte parbo.
    // And proyjon moto component er view file e pass kore dibo.

    // Ar akta file create kore Resorce/Views/Componets er modde jeta akta Blade file. oi khane amader Content gulo define kore rakhbo.

    // Component Blade file call korte hoy - <x-componentName/> Or <x-componentName> <x-componentName/>


    // Notes---
    // Amara chaile Component er ata Custom Name use kote pari, jeta dite Component ke access korte parbo.
    // Ata korar jonno AppServiceProvider er boot Function er modde Component er Class file ta ke Key Value akare define kore dite hobe. means Register.
    // Ata korle component ta dekhte shondor lage. name ta fodi onek boro o hoy se khetre higibigi dekha jay na.

    public $title;
    public $name;
    public $users;
    public function __construct($title, $name, $users)
    {
        $this->title = $title;
        $this->name = $name;
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
