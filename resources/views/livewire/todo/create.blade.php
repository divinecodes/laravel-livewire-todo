<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Add Todo Item</h3>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="input-group">
                Title 
                <input wire:model="title" type="text" class="form-control input-sm">
            </div>
            <div class="input-group">
                Deadline
                <input wire:model="deadline" type="date" class="form-control input-sm">
            </div>
            <div class="input-group">
                <br />
                <button wire:click="store()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>