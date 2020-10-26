<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Update Todo Item</h3>
    </div>
    <div class="panel-body">
        <div class="form-inline">
            <div class="input-group">
                Title 
                <input wire:model="title" type="text" class="form-control input-sm">
            </div>
            <div class="input-group">
                Deadline
                <input wire:model="deadline" type="datetime" class="form-control input-sm">
            </div>
            <div class="input-group">
                <br />
                <button wire:click="update()" class="btn btn-info">Update</button>
            </div>
        </div>
    </div>
</div>