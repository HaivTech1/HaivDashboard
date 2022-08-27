<?php

namespace App\Http\Livewire\Manager\Team;

use Livewire\Component;
use Mpociot\Teamwork\Exceptions\UserNotInTeamException;

class Index extends Component
{

    public $name;

    public function createTeam()
    {
        $this->validate([
            'name' => 'required|string',
        ]);

        $teamModel = config('teamwork.team_model');

        $team = $teamModel::create([
            'name' => $this->name,
            'owner_id' => auth()->user()->getKey(),
        ]);

        auth()->user()->attachTeam($team);

        $this->reset();
        $this->dispatchBrowserEvent('success', ['message' => 'Team created successfully!']);
    }

    public function switchTeam($team)
    {
        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($team['id']);
        
        try {
            auth()->user()->switchTeam($team);
            $this->reset();
            $this->dispatchBrowserEvent('success', ['message' => 'Team switched successfully!']);
        } catch (UserNotInTeamException $e) {
            abort(403);
        } 
    }

    public function deleteTeam($team)
    {
        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($team['id']);
        if (! auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        $team->delete();

        $userModel = config('teamwork.user_model');
        $userModel::where('current_team_id', $team['id'])
                    ->update(['current_team_id' => null]);

        $this->reset();
        $this->dispatchBrowserEvent('success', ['message' => 'Team deleted successfully!']);
    }

    public function render()
    {
        return view('livewire.manager.team.index',[
            'teams' => auth()->user()->teams
        ]);
    }
}
