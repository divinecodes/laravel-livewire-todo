<div>
    <div  class="title">Laravel Livewire Todo App</div>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> Sorry!</strong> invalid input <br/><br />
            <ul style="list-style-type:none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 


    @if($update_mode)
        @include('livewire.todo.update')
    @else 
        @include('livewire.todo.create')
    @endif

    <table>
        <thead>
            <th>Item</th>
            <th>Status</th>
            <th>Completed</th>
            <th>Deadline</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($data as $row)
                <td>{{$row->title}}</td>
                <td>{{ucfirst($row->status)}}</td>
                <td>
                    <input type="checkbox" class="form-control" @if($row->completed) checked @endif>
                </td>
                <td>
                    {{$row->deadline}}
                </td>
                <td>
                    <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">Edit</button>
                    <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">DEL</button>
                </td>
            @endforeach
        </tbody>
    </table>
</div>
