<!DOCTYPE html>
<html>
<head>
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>
</head>
<body>

<table>
  <tr>
    <td>Name</td>
    <td>{{ $data->name }}</td>
  </tr>

  <tr>
    <td>Email</td>
    <td>{{ $data->email }}</td>
  </tr>

  <tr>
    <td>Nationality</td>
    <td>{{ $data->nationality }}</td>
  </tr>

  <tr>
    <td>UserPhone</td>
    <td>{{ $data->countryCode }} - {{ $data->whats }}</td>
  </tr>

  <tr>
    <td>Arrival</td>
    <td>{{ $data->Arrival }}</td>
  </tr>

@if ( $data->Departure)
  <tr>
    <td>Departure</td>
    <td>{{ $data->Departure }} </td>
  </tr>
@endif

  @if ( $data->duration)
  <tr>
    <td>Duration</td>
    <td>{{ $data->duration }} </td>
  </tr>
  @endif

  <tr>
    <td>Adults</td>
    <td>{{ $data->adults }} </td>
  </tr>

  <tr>
    <td>Children</td>
    <td>{{ $data->children }} </td>
  </tr>

    {{-- @if ( $data->Infantes)
    <tr>
    <td>Infantes</td>
    <td>{{ $data->Infantes }} </td>
    </tr>
    @endif --}}

  <tr>
    <td>Accommodation</td>
    <td>{{ $data->accommodation }} </td>
  </tr>

  <tr>
    <td>Comment</td>
    <td>{{ $data->comment }} </td>
  </tr>

  <tr>
    <td>Url Goal</td>
    <td>{{ \Request::server('HTTP_REFERER') }} </td>
  </tr>

  <tr>
      <td>Source</td>
      <td>{{ $data->source }} </td>
    </tr>


    <tr>
      <td>utm Campaign</td>
      <td>{{ $data->utm_campaign }} </td>
    </tr>

  <tr>
    <td>Date & Time</td>
    <td>{{ $data->DateTime }} </td>
  </tr>

  <tr>
    <td>IP</td>
    <td>{{ $data->ip }} </td>
  </tr>

  <tr>
    <td>Gender By Name</td>
    <td>{{ $data->genderByName }} </td>
  </tr>

  <tr>
    <td>Accuracy By Name</td>
    <td>{{ $data->accuracyByName }} </td>
  </tr>

  <tr>
    <td>Gender By Email</td>
    <td>{{ $data->genderByEmail }} </td>
  </tr>

  <tr>
    <td>Accuracy By Email</td>
    <td>{{ $data->accuracyByEmail }} </td>
  </tr>

  <tr>
    <td>iso_code</td>
    <td>{{ $data->iso_code }} </td>
  </tr>

  <tr>
    <td>Country</td>
    <td>{{ $data->country }} </td>
  </tr>

  <tr>
    <td>City</td>
    <td>{{ $data->city }} </td>
  </tr>

  <tr>
    <td>State</td>
    <td>{{ $data->state_name }} </td>
  </tr>

  <tr>
    <td>Request Source</td>
    <td>{{ $data->RequestSource }} </td>
  </tr>

  @if ( $data->previous)
  <tr>
    <td>Referrals</td>
    <td>{{ $data->previous }} </td>
  </tr>
  @endif

</table>

</body>
</html>
