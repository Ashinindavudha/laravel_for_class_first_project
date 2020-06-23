@extends('layouts.main')
@section('style')
<link rel="stylesheet" href="{{ asset('datatable/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
<div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">
<div>
  <a href="{{ route('chapters.create') }}" class="btn btn-success">သဒ္ဒါရှစ်ဆောင် အပိုင်းနာမည် ထည့်ရန်</a>
</div>
        {{-- Start Here Data Table --}}

<table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>ID</th>
{{--         <th class="th-sm">Chapter Name
        </th> --}}
        <th class="th-sm">Chapter Title</th>
        <th class="th-sm">Created Date
        </th>
        <th class="th-sm">Action
        </th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($chapters as $key => $data)
      <tr>
        <td>{{ $data->id }}</td>
        
        <td>{{ $data->title }}</td>
        <td>{{ $data->created_at }}</td>
       <td>
                <a href="{{ route('chapters.edit', $data->id )}}" class="btn btn-primary">Edit</a>
                <a href="{{ route('chapters.show', $data->id) }}" class="btn btn-success">Show</a>
                <form action="{{ route('chapters.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-xs btn-danger" value="Detele">
      </form>
              </td>
        
      </tr>
      @endforeach
      
    </tbody>
    <tfoot>
      <tr>
        <th>ID
        </th>
        {{-- <th>Chapter Name
        </th> --}}
        <th>Sutta Title</th>
        <th>Created Date
        </th>
        <th>Action
        </th>
        
      </tr>
    </tfoot>
  </table>
        {{-- End Datatable --}}
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
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
  <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('datatable/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $('#dt-basic-checkbox').dataTable({

      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'os',
        selector: 'td:first-child'
      }
    });
  </script>
@stop