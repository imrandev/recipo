<?php


namespace App\Http\Controllers\Base;

use App\Http\Controllers\Operations\ICrudOperation;
use App\Http\Controllers\Operations\IViewOperation;

abstract class LogicController extends Controller implements ICrudOperation, IViewOperation
{

}
