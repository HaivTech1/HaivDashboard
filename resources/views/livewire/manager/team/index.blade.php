<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <x-search />
                    </div>
                </div>
                
                <table class="table align-middle table-nowrap table-check">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 20px;" class="align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                        wire:model="selectPageRows">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle">Members</th>
                            <th class="align-middle">Team</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" value="{{ $team->id }}" type="checkbox"
                                        id="{{ $team->id }}" wire:model="selectedRows">
                                    <label class="form-check-label" for="{{ $team->id }}"></label>
                                </div>
                            </td>
                            <td>
                                {{$team->name}}
                            </td>
                            <td>
                                @if(auth()->user()->isOwnerOfTeam($team))
                                <span class="badge badge-pill badge-soft-success font-size-12">Owner</span>
                                @else
                                <span class="badge badge-pill badge-soft-danger font-size-12">Member</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('teams.members.show', $team)}}" class="btn btn-sm btn-default">
                                    <i class="fa fa-users"></i> Members
                                </a>
                            </td>
                            <td>
                                @if(is_null(auth()->user()->currentTeam) ||
                                    auth()->user()->currentTeam->getKey() !== $team->getKey())
                                    <button wire:click="switchTeam({{ $team }})" class="btn btn-sm btn-default">
                                        <i class="fa fa-sign-in"></i> Switch
                                    </button>
                                @else
                                    <span class="label label-default">Current team</span>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->isOwnerOfTeam($team))
                                    <a href="{{route('teams.edit', $team)}}" class="btn btn-sm btn-default">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                    
                                   
                                    <button wire:click='deleteTeam({{ $team }})' class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                                            Delete</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class='col-sm-4'>
        <form wire:submit.prevent="createTeam">
            <div class="hstack gap-3">
                <input class="form-control me-auto" wire:model.defer="name" placeholder="Add your team here..."
                    aria-label="Add your team here...">
                <x-form.error for="name" />
                <button type="submit" class="btn btn-secondary">Add</button>
                <div class="vr"></div>
                <button wire:click="resetState" type="button" class="btn btn-outline-danger">Reset</button>
            </div>
        </form>

    </div>
</div>