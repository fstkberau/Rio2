@extends('layouts.app')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="container">
  <h2>Data Story</h2>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Create
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Story</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{ route('stories.store') }}">
        <div class="modal-body">

          <div class="form-group">
              @csrf
              <label for="story">Story</label>
              <input type="text" class="form-control" name="story"/>
          </div>
          <div class="form-group">
              <label for="points">Points</label>
              <input type="number" class="form-control" name="points"/>
          </div>
          <div class="form-group">
            <label for="actual_point">Actual Points</label>
            <input type="number" class="form-control" name="actual_point"/>
          </div>
          <div class="form-group">
            <label for="remaining_point">Remaining Points</label>
            <input type="number" class="form-control" name="remaining_point"/>
          </div>
          <div class="form-group">
            <label for="remaining_point">Sprint Backlog Status</label>
            <select name="status" class="form-select">
              <option value="progress">In Progres</option>
              <option value="done_dev">Done Dev</option>
              <option value="to_test">To Test</option>
              <option value="to_review">To Review</option>
              <option value="done">Done</option>
              <option value="incomplete">Incomplete</option>
              <option value="rejected">Rejected</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="test_date">To Test Date</label>
            <input type="date" class="form-control" name="test_date"/>
          </div>
          <div class="form-group">
            <label for="note">Note</label>
            <input type="text" class="form-control" name="note"/>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary mb-3 mt-3">Create Story</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->

{{-- <div class="container">
    <a href="{{ route('stories.create')}}" class="btn btn-primary btn-sm mb-3 mt-3">Create</a>
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
              <td>Story</td>
              <td>Points</td>
              <td>Actual Points</td>
              <td>Remaining Points</td>
              <td>Sprint Backlog Status</td>
              <td>To Test Date</td>
              <td>Note</td>
              <td class="text-center">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($story as $stories)
            <tr>
                <td>{{$stories->id}}</td>
                <td>{{$stories->story}}</td>
                <td>{{$stories->point}}</td>
                <td>{{$stories->actual_point}}</td>
                <td>{{$stories->remaining_point}}</td>
                <td>
                  <select name="status" id="update_status" class="form-select update_status">
                    <option value="progress" {{ $stories->status=='progress' ? 'selected' : '' }}>In Progres</option>
                    <option value="done_dev" {{ $stories->status=='done_dev' ? 'selected' : '' }}>Done Dev</option>
                    <option value="to_test" {{ $stories->status=='to_test' ? 'selected' : '' }}>To Test</option>
                    <option value="to_review" {{ $stories->status=='to_review' ? 'selected' : '' }}>To Review</option>
                    <option value="done" {{ $stories->status=='done' ? 'selected' : '' }}>Done</option>
                    <option value="incomplete" {{ $stories->status=='incomplete' ? 'selected' : '' }}>Incomplete</option>
                    <option value="rejected" {{ $stories->status=='rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="cancelled" {{ $stories->status=='cancelled' ? 'selected' : '' }}>Cancelled</option>
                  </select>
                </td>
                <td>{{$stories->test_date}}</td>
                <td>{{$stories->note}}</td>
                <td class="text-center">
                    <a href="{{ route('stories.edit', $stories->id)}}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('stories.destroy', $stories->id)}}" method="post" style="display: inline-block">
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

  <script>
  $('.update_status').on('change', function() {
    alert('tes')
  })
  </script>

@endsection