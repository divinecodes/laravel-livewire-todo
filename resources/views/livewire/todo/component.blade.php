<div class="container mt-10">
    <div class="row ">
        <div class="col-md align-content-center">
            <h3 class="title">Laravel Livewire Todo App</h3>
        </div>
    </div>

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong> Sorry!</strong> invalid input <br /><br />
        <ul style="list-style-type:none;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-4">
                @if($update_mode)
                @include('livewire.todo.update')
                @else
                @include('livewire.todo.create')
                @endif
            </div>
            <div class="col-md">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col">Status</th>
                            <th scope="col">Completed</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach($data as $row)
                        <tr>
                            <th>{{$count++}}</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
