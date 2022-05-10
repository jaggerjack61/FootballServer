<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @include('layouts.flash-message')
    <div class="row">
        <div class="col s12 m12">
            <input type="text" wire:model="search" placeholder="Search player name"/>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Player Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{$profile->name}}</td>
                    <td><button type="button" class="waves-effect waves-light btn" wire:click="joinClub({{$profile->id}})">Join Club</button></td>

                </tr>
                @endforeach
        </tbody>
    </table>
</div>
