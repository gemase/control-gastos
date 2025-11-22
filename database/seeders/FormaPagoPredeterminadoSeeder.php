<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaPagoPredeterminadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Formas de pago predeterminadas según el catálogo del SAT.
     */
    public function run(): void
    {
        $now = now();
        DB::table('formas_pago')->insertOrIgnore([
            ['clave' => '01', 'nombre' => 'Efectivo', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '02', 'nombre' => 'Cheque nominativo', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '03', 'nombre' => 'Transferencia electrónica de fondos', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '04', 'nombre' => 'Tarjeta de crédito', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '05', 'nombre' => 'Monedero electrónico', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '06', 'nombre' => 'Dinero electrónico', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '08', 'nombre' => 'Vales de despensa', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '12', 'nombre' => 'Dación en pago', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '13', 'nombre' => 'Pago por subrogación', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '14', 'nombre' => 'Pago por consignación', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '15', 'nombre' => 'Condonación', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '17', 'nombre' => 'Compensación', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '23', 'nombre' => 'Novación', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '24', 'nombre' => 'Confusión', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '25', 'nombre' => 'Remisión de deuda', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '26', 'nombre' => 'Prescripción o caducidad', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '27', 'nombre' => 'A satisfacción del acreedor', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '28', 'nombre' => 'Tarjeta de débito', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '29', 'nombre' => 'Tarjeta de servicios', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '30', 'nombre' => 'Aplicación de anticipos', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '31', 'nombre' => 'Intermediario pagos', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['clave' => '99', 'nombre' => 'Por definir', 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
