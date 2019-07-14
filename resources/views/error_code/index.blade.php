@extends('put.theme')
@section('title', 'Error Code')

@section('body')

    <div class="content container-fluid" id="itemsDropdown">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Error Code List</h4>
                @include('alert.success')
                @include('alert.error')
            </div>

            <div class="col-sm-4 col-6 text-right m-b-30">
                <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#add_operator"><i class="fa fa-plus"></i> Add Error Code</a>
            </div>

        </div>

        <div class="content-page">

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-primary table-striped table-hover">
                            <thead class="table-dark">

                            <tr class="text-center">
                                <th style="min-width:70px;">#</th>
                                <th style="min-width:50px;">Error Name</th>
                                <th style="min-width:50px;">Error Code</th>
                                <th style="min-width:50px;">Limit</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class=" table table-striped table-border table-sm">
                            @if(!empty($Settings))
                                @foreach ($Settings as $Setting)
                                    <tr class="text-center ourItem">
                                        <td> {{ $loop->iteration }} </td>
                                        <td>  {{$Setting->ErrorName}}</td>
                                        <td>  {{$Setting->ErrorCode}}</td>
                                        <td>  {{$Setting->Limit}}</td>

                                        <td class="text-center">
                                            <div>
                                                <a style="display: inline-block" href="{{ url('/SwitchSetting/'.$Setting->id.'/edit') }}" class="btn btn-primary btn-sm mb-1">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>

                                                <form style="display: inline-block" action="{{ url('/SwitchSetting/'.$Setting->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm mb-1">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $Settings->links() }}
                </div>

            </div>
        </div>

    </div>

    <div id="add_operator" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h4 class="modal-title">Add Error Code</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('SwitchSetting.store') }}" id="form_validation" class="uk-form-stacked" method='post' enctype='multipart/form-data' charset='utf-8'>
                        {{ csrf_field() }}

                        <div class="form-group custom-mt-form-group">
                            <input type="text" name="ErrorName" placeholder="Enter Error Name"/>
                            <label class="control-label">Error Name</label><i class="bar"></i>
                        </div>

                        <div class="form-group custom-mt-form-group">
                            <input type="number" name="ErrorCode" placeholder="Enter Error Code"/>
                            <label class="control-label">Error Code</label><i class="bar"></i>
                        </div>
                        <div class="form-group custom-mt-form-group">
                            <input type="number" name="Limit" placeholder="Enter Limit"/>
                            <label class="control-label">Limit</label><i class="bar"></i>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-success btn-small" type="submit"><span>Submit</span> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
