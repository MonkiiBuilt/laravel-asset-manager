<?php
/**
 * @author Jonathon Wallen
 * @date 6/6/17
 * @time 12:04 PM
 * @copyright 2008 - present, Monkii Digital Agency (http://monkii.com.au)
 */

namespace MonkiiBuilt\LaravelAssetManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssetManagerController extends Controller
{
    public $dir = '/packages/barryvdh/elfinder';

    public function index(Request $request)
    {
        return view('laravel-asset-manager::admin.index', ['dir' => $this->dir]);
    }

    public function selector(Request $request)
    {
        return view('laravel-asset-manager::admin.selector', ['dir' => $this->dir]);
    }

    public function editor(Request $request)
    {
        return view('laravel-asset-manager::admin.editor', ['dir' => $this->dir]);
    }

    public function test(Request $request)
    {
        return view('laravel-asset-manager::admin.test');
    }
}