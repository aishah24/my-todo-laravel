@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 text-center">Senarai Tugasan Saya</h5>
        </div>
        <div class="card-body">
            <form action="/tambah" method="POST" class="d-flex mb-3">
                @csrf
                <input type="text" name="task" class="form-control me-2" placeholder="Tulis tugasan baru..." required>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>

            <ul class="list-group">
                @foreach($tasks as $t)
<li class="list-group-item d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <form action="/check/{{ $t->id }}" method="POST" class="me-2">
            @csrf
            <input type="checkbox" onChange="this.form.submit()" {{ $t->is_done ? 'checked' : '' }}>
        </form>
        
        <span style="{{ $t->is_done ? 'text-decoration: line-through; color: gray;' : '' }}">
            {{ $t->nama_tugasan }}
        </span>
    </div>

    <div>
        <a href="/edit/{{ $t->id }}" class="btn btn-sm btn-outline-primary">Edit</a>
        <form action="/padam/{{ $t->id }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">X</button>
        </form>
    </div>
</li>
@endforeach
            </ul>
        </div>
    </div>
</div>
@endsection