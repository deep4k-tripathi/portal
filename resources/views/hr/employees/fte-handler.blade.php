@extends('layouts.app')

@section('content')
    <div class="container"><br>
        <div class="d-flex justify-content-between">
            <div class="text-primary"><h1>Recommendations</h1></div>
            <div><button type="button" class="btn btn-success align-right" data-toggle="modal" data-target="#requisitionModal"><i class="fa fa-plus mr-1"></i>Add Requisition</button></div>
        </div>
        <div class="modal fade" id="requisitionModal" tabindex="-1" role="dialog" aria-labelledby="requisition" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="requisition">Job Requisition</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employees.store') }}" method="post">
                            @csrf
                            <div>
                                <label for="domain_dropdown">select Domain</label>
                                <select class="form-control" name="domain" id="domain "> 
                                    @foreach ($DomainName as $DomainName)
                                        <option value="{{ $DomainName->id }}">{{ $DomainName->domain }}</option>
                                    @endforeach 
                                </select><br>
                            </div>
                            <div>
                                <label for="job_apportunity">select Job</label>
                                <select class="form-control" name="job" id="job"> 
                                    @foreach ($jobName as $jobName)
                                        <option value="{{ $jobName->id }}">{{ $jobName->title }}</option>
                                    @endforeach 
                                </select><br>
                            </div><br>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-action="SendHiringMail">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr class="sticky-top">
                <th>Name</th>
                <th>Projects Count</th>
                <th>Current FTE</th>
            </tr>
            @foreach ($employees as $employee)
                <tr>
                    <td>
                        <a href={{ route('employees.show', $employee->id) }}>{{ $employee->name }}</a>
                    </td>
                    <td>
                        @if($employee->user == null)
                            0
                        @else
                            {{count($employee->user->activeProjectTeamMembers)}}
                        @endif
                    </td>
                    <td>
                        @if ($employee->user == null)
                            <span class="text-danger">{{ $employee->user ? $employee->user->fte :'NA' }}</span>
                        @elseif ( $employee->user->fte < 0.7 )
                        <span class="text-danger">{{ $employee->user->fte }}</span>
                        @endif
                        
                       
                    </td>
                </tr>
            @endforeach
        </table> 
        </div>
    </div>
@endsection
