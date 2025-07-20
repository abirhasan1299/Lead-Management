@extends('master')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin: 50px auto;
            max-width: 95%;
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        thead th {
            background-color: #0d6efd;
            color: white;
            vertical-align: middle;
        }
    </style>
    <h3 class="mb-4">Leads List</h3>
    <table style="font-size: 14px;font-family: 'Poppins';" class="table table-bordered table-hover table-striped">
        <thead class="text-center">
        <!-- Filter Row -->
        <form action="{{route('lead.filter')}}" method="post">
            @csrf
        <tr>
            <th colspan="10">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" name="name" class="form-control" placeholder="Filter by Name" >
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="email" class="form-control" placeholder="Filter by Email" >
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="phone" class="form-control" placeholder="Filter by Phone" >
                    </div>
                    <div class="col-md-3 text-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-funnel-fill"></i> Filter
                        </button>
                    </div>
                </div>
            </th>
        </tr>
        </form>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>User</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $count = 1;
        @endphp
        @foreach($data as $d)
        <tr>
            <td>{{$count++}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->phone}}</td>
            <td>{{ ucfirst($d->admin->name) ?? "None" }}</td>
            <td>
                @php
                    if($d->status=='live')
                        {
                            echo '<span class="badge text-bg-success">Live</span>';
                        }
                    else{
                         echo '<span class="badge text-bg-danger">Dead</span>';
                    }
                @endphp
            </td>
            <td>{{date('d-m-Y',strtotime($d->date))}}</td>

            <td class="d-flex justify-content-center">
                <a href="{{route('lead.edit',$d->id)}}" class="btn btn-sm btn-warning text-dark me-1">
                    <i class="bi bi-pencil-square"></i>
                </a>
                @if(session('role')==='admin')
                    <a href="{{route('lead.delete',$d->id)}}" class="btn btn-sm btn-danger text-dark me-1">
                        <i class="bi bi-trash" style="color:white;"></i>
                    </a>
                @endif
            </td>

        </tr>

        @endforeach
        </tbody>
    </table>
@endsection
