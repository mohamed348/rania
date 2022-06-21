<?php
 use App\Models\Project;
 use App\Models\PatternScope;
 use App\Models\Scope;
 use App\Models\Pattern;
 use App\Models\Proposition;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\OntologyController;
use App\Http\Controllers\PatternController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/projects', function () {
//     return view('admin.projects',[
//         'projects' => Project::all()
//     ]);
// });

Route::get('/searsh', [ProjectController::class, 'searsh'])->name('sss');

Route::get('projects', [ProjectController::class, 'index'])->name('all_projects');

Route::get('/add-project', [ProjectController::class, 'create']);
Route::post('add-project', [ProjectController::class, 'store']);

//Route::get('edit-project/{id}', [ProjectController::class, 'edit']);
//Route::Put('update-project/{id}', [ProjectController::class, 'update']);

Route::get('/{project}/edit-project', [ProjectController::class, 'edit']);
Route::patch('projects/{project}', [ProjectController::class, 'update']);

Route::delete('projects/{project}', [ProjectController::class, 'destroy']);

Route::get('/{project}/details', [ProjectController::class, 'details']);
//Route::get('/details', [PropertyController::class, 'details']);

Route::get('properties', [PropertyController::class, 'index']);

//Route::get('add-property', [PropertyController::class, 'create']);
Route::get('/{project}/add-prop', [PropertyController::class, 'createprop']);
Route::get('/{project}/add-prop-assistant', [PropertyController::class, 'storeproptwo']);
Route::post('/{project}/add-prop', [PropertyController::class, 'storeprop']);

Route::get('/{property}/edit-property', [PropertyController::class, 'edit']);
Route::get('/properties/{property}', [PropertyController::class, 'update']);

Route::get('/{property}/{project}/delete', [PropertyController::class, 'destroy'])->name('projects_d');


Route::get('{project}/ontology', [OntologyController::class, 'index'])->name('ontology_index');
Route::get('{project}/{informal}/{ontology}/ontology', [OntologyController::class, 'index2'])->name('ontology_index2');

//Route::get('/ontology/{formal}', [OntologyController::class, 'generate']);
Route::post('/ontology/store', [OntologyController::class, 'storeontology']);
Route::get('/ontology/{project}/replace', [OntologyController::class, 'replace']);
Route::post('/ontology/generate', [OntologyController::class, 'generate_formal_specification'])->name('generate_formal_specification');

Route::get('{project}/pattern', [PatternController::class, 'index']);
//Route::get('/{{$project->id}}/pattern/retreive', [PatternController::class, 'scope']);
Route::get('/{project}/retreive', [PatternController::class, 'retreive']);

Route::get('{project}/ontology/simpleparameter', [OntologyController::class, 'subprmtr']);

Route::get('/{project}/parametersub', [PatternController::class, 'parameter']);
Route::get('/{project}/okprmtr', [PatternController::class, 'okprmtr']);

Route::get('/parametersub/exp', [PatternController::class, 'expression']);
Route::get('/{project}/oksub', [PatternController::class, 'oksub']);


Route::get('/help', [ProjectController::class, 'help'])->name('help');
Route::get('/parametersub/{property}/edit', [PropertyController::class, 'edit_sub']);

Route::get('/{property}/okprmtr_edit', [PropertyController::class, 'okprmtr_edit']);
Route::get('/{property}/ok_edit', [PropertyController::class, 'oksub_edit']);