@extends('master')
@section('content')
<style>
    body {
        background-color: #f5f7fa;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
</style>

<div class="container mt-5">
    <a href="#" class="btn btn-secondary mb-4">
        <i class="bi bi-arrow-left-circle"></i> Back to Leads
    </a>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-person-lines-fill"></i> Lead Details</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Name:</strong>gdgdfsg
                </div>
                <div class="col-md-6">
                    <strong>Email:</strong> dsfsdf
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Phone:</strong> dsffadf
                </div>
                <div class="col-md-6">
                    <strong>Course:</strong> sdfsdf
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Unclear Paper:</strong> dsffsd
                </div>
                <div class="col-md-6">
                    <strong>Enrolled Year:</strong> dsfds
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Degree Purpose:</strong> sdff
                </div>
                <div class="col-md-6">
                    <strong>Submitted By (User ID):</strong>sdfdf
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <strong>Created At:</strong> asdfadsf
                </div>
                <div class="col-md-6">
                    <strong>Last Updated:</strong> sdfdsf
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
