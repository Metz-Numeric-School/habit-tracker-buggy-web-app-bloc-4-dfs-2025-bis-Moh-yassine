<?php
namespace App\Controller\Member;

use App\Repository\HabitRepository;
use App\Repository\HabitLogRepository;
use Mns\Buggy\Core\AbstractController;

class DashboardController extends AbstractController
{
    private HabitRepository $habitRepository;
    private HabitLogRepository $habitLogRepository;

    public function __construct()
    {
        $this->habitRepository = new HabitRepository();
        $this->habitLogRepository = new HabitLogRepository();
    }

    public function index()
    {
        $userId = $_SESSION['user']['id'];

        // Statistiques rapides
        $stats = [
            'active_habits' => $this->habitRepository->countByUser($userId),
            'streak_days' => $this->habitRepository->getStreak($userId),
            'completed_today' => $this->habitLogRepository->countCompletedToday($userId),
        ];

        // Liste des habitudes de l'utilisateur
        $habits = $this->habitRepository->findByUser($userId);

        return $this->render('member/dashboard/index.html.php', [
            'stats' => $stats,
            'habits' => $habits,
        ]);
    }
}
