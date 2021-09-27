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
      <form method="post" action="{{ route('stories.update', $story->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="story">Story</label>
              <input type="text" class="form-control" name="story" value="{{ $story->story }}"/>
          </div>
          <div class="form-group">
              <label for="points">Points</label>
              <input type="number" class="form-control" name="points" value="{{ $story->points }}"/>
          </div>
          <div class="form-group">
              <label for="actual_point">Actual Points</label>
              <input type="number" class="form-control" name="actual_point" value="{{ $story->actual_point }}"/>
          </div>
          <div class="form-group">
              <label for="remaining_point">Remaining Points</label>
              <input type="number" class="form-control" name="remaining_point" value="{{ $story->remaining_point }}"/>
          </div>
          <div class="form-group">
            <label for="remaining_point">Sprint Backlog Status</label>
            <select name="status" class="form-select">
                <option value="progress" {{ $story->status=='progress' ? 'selected' : '' }}>In Progres</option>
                <option value="done_dev" {{ $story->status=='done_dev' ? 'selected' : '' }}>Done Dev</option>
                <option value="to_test" {{ $story->status=='to_test' ? 'selected' : '' }}>To Test</option>
                <option value="to_review" {{ $story->status=='to_review' ? 'selected' : '' }}>To Review</option>
                <option value="done" {{ $story->status=='done' ? 'selected' : '' }}>Done</option>
                <option value="incomplete" {{ $story->status=='incomplete' ? 'selected' : '' }}>Incomplete</option>
                <option value="rejected" {{ $story->status=='rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="cancelled" {{ $story->status=='cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
          </div>
          <div class="form-group">
            <label for="test_date">To Test Date</label>
            <input type="date" class="form-control" name="test_date" value="{{ $story->test_date }}"/>
          </div>
          <div class="form-group">
            <label for="note">Note</label>
            <input type="text" class="form-control" name="note" value="{{ $story->note }}"/>
          </div>

          <div>
              <button type="submit" class="btn btn-primary">Update Story</button>
              <a href="/stories" class="btn btn-danger">Cancel</a>
              {{-- <a href="{{ route('karyawans.index')}}" class="btn btn-danger">Cancel</a> --}}
          </div>
          
      </form>
  </div>
</div>
@endsection