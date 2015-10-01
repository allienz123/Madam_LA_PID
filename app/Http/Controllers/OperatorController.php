<?php namespace App\Http\Controllers;

class OperatorController extends Controller {

    /**
     * Initializer.
     *
     * @return \AdminController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('operator');
    }

}