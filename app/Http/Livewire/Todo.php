<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class Todo extends Component
{
    public $data, $title, $deadline, $status, $selected_id, $completed;
    public $message; 
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
        $this->message = null;
        $this->validate([
            'title'=> 'required|min:6', 
            'deadline'=> 'required'
        ]); 

        $todo = Item::create([
            'title'=>$this->title, 
            'deadline'=> $this->deadline, 
            'status'=> 'active'
        ]); 

        $this->message = "New Todo Item Added";
        $this->resetInputs(); 
    }


    public function edit($id)
    {
        $this->message = null;
        $item = Item::findOrFail($id);

        $this->selected_id = $id; 
        $this->title = $item->title; 
        $this->deadline = $item->deadline; 

        $this->update_mode = true; 
    }

    public function completed($id)
    {
        $this->message = null;
        $item = Item::find($id); 
        if($item){
            $item->completed = $item->completed ? null : now();
            $item->update(); 
        }

        $this->message = "Item Marked Completed";
    }

    public function update()
    {
        $this->message = null;
        $this->validate([
            'selected_id'=> 'required|numeric',
            'title'=> 'required|string',
            'deadline'=> 'required'
        ]);

        if($this->selected_id){
            $record = Item::find($this->selected_id); 
            if($record){

                $record->update([
                    'title'=> $this->title, 
                    'deadline'=>$this->deadline
                ]);

                $this->resetInputs(); 
                $this->update_mode = false; 

                $this->message = "Item Updated Successfully";
            }
        }
    }

    public function destroy($id)
    {
        $this->message = null;
        if($id){
            $record = Item::find($id);
            $record->delete();
        }

        $this->message = "Item Deleted Successfully";
    }
}
