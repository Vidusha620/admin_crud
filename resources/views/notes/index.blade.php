@extends('notes.admin')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="mt-4">Notes</h1>
        </div>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ url('notes/create') }}">
                    <i class="fa fa-plus"></i> Create New Note
                </a>
            </div>
            <div class="table table-bordered table-striped mt-4">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th width="80px">No</th>
                            <th>Title</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note )
                        <tr><td>{{ ++$i }}</td>
                            <td>{{$note->title}}</td>
                            <td>{{$note->content}}</td>
                            <td>
                                <a href="{{route('notes.edit',$note->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{route('notes.show',$note->id)}}" class="btn btn-info">Show</a>
                                <form action="{{ route('notes.destroy', $note->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $notes->links() !!}

            </div>
        </div> 
    </div>
</div>

@endsection
