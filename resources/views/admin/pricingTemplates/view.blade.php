@extends('admin.layouts.app')
@section('title', __('pricingTemplates'))
@section('content')

<div class="notes-env">
        
        <div class="container">
            <div class="notes-header">
            <h4>{{ $pricingTemplate->id }}</h4>
        <h3>{{ $pricingTemplate->name }}</h3>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <table class="table table-bordered">
        <thead>
          <tr>
            @foreach ($headers as $col)
            <th scope="col">{{ $col }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
             @foreach ($row as $cell)
             <td>{{ $cell }}</td>
             @endforeach                
              </tr>
              @endforeach
          
        </tbody>
      </table>
      
      <div class="actions">
        <a class="btn btn-success" href="/pricing_template/{{ $pricingTemplate->id }}/edit">Edit Pricing Template</a>
      </div>

</div>


@endsection