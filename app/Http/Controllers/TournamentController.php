<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\TournamentHistory;
use App\Services\TournamentService;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    protected $tournamentService;

    public function __construct(TournamentService $tournamentService)
    {
        $this->tournamentService = $tournamentService;
    }

    public function showForm()
    {
        $playersMale = Player::where('gender', 'male')->get();
        $playersFemale = Player::where('gender', 'female')->get();

        return view('torneo.form', compact('playersMale', 'playersFemale'));
    }

    public function tournamentoSimulate(Request $request)
    {

        foreach ($request->players as $playerData) {
            $player = Player::find($playerData['id']);
            if ($player) {
                $player->update([
                    'name' => $playerData['name'],
                    'skill_level' => $playerData['skill_level'],
                    'strength' => $playerData['strength'],
                    'speed' => $playerData['speed'],
                    'reaction_time' => $playerData['reaction_time'] ?? null,
                ]);
            }
        }

        $players = Player::where('gender', $request->gender)->get();
        $tournamentResult = $this->tournamentService->simulateTournament($players);

        $tournamentHistory = TournamentHistory::create([
            'date' => now(),
            'gender' => $request->gender,
            'rounds' => $tournamentResult['rounds'],
            'winner' => $tournamentResult['winner'],
            'players' => $players->toArray(),
        ]);

        return view('torneo.resultado', [
            'winner' => $tournamentResult['winner'],
            'rounds' => $tournamentResult['rounds'],
            'players' => $players,
        ]);
    }

    public function showHistoricos()
    {
        $tournamentHistories = TournamentHistory::orderBy('date', 'desc')->get();

        return view('torneo.historial', compact('tournamentHistories'));
    }

    public function showDetalle($id)
    {
        $tournamentHistory = TournamentHistory::findOrFail($id);
        $tournamentHistory->winner = json_decode($tournamentHistory->winner, true);

        return view('torneo.detalle', [
            'tournamentHistory' => $tournamentHistory,
        ]);
    }

}
