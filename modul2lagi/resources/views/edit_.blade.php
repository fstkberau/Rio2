@extends('layouts.app')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="container card push-top">
  <div class="card-header">
    Edit & Update
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('karyawans.update', $karyawan->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $karyawan->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $karyawan->email }}"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" value="{{ $karyawan->phone }}"/>
          </div>
          <div class="form-group">
              <label for="adresse">Address</label>
              <input type="text" class="form-control" name="adresse" value="{{ $karyawan->adresse }}"/>
          </div>
          <div>
              <button type="submit" class="btn btn-primary">Update Karyawan</button>
              <a href="/index" class="btn btn-danger">Cancel</a>
              {{-- <a href="{{ route('karyawans.index')}}" class="btn btn-danger">Cancel</a> --}}
          </div>
          
      </form>
  </div>
</div>
@endsection