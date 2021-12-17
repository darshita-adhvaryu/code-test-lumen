@extends('masterLayout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <h3>Members List</h3>
        </div>
        <div class="col-md-6">
            <span><h3>Average Price:{{ $average }}  </h3></span>
        </div>
    </div>
</div>

    <table class="table table-striped" id="dtBasicExample">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Subscription</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $mem)
            <tr>
                <th scope="row">{{ $mem['id'] }}</th>
                <td>{{ $mem['name'] }}</td>
                <td>{{ $mem['email'] }}</td>
                <td>{{ $mem['phone'] }}</td>
                <td>{{ $mem['sub_name'] }}</td>
                <td>{{ $mem['sub_price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "order": [[ 5, "desc" ]],
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": false
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
@endsection