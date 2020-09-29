<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\OpeningHours;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param OpeningHours $openingHoursService
     * @return Application|Factory|View
     */
    public function home(OpeningHours $openingHoursService)
    {
        $now = new \DateTime();
        $isOpen = $openingHoursService->isOpen($now);
        if (!$isOpen) {
            $nextOpen = $openingHoursService->nextOpen($now);
        }
        return view('welcome', [
            'isOpen' => $isOpen,
            'nextOpen' => $nextOpen ?? null,
        ]);
    }
}
