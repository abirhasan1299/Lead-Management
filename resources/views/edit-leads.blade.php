@extends('master')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Lead Information</h2>
        <form action="{{route('lead.Edit',$data->id)}}" method="POST">
           @method("PUT")
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$data->name}}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$data->email}}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Course</label>
                    <input type="text" class="form-control" name="course" value="{{$data->course}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Unclear Paper</label>
                    <input type="text" class="form-control" name="unclearPaper" value="{{$data->unclearPaper}}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Enrolled Year</label>
                    <input type="text" class="form-control" name="enrolledYear"  value="{{$data->enrolledYear}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Degree Purpose</label>
                    <input type="text" class="form-control" name="degreePurpose" value="{{$data->degreePurpose}}" >
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="{{$data->date}}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">User</label>
                    <select class="form-control" name="operation" id="">
                        <option  value="{{$data->operation}}" selected>{{ucfirst($data->admin->name)}}</option>
                    @foreach($admin as $a)
                            <option  value="{{$a->id}}">{{ucfirst($a->name)}}</option>
                    @endforeach

                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Next Follow-up</label>
                    <input type="date" class="form-control" name="nextfollowup" value="{{$data->nextfollowup}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="{{$data->status}}" >{{ ucfirst($data->status) }}</option>
                        <option value="live" >Live</option>
                        <option value="death" >Death</option>
                    </select>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Total Fees</label>
                    <input type="text" class="form-control" name="TotalFees" value="{{$data->TotalFees}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Paid Fees</label>
                    <input type="text" class="form-control" name="paidFees" value="{{$data->paidFees}}">
                </div>
                <div class="col-md-4">
                    <label for="form-label" style="color:red;"> *Pending Fees*</label>
                    <input type="text" class="form-control"  value="@php
                        if(empty((int)$data->TotalFees) && empty((int)$data->TotalFees))
                            {
                                echo "NONE";
                            }else{
                                echo ((int)$data->TotalFees -(int)$data->TotalFees);
                            }
                     @endphp" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Reference</label>
                <input type="text" class="form-control" name="Reference" value="{{$data->Reference}}">
            </div>

            <button type="submit" class="btn btn-primary">Update Lead</button>
        </form>
        <br> <br>
        <h2 class="mb-4">Comments</h2>
        <!-- New Comment Form -->
        <form method="POST" action="{{route('lead.addComment')}}">
            @csrf
            <div class="mb-3">

                <textarea placeholder="Add Comment" class="form-control" name="body" rows="3" required></textarea>
                <input type="hidden" name="lead" value="{{$data->id}}">
            </div>
            <button type="submit" class="btn btn-sm btn-success">Post</button>
        </form>
        <br>
        <!-- Comment List -->
        @if($data->commented->count())
            <ul class="list-group mt-3">
                @foreach($data->commented as $comment)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $comment->created_at->diffForHumans() }}</div>
                            {{ $comment->comment }}
                        </div>
                        <div class="btn-group btn-group-sm">
                            <!-- Edit Button -->
                            @if($comment->created_at->gt(now()->subHours(24)))
                                <!-- Show Edit only if comment is < 24 hours old -->
                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">
                                    Edit
                                </button>
                            @endif

                            <!-- Delete Form -->
                            <form action="{{route('comment.destroy',$comment->id)}}" method="POST" onsubmit="return confirm('Delete this comment?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </li>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentLabel{{ $comment->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('comment.edit',$comment->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCommentLabel{{ $comment->id }}">Edit Comment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea class="form-control" name="comment" rows="3" required>{{ $comment->comment }}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </ul>
        @else
            <p class="text-muted mt-3">No comments yet.</p>
        @endif

    </div>

@endsection
