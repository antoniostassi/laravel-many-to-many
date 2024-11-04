@extends('layouts.app')

@section('main-content')

<a href="{{route('admin.projects.create')}}" class="btn btn-success mb-2">+ Crea un nuovo Progetto</a>

<table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Date of Creation</th>
        <th scope="col">Endline</th>
        <th scope="col">Tag</th>
        <th scope="col">Price</th>
        <th scope="col">Completed</th>
        <th scope="col">Category</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->name}}</td>
            <td>{{$project->description}}</td>
            <td>{{$project->creation_date}}</td>
            <td>{{$project->expiring_date}}</td>
            <td>{{$project->label_tag}}</td>
            <td>{{$project->price}}</td>
            <td>{{$project->completed}}</td>

            @if (isset($project->type))
              <td>{{$project->type->name}}</td>
            @else
              <td>-</td>
            @endif
            
            <td><a class="btn btn-primary" href="{{route('admin.projects.show', $project->id)}}">Visualizza</a></td>
            <td><a class="btn btn-warning" href="{{route('admin.projects.edit', $project->id)}}">Modifica</a></td>
            <td>
              <form action="{{route('admin.projects.destroy', $project->id)}}" class="d-inline-block" method="post" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina</button>
              </form>
            </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>

@endsection

<style>
    tr:hover {
        cursor:pointer;
    }
    
    td,th {
        font-size:0.9rem;
    }
</style>