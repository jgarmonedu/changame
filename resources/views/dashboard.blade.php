@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <x-application-logo alt="logo" width="250" class="m-auto"/>
    </div>
@stop

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-3">
        {{ __('Dashboard') }}
    </h2>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $users->count() }}</h3>
                    <p>{{ __('Users register') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.users') }}" class="small-box-footer">
                    {{ __ ('More info') }} <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{ $products->count() }}</h3>
                    <p>{{ __('Contributions') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dice-d6"></i>
                </div>
                <a href="{{ route('admin.products') }}" class="small-box-footer">
                    {{ __ ('More info') }} <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3>{{ $agreements->count() }}</h3>
                    <p>{{ __('Agreements') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-people-arrows"></i>
                </div>
                <a href="#Agreements" class="small-box-footer">
                    {{ __ ('More info') }} <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $products->whereNotNull('campaign')->count() }}</h3>
                    <p>{{ __('Donations') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hands"></i>
                </div>
                <a href="#Donations" class="small-box-footer">
                    {{ __ ('More info') }} <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <hr class="pb-8">
    <div class="row">
        <div class="col-12 col-sm-6">
            <!-- AREA CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">{{ __('User Graphic') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        {!! $userRegistrations->render()  !!}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12 col-sm-6">
            <!-- AREA CHART -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">{{ __('User Graphic') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        {!! $showChartProductsByCategory->render() !!}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="card" id="Agreements">
                <div class="card-header border-0">
                    <h3 class="card-title">{{__('Agreements')}}</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm"> <i class="fas fa-bars"></i> </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle text-xs">
                        <thead>
                        <tr>
                            <th>{{ __('Contribution') }}</th>
                            <th>{{ __('Owner') }}</th>
                            <th>{{ __('State')['name'] }}</th>
                            <th>{{ __('Contribution') }}</th>
                            <th>{{ __('Owner') }}</th>
                            <th>{{ __('State')['name'] }}</th>
                            <th>{{ __('Date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agreements as $agreement)
                            <tr>
                                <td>{{ $products->find($agreement->product_id_user1)->name }}</td>
                                <td>{{ $products->find($agreement->product_id_user1)->owner->name }}</td>
                                <td><span class="capitalize gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-800">
                                    {{ __('State')['types'][ucwords(\App\Enums\State::tryFrom($products->find($agreement->product_id_user1)->state)->name)][0] }}
                                    </span>
                                </td>
                                <td>{{ $products->find($agreement->product_id_user2)->name }}</td>
                                <td>{{ $products->find($agreement->product_id_user2)->owner->name }}</td>
                                <td><span class="capitalize gap-1 px-2 py-1 rounded-full bg-amber-50 text-xs font-semibold text-amber-800">
                                    {{ __('State')['types'][ucwords(\App\Enums\State::tryFrom($products->find($agreement->product_id_user1)->state)->name)][0] }}
                                    </span>
                                </td>
                                <td>{{ $agreement->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="card" id="Donations">
                <div class="card-header border-0">
                    <h3 class="card-title">{{__('Donations')}}</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm"> <i class="fas fa-bars"></i> </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle text-xs">
                        <thead>
                        <tr>
                            <th>{{ __('Contribution') }}</th>
                            <th>{{ __('Owner') }}</th>
                            <th>{{ __('Campaign') }}</th>
                            <th>{{ __('from') }}</th>
                            <th>{{ __('to') }}</th>
                            <th>{{ __('State')['name'] }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donations as $donation)
                            <tr>
                                <td>{{ $donation->name }}</td>
                                <td>{{ $donation->owner->name }}</td>
                                <td>{{ $campaigns->find($donation->campaign)->name }}</td>
                                <td>{{ $campaigns->find($donation->campaign)->date_from }}</td>
                                <td>{{ $campaigns->find($donation->campaign)->date_to }}</td>
                                <td class="text-center"><span class="capitalize gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-800">
                                        @if ($campaigns->find($donation->campaign)->date_to < \Carbon\Carbon::now())
                                            {{ __('Close')[0]  }}
                                        @else
                                            {{ __('Open')[0]  }}
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin.css"> --}}
    {{--  <link href="/css/admin.css" rel="stylesheet" type="text/css"> --}}
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
@stop

@section('js')

@stop
