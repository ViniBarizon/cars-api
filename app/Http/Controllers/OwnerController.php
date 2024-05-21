<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends BaseController
{
    public function __construct(Owner $model) {
        $this->model = $model->with('cars');
    }
}
