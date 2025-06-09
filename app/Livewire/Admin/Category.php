<?php

namespace App\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Http\Request;

use Livewire\WithPagination;

class Category extends Component
{
   public $category_name;
   public $description;

   public $edit_id;
   public $edit_category_name;
   public $edit_description;

   use WithPagination;
   public function paginationView()  {
    return 'custom-pagination-links-view';
   }
    public function render()
    {
       $categories = ModelsCategory::orderBy('id', 'desc')->paginate(3);

        return view('livewire.admin.category', ['categories'=>$categories])->layout('Layout.admin-app');
    }

    public function resetField(){
    $this->category_name="";
    $this->description="";

    $this->edit_id="";
    $this->edit_category_name="";
    $this->edit_description="";
    }

public function store()
    {
        $validated = $this->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = ModelsCategory::create($validated);

        if ($category) {
            $this->dispatch('addCategory');
            $this->resetField();
           Session()->flash('success','Category Add Successfully');
            // Livewire v3 syntax
            // or $this->emit('addCategory'); for v2
        }

        // Optional: reset form fields
       
    }
   public function editCategory($id)
{
    $category = ModelsCategory::findOrFail($id);
    $this->edit_id = $category->id;
    $this->edit_category_name = $category->category_name;
    $this->edit_description = $category->description;
}

public function update($id)
{
    $category = ModelsCategory::findOrFail($id);

    $validated = $this->validate([
        'edit_category_name' => 'required|string|max:255',
        'edit_description' => 'required|string',
    ]);

    $category->category_name = $this->edit_category_name;
    $category->description = $this->edit_description;

    if ($category->save()) {
        $this->dispatch('updateCategory'); // For v3
        // Or: $this->emit('updateCategory'); // For v2
        $this->resetField();
        Session()->flash('success','Category Updated Successfully');
    }
}


    public function deleteCategory($id)  {
        $result = ModelsCategory::findOrFail($id)->delete();
          Session()->flash('success','Category Deleted Successfully');
    }
}
