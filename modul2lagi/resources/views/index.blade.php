@extends('layouts.app')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="container">
  <h2>Data Pegawai Aktif</h2>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Create
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{ route('karyawans.store') }}">
        <div class="modal-body">

          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone"/>
          </div>
          <div class="form-group">
              <label for="adresse">Adresse</label>
              <input type="text" class="form-control" name="adresse"/>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary mb-3 mt-3">Create Karyawan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->

{{-- <div class="container">
    <a href="{{ route('karyawans.create')}}" class="btn btn-primary btn-sm mb-3 mt-3">Create</a>
</div> --}}

<div class="push-top">
    
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="container">
    <table class="table">
        <thead>
            <tr class="table-warning">
              <td>ID</td>
              <td>Name</td>
              <td>Email</td>
              <td>Phone</td>
              <td>Adresse</td>
              <td class="text-center">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $karyawans)
            <tr>
                <td>{{$karyawans->id}}</td>
                <td>{{$karyawans->name}}</td>
                <td>{{$karyawans->email}}</td>
                <td>{{$karyawans->phone}}</td>
                <td>{{$karyawans->adresse}}</td>
                <td class="text-center">
                    <a href="{{ route('karyawans.edit', $karyawans->id)}}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('karyawans.destroy', $karyawans->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
  </div>
  
<div>
  
@endsection