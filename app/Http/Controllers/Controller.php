<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\Eloquent\Model;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static $RESULT_PAGINATION = 10;

    /**
     * Deletes each model in the specified order. 
     * Useful for delete constraints.
     */
    protected function deleteModels(Model ...$models) {
        foreach ($models as $model) {
            $model->delete();
        }
    }
}
