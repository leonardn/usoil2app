<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
class MVC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:mvc {name} {path=null}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Will Create Controller , Model, Migration , Seeder , Request';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function updateController($data)
    {
        $controller_path = app_path('Http/Controllers/'.$data['controller'].'.php');
        $content = file_get_contents($controller_path);
        $resource = ['index','create','store','show','edit','update','destroy'];
        foreach ($resource as $value) 
        {
            $view = $data['view_folder'].'.';
$old_index = 'index()
    {
        //';
$new_index = 'index()
    {
        return view(\''.$view.'index'.'\');';
$old = str_replace($old_index, $new_index, $content);


$old_create = 'create()
    {
        //';
$new_create = 'create()
    {
        return view(\''.$view.'create'.'\');';
$old = str_replace($old_create, $new_create, $old);

$old_store = 'store(Request $request)
    {
        //';
$new_store = 'store(Request $request)
    {
        return \'store'.'\';';
$old = str_replace($old_store, $new_store, $old);

$old_show = 'show($id)
    {
        //';
$new_show = 'show($id)
    {
        return view(\''.$view.'show'.'\',compact(\'id\'));';
$old = str_replace($old_show, $new_show, $old);

$old_edit = 'edit($id)
    {
        //';
$new_edit = 'edit($id)
    {
        return view(\''.$view.'edit'.'\',compact(\'id\'));';
$old = str_replace($old_edit, $new_edit, $old);

$old_update = 'update(Request $request, $id)
    {
        //';
$new_update = 'update(Request $request, $id)
    {
        return \'update => '.'\'.$id;';
$old = str_replace($old_update, $new_update, $old);


$old_destroy = 'destroy($id)
    {
        //';
$new_destroy = 'destroy($id)
    {
        return \'destroy => '.'\'.$id;';
$old = str_replace($old_destroy, $new_destroy, $old);



file_put_contents($controller_path,$old);
        }
        // return $this->info($old);
    }
    public function handle()
    {
        $name = ucfirst(str_singular($this->argument('name')));
        $path = $this->argument('path') == 'null' ? null : $this->argument('path').'\\';
        $path_name = $this->argument('path') == 'null' ? null : $this->argument('path');
        $path_view = $this->argument('path') == 'null' ? null : $this->argument('path').'.';
        $names = [
        'view_folder' => $path_view.str_plural(strtolower($name)),
        'controller' => $path.$name.'Controller',
        'model' => $name,
        'migration' => 'create_'.str_plural(strtolower($name)).'_table',
        'seeder' => $name.'TableSeeder',
        'request' => $path.$name.'Request',
        'view_path' => base_path('resources/views/'),
        ];
        
        if (!is_dir($names['view_path'].'\\'.$path.str_plural(strtolower($name)))) 
        {
            if (!is_null($path)) 
            {
                mkdir($names['view_path'].'\\'.$path);
            }
if (!is_dir($names['view_path'].'\\'.$path.'\layout')) 
{
    mkdir($names['view_path'].'\\'.$path.'\layout');
            $layout_content = '<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield(\'title\', \'Home\') | Site Name</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1 class="text-center">@yield(\'content\')</h1>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="Hello World"></script>
    </body>
</html>';

if (!file_exists($names['view_path'].'\\'.$path.'\layout\index.blade.php')) 
{
    fopen($names['view_path'].'\\'.$path.'\layout\index.blade.php', "w");

    file_put_contents($names['view_path'].'\\'.$path.'\layout\index.blade.php', $layout_content);
}

}
            mkdir($names['view_path'].'\\'.$path.str_plural(strtolower($name)));
            
        }
        $path = $names['view_path'].'\\'.$path.str_plural(strtolower($name));
$resource = ['index','show','create','edit'];
foreach ($resource as $value) 
{
$viewPath = $path.'\\'.$value.'.blade.php';
$param = ['show','edit'];
$title = in_array($value, $param) ? ucfirst($value).' {{ $id }} ' : ucfirst($value);
if(!file_exists($viewPath)){
fopen($viewPath, "w");
$extends = $path_view.'layout.index';
$index_content = '@extends(\''.$extends.'\')
@section(\'title\') '.$name.' '.$title.' @endsection


';
$index_content .= '@section(\'content\')
'.$name.' '.$title.'


';
$index_content .= '@endsection';
file_put_contents($viewPath, $index_content);
}
}
$route = '

Route::resource(\''.str_plural(strtolower($name)).'\',\''.$names['controller'].'\');';
$isset = 'Route::resource(\''.str_plural(strtolower($name)).'\',\''.$names['controller'].'\');';

if (!strpos(file_get_contents(app_path('Http/routes.php')),$isset)) {
    file_put_contents(app_path('Http/routes.php'), $route,FILE_APPEND);
}
        Artisan::call('make:model', [
            'name'=>$names['model'],'-m'=>'-m'
        ]);
        
        $this->info('Model [ '.$names['model'].' ] has been created successfuly');
        $this->info('Migration [ '.$names['migration'].' ] has been created successfuly');
        
        Artisan::call('make:seeder', [
            'name'=>$names['seeder']
        ]);
        
        $this->info('Seeder [ '.$names['seeder'].' ] has been created successfuly');
        
        Artisan::call('make:controller', [
            'name'=>$names['controller'],'--resource'=>'--resource'
        ]);
        $this->updateController($names);
        
        $this->info('Controller [ '.$names['controller'].' ] has been created successfuly');
        

        Artisan::call('make:request', [
            'name'=>$names['request']
        ]);
        
        $this->info('Request [ '.$names['request'].' ] has been created successfuly');
        
    }
}
