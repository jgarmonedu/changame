<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::all(),
            'products' => Product::all(),
            'agreements' => Agreement::all(),
            'userRegistrations' => $this->showChartUserRegistrations(),
            'showChartProductsByCategory' => $this->showChartProductsByCategory()
        ]);
    }

    public function profile()
    {
        return view('admin/profile', [
            'user' => Auth::user(),
        ]);
    }

    public function users()
    {
        return view('admin/users', [
            'users' => User::all(),
        ]);
    }

    private function showChartUserRegistrations()
    {

        $start = Carbon::parse(User::min("created_at"));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, "1 month", $end);

        $usersPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                "count" => User::where("created_at", "<=", $endDate)->count(),
                "month" => $endDate->format("Y-m-d")
            ];
        });

        $data = $usersPerMonth->pluck("count")->toArray();
        $labels = $usersPerMonth->pluck("month")->toArray();

        return app()
            ->chartjs->name("UserRegistrationsChart")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Usuarios registrados",
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "data" => $data,
                    "pointStyle" => 'circle',
                    "pointRadius" => 10,
                    "pointHoverRadius" => 15
                ]
            ])
            ->options([
                'scales' => [
                    'x' => [
                        'beginAtZero' => true
                    ],
                    'y' => [
                        'beginAtZero' => true
                    ],
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Evolución mensual de usuarios registrador'
                    ]
                ],
                'responsive' => true,
                'maintainAspectRatio' => true
            ]);
    }


    private function showChartProductsByCategory()
    {
        $category = Category::all();

        $amountPerMonth = collect($category)->map(function ($category) {
            return [
                "count" => Product::where("category_id","=", $category->id)->count(),
                "category" => $category->name
            ];
        });


        $data = $amountPerMonth->pluck("count")->toArray();
        $labels = $amountPerMonth->pluck("category")->toArray();

        return app()
            ->chartjs->name("showChartProductsByCategory")
            ->type("bar")
            ->size(["width" => 400, "height" => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Cantidad de Productos",
                    "backgroundColor" => "rgba(200, 196, 42, 0.31)",
                    "borderColor" => "rgba(200, 196, 42, 0.7)",
                    "data" => $data,
                    "borderWidth" => 2,
                    "borderRadius" => 5,
                    "borderSkipped" => false
                ]
            ])
            ->options([
                'scales' => [
                    'x' => [
                        'beginAtZero' => true
                    ],
                    'y' => [
                        'beginAtZero' => true
                    ],
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Productos por categoría'
                    ]
                ],
                'responsive' => true,
                'maintainAspectRatio' => true
            ]);
    }
}
