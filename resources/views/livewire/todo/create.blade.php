<div class="card">
    <div class="card-header bg-info">
        <h5 class="card-title text-white">Add Todo Item</h5>
    </div>
    <div class="card-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label>Title</label>
                <input wire:model="title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Deadline</label>
                <input wire:model="deadline" type="date" class="form-control">
            </div>
            <div class="input-group">
                <br />
                <button wire:click="store()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
