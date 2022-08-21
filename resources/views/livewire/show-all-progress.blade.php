 @if ($isLoaded == true)

  <table class="table table-bordered border-danger text-center">
  <thead  style="
  background-color: #31d2f2;
    color: white;
  ">
    <tr>
      <th scope="col">date</th>
      <!-- <th scope="col">Day's Ago</th> -->
      <th scope="col">Success</th>
      <th scope="col">Failed</th>
      <th scope="col">Pending</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody class="text-white bg-warning " >
        @foreach($dataArray as $item)

    <tr>
            <td>{{  $item['date']  }}</td>
            <!-- <td>{{ (new Carbon\Carbon($item['date']))->diffForHumans()  }}</td> -->

            <td>{{ $item['1']  }}</td>
            <td>{{ $item['-1']}}</td>
            <td>{{ $item['0']}}</td>
            <td><a href="{{ route('pending_sms')}}" class="btn btn-success">Pull All</a></td>
    </tr>
         @endforeach

  </tbody>

</table>

@else 

@endif  