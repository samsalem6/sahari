@extends('admin.layouts.app')
@section('title', __('pricingTemplates'))
@section('content')

<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('Pricing Templates')</h2>
        <div class="right">
        </div>
    </div>
</div>
<hr>

<div class="container">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            {{-- <th scope="col">Caption</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pricingTemplates as $pt)
            <tr>
                <th scope="row">{{ $pt->id }}</th>
                <td>{{ $pt->name }}</td>
                {{-- <td>{{ $pt->caption }}</td> --}}
                <td class="action">
                    <a class="btn btn-secondary" href="/pricing_template/{{ $pt->id }}/edit">Edit</a>
                    <a class="btn btn-success" href="/pricing_template/{{ $pt->id }}">View</a>
                </td>
              </tr>
            @endforeach
          
        </tbody>
      </table>
      {!! $pricingTemplates->links() !!}
</div>

@endsection