<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CarsController extends BaseController
{
    public function __construct(Cars $model) {
        $this->model = $model->with('owners');
    }
}
