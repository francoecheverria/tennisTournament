<?php

namespace App\Services;

use App\Models\Player;

class TournamentService
{
    public function simulateTournament($players)
    {
        $rounds = [];
        $positions = [];

        while (count($players) > 1) {
            $rounds[] = $players;

            $players = $this->simulateRound($players);

            foreach ($players as $key => $player) {
                $positions[$player->id][] = $key + 1;
            }
        }

        $rounds[] = $players;
        $winner = $players[0];
        
        return [
            'winner' => $winner,
            'rounds' => $rounds,
            'positions' => $positions,
        ];
    }

    private function simulateRound($players)
    {
        $winners = [];

        for ($i = 0; $i < count($players); $i += 2) {
            $player1 = $players[$i];
            $player2 = $players[$i + 1];

            $winner = $this->determineWinner($player1, $player2);
            $winners[] = $winner;
        }

        return $winners;
    }

    private function determineWinner(Player $player1, Player $player2)
    {
        $score1 = $this->calculateScore($player1);
        $score2 = $this->calculateScore($player2);

        return $score1 > $score2 ? $player1 : $player2;
    }

    private function calculateScore(Player $player)
    {
        $score = $player->skill_level;
        $result = array();

        if ($player->gender === 'male') {

            $strength = $player->strength + $this->calculateLuck($player->skill_level); 
            $speed = $player->speed + $this->calculateLuck($player->skill_level);
            $score += $strength + $speed;

        } elseif ($player->gender === 'female') {

            $strength = $player->strength + $this->calculateLuck($player->skill_level);
            $speed = $player->speed + $this->calculateLuck($player->skill_level);
            $reaction_time = $player->reaction_time + $this->calculateLuck($player->skill_level);
            $score += $strength + $speed + $reaction_time;

        }

        return $score;
    }

    private function calculateLuck($skillLevel)
    {
        switch (true) {
            case ($skillLevel < 25):
                return rand(-25, 25);
            case ($skillLevel < 50):
                return rand(-15, 50);
            case ($skillLevel < 100):
                return rand(25, 70);
            default:
                return 0;
        }
    }
}
