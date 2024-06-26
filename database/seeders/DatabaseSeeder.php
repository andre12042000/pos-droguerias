<?php

namespace Database\Seeders;

use App\Models\Brand;

use App\Models\Client;
use App\Models\Product;
use App\Models\Category;

use App\Models\Provider;
use App\Models\Laboratorio;
use App\Models\Presentacion;
use App\Models\Subcategoria;
use App\Models\Ubicacion;
use App\Models\UnidadMedida;
use Illuminate\Database\Seeder;
use Modules\Mantenimiento\Entities\TipoEquipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmpresaSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PresentacionSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(MetodoPagoSeeder::class);



        UnidadMedida::create([
            'name'      => 'N/A'
        ]);

        Laboratorio::create([
            'name'      => 'N/A',
            'status'    => 'ACTIVE'
        ]);

        //Marcas

        Brand::create([
            'name'      => 'N/A',
        ]);



        //Categorias

        Category::create([
            'name'      => 'N/A',
        ]);

        Category::create([
            'name'      => 'Combos',
        ]);


        //Cliente

        Client::create([
            'type_document'     => null,
            'number_document'   => null,
            'name'              => 'Consumidor final',
            'phone'             => null,
            'address'           => null,
            'email'             => null,
        ]);

        //Proveedor

        Provider::create([
            'nit'               => null,
            'name'              => 'N/A',
            'phone'             => null,
            'address'           => null,
            'email'             => null,
        ]);


        Subcategoria::create([
            'name'          => 'N/A',
            'status'        => 'ACTIVE',
            'category_id'   => 1,
        ]);


     /*    Product::factory(1000)->create(); */
   /*   Product::create([
        'code'                      => '00001',
        'name'                      => 'Servicio',
        'stock'                     => '1',
        'stock_min'                 => '1',
        'stock_max'                 => '1',
        'precio_caja'                => '0',
        'precio_blister'        => '0',
        'precio_unidad'   => '0',
        'status'                    => 'ACTIVE',
        'category_id'               => 1,
        'medida_id'                 => 1,
    ]);


     TipoEquipo::create([
        'descripcion'      => 'Monturas',
    ]);
    TipoEquipo::create([
        'descripcion'      => 'Lentes',
    ]);
    TipoEquipo::create([
        'descripcion'      => 'Gafas',
    ]);
*/
    }
}
