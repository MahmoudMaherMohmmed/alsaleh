@extends('dashboard.layouts.master')

@section('title') {{__('admins.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('users.index') }}">{{ __('admins.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$user->name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('admins.attributes.id') }}</th>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('admins.attributes.name') }}</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('admins.attributes.email') }}</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('admins.attributes.phone') }}</th>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('admins.attributes.status') }}</th>
                                    <td> <span class="badge {{$user->status->color()}}">{{$user->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('admins.attributes.created_at') }}</th>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('admins.attributes.avatar') }}</th>
                                    <td> <img class="brround" height="200px" width="200px" src="{{$user->getAvatar()}}"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('admins.actions.actions') }}</th>
                                    <td> 
                                        @include('dashboard.users.partials.actions.edit')
                                        @include('dashboard.users.partials.actions.delete')
                                    </td>
                                    @include('dashboard.users.partials.models.delete')
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection

@section('js') @endsection