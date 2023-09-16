<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api\v1\General\GenPais;
use App\Models\Api\v1\General\GenProvincia;
use App\Models\Api\v1\General\GenLocalidad;
use App\Models\Api\v1\General\GenTipoIva;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        GenPais::create(['descripcion' => 'Argentina']);

        GenProvincia::create(['descripcion' => 'BUENOS AIRES', 'codigo'=> '06', 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'CATAMARCA', 'codigo'=> ''  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'CHACO', 'codigo'=> '22'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'CHUBUT', 'codigo'=> '26'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'CIUDAD AUTONOMA BUENOS AIRES', 'codigo'=> '02', 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'CORDOBA', 'codigo'=> '14'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'CORRIENTES', 'codigo'=> '18'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'ENTRE RIOS', 'codigo'=> '30'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'FORMOSA', 'codigo'=> '34'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'JUJUY', 'codigo'=> '38'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'LA PAMPA', 'codigo'=> '428'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'LA RIOJA', 'codigo'=> '46'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'MENDOZA', 'codigo'=> '50'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'MISIONES', 'codigo'=> '54'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'NEUQUEN', 'codigo'=> '58'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'RIO NEGRO', 'codigo'=> '62'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'SALTA', 'codigo'=> '66'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'SAN JUAN', 'codigo'=> '70'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'SAN LUIS', 'codigo'=> '74'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'SANTA CRUZ', 'codigo'=> '78'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'SANTA FE', 'codigo'=> '82'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'SANTIAGO DEL ESTERO', 'codigo'=> '86'  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'TIERRA DEL FUEGO', 'codigo'=> ''  , 'idpais' => 1]);
        GenProvincia::create(['descripcion' => 'TUCUMAN', 'codigo'=> '90'  , 'idpais' => 1]);

        GenLocalidad::factory(200)->create();

        GenTipoIva::create(['descripcion' => 'IVA Responsable Inscripto']);
        GenTipoIva::create(['descripcion' => 'IVA Responsable no Inscripto']);
        GenTipoIva::create(['descripcion' => 'IVA no Responsable']);
        GenTipoIva::create(['descripcion' => 'IVA Sujeto Exento']);
        GenTipoIva::create(['descripcion' => 'Consumidor Final']);
        GenTipoIva::create(['descripcion' => 'Responsable Monotributo']);
        GenTipoIva::create(['descripcion' => 'Sujeto no Categorizado']);
        GenTipoIva::create(['descripcion' => 'Proveedor del Exterior']);
        GenTipoIva::create(['descripcion' => 'Cliente del Exterior']);
        GenTipoIva::create(['descripcion' => 'IVA Liberado – Ley Nº 19.640']);
        GenTipoIva::create(['descripcion' => 'IVA Responsable Inscripto – Agente de Percepción']);
        GenTipoIva::create(['descripcion' => 'Pequeño Contribuyente Eventual']);
        GenTipoIva::create(['descripcion' => 'Monotributista Social']);
	    GenTipoIva::create(['descripcion' => 'Pequeño Contribuyente Eventual Social']);

    }
}
