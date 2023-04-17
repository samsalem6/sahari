@extends('admin.layouts.app')
@section('title', __('Hotels'))
@section('content')

<div class="notes-env">
    <div class="notes-header">
        <h2>@lang('hotels')</h2>

        <div class="right">
            <a href="/hotels/create" class="btn btn-lg btn-green btn-icon icon-left" id="add-note">
                <i class="entypo-pencil"></i>
                @lang('Add Hotel')
            </a>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Stars</th>
            <th scope="col">Link</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $ht)
            <tr>
                <th scope="row">{{ $ht->id }}</th>
                <th><img src="{{ url('images/packages/'.$ht->image) }}" alt="hotels-{{ $ht->id }}" width="150" height="80"></th>
                <td>{{ $ht->name }}</td>
                <td>
                    <div class="rating">
                        <i class="far fa-star  {{ $ht->stars >= 1 ? ' voted' : '' }}"></i>
                        <i class="far fa-star  {{ $ht->stars >= 2 ? ' voted' : '' }}"></i>
                        <i class="far fa-star  {{ $ht->stars >= 3 ? ' voted' : '' }}"></i>
                        <i class="far fa-star  {{ $ht->stars >= 4 ? ' voted' : '' }}"></i>
                        <i class="far fa-star  {{ $ht->stars >= 5 ? ' voted' : '' }}"></i>
                    </div>
                    {{ $ht->stars }}</td>
                <td>{{ Str::limit($ht->link, 40) }}</td>
                <td class="action">
                    <a class="btn btn-secondary" href="/hotels/{{ $ht->id }}/edit">Edit</a>
                    <form action="{{action('HotelsController@destroy', $ht['id'])}}" method="POST">
                        {{csrf_field()}}
                        @method('DELETE')
                        {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                    <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
              </tr>
            @endforeach
          
        </tbody>
      </table>
      {!! $hotels->links() !!}
</div>
@endsection