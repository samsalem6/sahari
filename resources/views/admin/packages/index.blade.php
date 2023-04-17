@extends('admin.layouts.app')
@section('title', __('lang.packages'))
@section('sitetitle', __('lang.packages'))
@section('packages', 'visible opened active ')
@section('content')
    <div class="notes-env">
        <div class="notes-header">
            <h2>@lang('lang.packages')</h2>

            <div class="right">
                <a href="/admin/packages/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                    <i class="entypo-pencil"></i>
                    @lang('lang.AddTechnology')
                </a>
            </div>
        </div>
    </div>
    <hr>

    {{-- <div class="gallery-env">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">@lang('lang.titleAr')</th>
                            <th width="15%">@lang('lang.titleEn')</th>
                            <th width="15%">@lang('lang.bodyAr')</th>
                            <th width="15%">@lang('lang.bodyEn')</th>
                            <th width="45%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($packages) > 0)
                        @foreach($packages as $Technology)
                        <tr>
                            <td>{{ $Technology->id }}</td>
                            <td>{{ $Technology->titleAr }}</td>
                            <td>{{ $Technology->titleEn }}</td>
                            <td>{!! substr ($Technology->bodyAr, 0, 150)!!} ...</td>
                            <td>{!! substr ($Technology->bodyEn, 0, 150)!!} ...</td>
                            <td>
                                <div class="album-images-count">
                                    <div class="col-sm-6">
                                        <form action="{{action('PackageController@destroy', $Technology['id'])}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button  type="submit" class="btn btn-red btn-icon icon-left">
                                                @lang('lang.Delete')
                                                <i class="entypo-trash"></i>
                                            </button >
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <a style="color:white" type="button" href="packages/{{ $Technology->id}}/edit" class="btn btn-blue btn-icon icon-left">
                                            @lang('lang.Edit')
                                            <i class="entypo-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <div class="gallery-env">
        <div class="row">
            @if(count($packages) > 0)
            @foreach($packages as $package)
                <div class="col-sm-4">
                    <article class="album">
                        <img class="img-responsive img-rounded full-width" src="{{url('images/packages/'.$package->shortImage) }}" alt="packages-{{$package->id}}">

                        <section class="album-info">
                            <h3>Name</h3>
                            <p>{{ $package->name }}</p>
                        </section>

                        <footer>
                            <div class="album-images-count">
                                <div class="col-sm-4">
                                    <form action="{{action('PackageController@destroy', $package['id'])}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button  type="submit" class="btn btn-red btn-icon icon-left">
                                            @lang('lang.Delete')
                                            <i class="entypo-trash"></i>
                                        </button >
                                    </form>
                                </div>

                                <div class="col-sm-4">
                                    <a style="color:white" type="button" href="packages/{{ $package->id}}/edit" class="btn btn-blue btn-icon icon-left">
                                        @lang('lang.Edit')
                                        <i class="entypo-plus"></i>
                                    </a>
                                </div>

                                <div class="col-sm-4">
                                    <a style="color:white" type="button" href="/admin/icons/{{ $package->id}}" class="btn btn-green btn-icon icon-left">
                                        icons
                                        <i class="entypo-plus-circled"></i>
                                    </a>
                                </div>

                                <div class="col-sm-6">
                                    <br>
                                    <a style="color:white" type="button" href="/admin/itineraries/{{ $package->id}}" class="btn btn-orange btn-icon icon-left">
                                        Itineraries
                                        <i class="entypo-plus-circled"></i>
                                    </a>
                                </div>

                                <div class="col-sm-6">
                                    <br>
                                    <a style="color:white" type="button" href="/admin/galleries/{{ $package->id}}" class="btn btn-primary btn-icon icon-left">
                                        Galleries
                                        <i class="entypo-plus-circled"></i>
                                    </a>
                                </div>

                                <div class="col-sm-6">
                                    <br>
                                    <a style="color:#000" type="button" href="/admin/GeneralPackage/{{ $package->id}}" class="btn btn-gold btn-icon icon-left">
                                        General Info
                                        <i class="entypo-info"></i>
                                    </a>
                                </div>

                                <div class="col-sm-6">
                                    <br>
                                    <a style="color:#000" type="button" href="/set_values/{{ $package->id}}" class="btn btn-info btn-icon icon-left">
                                        Set Values
                                        <i class="entypo-info"></i>
                                    </a>
                                </div>

                            </div>
                        </footer>
                    </article>
                </div>
            @endforeach
                <div class="col-sm-12 text-center">
                    {{ $packages }}
                </div>
            @else
                <div class="error-text text-center">
                    <h2>@lang('lang.nodata')</h2>
                </div>
            @endif
        </div>
    </div>

@stop
