<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Teams</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">{{$team->name}}</li>
            </ol>
        </div>
    </x-slot>
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex justify-content-between">
                            <span>Members of team "{{$team->name}}"</span>
                            <a href="{{route('teams.index')}}" class="btn btn-sm btn-default pull-right">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($team->users AS $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    @if(auth()->user()->isOwnerOfTeam($team))
                                    @if(auth()->user()->getKey() !== $user->getKey())
                                    <form style="display: inline-block;"
                                        action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
                                    </form>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title clearfix">Pending invitations</div>
                        <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th>E-Mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($team->invites AS $invite)
                            <tr>
                                <td>{{$invite->email}}</td>
                                <td>
                                    <a href="{{route('teams.members.resend_invite', $invite)}}"
                                        class="btn btn-sm btn-default">
                                        <i class="fa fa-envelope-o"></i> Resend invite
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="card-title">Invite to team "{{$team->name}}"</div>
                    <form class="form-horizontal" method="post" action="{{route('teams.members.invite', $team)}}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-form.input id="email" class="block w-full mt-1" type="email" name="email"
                                        id="email" autofocus />
                                    <x-form.error for="email" />
                                </div>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope-o"></i>Invite to Team
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>