<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use App\Models\PolygonsModel;
use App\Models\PolylinesModel;
use App\Models\User;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
        $this->polylines = new PolylinesModel();
        $this->polygons = new PolygonsModel();
        $this->users = new User();
    }

    public function landingpage()
    {
        $data = [
            'title' => 'PGWL',
            'points_counts' => $this->points->count(),
            'polylines_counts' => $this->polylines->count(),
            'polygons_counts' => $this->polygons->count(),
            'users_counts' => $this->users->count(),
        ];

        return view('home', $data);
    }
    public function peta()
    {
        $data = [
            'title' => 'Peta',
        ];

        return view('map', $data);
    }

    public function tabel()
    {
        $data = [
            'title' => 'Tabel',
            'points' => $this->points->all(),
            'polylines' => $this->polylines->all(),
            'polygons' => $this->polygons->all(),
        ];

        return view('table', $data);
    }
}
