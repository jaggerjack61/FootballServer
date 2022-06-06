<div>
    <h4>Reports:Player Data</h4>
    <div class="row">
        <div class="col s12 m12">
            <input wire:model="search" type="text" class="" placeholder="search"/>


        </div>
    </div>
    <table>
        <thead>
                <tr>
                    <th>Player</th>
                    <th>Likes</th>
                    <th>Dislikes</th>
                    <th>Action</th>
                </tr>
        </thead>
        <tbody>

        @foreach($results as $result)
            <tr>
                <td>{{$result[0]}}</td>
                <td>{{$result[1]}}</td>
                <td>{{$result[2]}}</td>
                <td><a href="{{route('view-profile',[$result[3]])}}">View Profile</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
