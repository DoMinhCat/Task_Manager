<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Task;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
     public function index()
    {
        // Nombre de tâches par statut
        $tasksByStatus = Task::all()->groupBy(function($task) {
            if ($task->done) return 'completed';
            if ($task->due_at && $task->due_at < now()) return 'overdue';
            return 'in_progress';
        })->map->count();

        // Tâches en retard
        $overdueTasks = Task::where('done', false)
                            ->where('due_at', '<', now())
                            ->count();

        // Tâches récentes (derniers 7 jours)
        $recentTasks = Task::where('created_at', '>=', now()->subDays(7))->count();

        // Vue d’ensemble par projet
        $projects = Project::with('tasks')->get();

        // On passe toutes les variables à la vue avec compact
        return view('dashboard', compact('tasksByStatus', 'overdueTasks', 'recentTasks', 'projects'));
    }
}
