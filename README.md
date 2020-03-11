# spreadsheetsalgado
This is a component for import custom data of flat files excel.

Actualmente el componente devsheet/spreadsheet puede ser implementado en otros proyectos Laravel con el propósito de importar archivos planos excel que poseen un formato personalizado para la presentación de sus datos.

Para instalarse devsheet/spreadsheet se hace a partir de la siguiente serie de paso:

1.	Crear una aplicación Laravel

composer create-project --prefer-dist laravel/laravel NOMBREPROYECTO

2.	Desde consola, acceder al directorio del proyecto e Instalar el componente devsheet/spreadsheet:

composer require devsheet/spreadsheet

3.	En el editor de código que se utiliza actualmente, ir a config/app y añadir las siguientes clases (debajo de App\Providers\RouteServiceProvider::class):

//.. Other providers
Devsheet\Spreadsheet\SheetServiceProvider::class,  // Opcional
Maatwebsite\Excel\ExcelServiceProvider::class,
     
4.	Configurar el archivo .env para determinar el motor y la base de datos a utilizarse (DB_CONNECTION=mysql, DB_DATABASE=spreadsheet).

5.	Realizar la publicación del componente para hacer uso de él y de esa forma personalizarlo como el usuario lo requiere para la importación de datos Excel:

php artisan vendor:publish provider="Devsheet\Spreadsheet\SheetServiceProvider"

6.	Realizar las migraciones para implementar tablas en las bases de datos:
php artisan migrate



7.	Ingresar dentro de routes/web.php las rutas: 
Route::get('sheet', 'SheetController@index')->name('sheet');
Route::post('import', 'SheetController@store')->name('import');

8.	Finalmente, poner a correr el servidor: php artisan serve

De esa manera accedemos a la vista /sheet desde el navegador web para realizar la importación de archivo excel personalizado: http://127.0.0.1/sheet.

NOTA: devsheet/spreadsheet es completamente personalizable por el usuario para determinar el formato de los datos del archivo excel para ser importados a la base de datos en el archivo SpreadSheet.php ubicado dentro de App\imports.
De igual manera, la vista del componente puede ser editada en el archivo sheet.blade.php dentro de Resources\views\devsheet\spreadsheet.
El paquete "maatwebsite/excel": "^3.1" se instala de forma automática en la medida que el componente se instala en la aplicación.

