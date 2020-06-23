@extends('layouts.main')

@section('content')
<div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <form action="{{ route("suttas.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="form-group {{ $errors->has('chapter_id') ? 'has-error' : '' }}">
                    <label for="chapter_id">Chapter Name</label>
                    <select name="chapter_id" id="chapter_id" class="form-control" required>
                        @foreach($chapter_select as $id => $select_data)
                            <option value="{{ $id }}">{{ $select_data }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('chapter_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('chapter_id') }}
                        </em>
                    @endif
                </div>
          <div class="form-group">
            <label for="name">သုတ်စဥ◌်</label>
            <input type="text" class="form-control" name="name">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Data</button>
          </div>
        </form>
        <!-- Comments Form -->
        <div class="card my-4">
          <div class="card-body">
           
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <div class="media-body">
           
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <div class="media-body">
            

            <div class="media mt-4">
              <div class="media-body">
                
              </div>
            </div>

            <div class="media mt-4">
              <div class="media-body">
               
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

@endsection