<table>
  <thead>
    <th>No</th>
    <th>NIS</th>
    <th>DateTime In</th>
  </thead>
  <tbody>
    @foreach ($data as $key => $value)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{$value->nis}}</td>
      <td>{{$value->datetime_in}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
