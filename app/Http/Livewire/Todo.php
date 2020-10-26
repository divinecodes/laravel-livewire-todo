<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class Todo extends Component
{
    public $data, $title, $deadline, $status, $selected_id, $completed;
    public $update_mode = false; 

    public function render()
    {
        $this->data = Item::all(); 
        return view('livewire.todo.component');
    }

    private function resetInputs() 
    {
        $this->title = null; 
        $this->deadline = null;
    }

    public function store() 
    {
        $this->validate([
            'title'=> 'required|min:6', 
            'deadline'=> 'required'
        ]); 

        $todo = Item::create([
            'title'=>$this->title, 
            'deadline'=> $this->deadline, 
            'status'=> 'active'
        ]); 

        $this->resetInputs(); 
    }


    public function edit($id)
    {
        $item = Item::findOrFail($id);

        $this->selected_id = $id; 
        $this->title = $item->title; 
        $this->deadline = $item->deadline; 

        $this->update_mode = true; 
    }

    public function update()
    {
        $this->validate([
            'selected_id'=> 'required|numeric',
            'title'=> 'required|string',
            'deadline'=> 'required'
        ]);

        if($this->selected_id){
            $record = Item::find($this->selected_id); 
            $record->update([
                'title'=> $this->title, 
                'deadline'=>$this->deadline
            ]);

            $this->resetInputs(); 
            $this->update_mode = false; 
        }
    }

    public function destroy($id)
    {
        if($id){
            $record = Item::find($id);
            $record->delete();
        }
    }
}
