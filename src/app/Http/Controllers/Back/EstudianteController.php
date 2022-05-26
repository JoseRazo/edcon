<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\DomicilioEstado;
use App\Models\DomicilioCiudad;
use App\Models\DomicilioColonia;
use App\Models\TipoEstudiante;
use App\Models\Usuario;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id', 'DESC')->paginate(10);
        return view('back.estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $estados = DomicilioEstado::orderBy('nombre', 'ASC')->get();
        $tipos_estudiantes = TipoEstudiante::all();
        return view('back.estudiantes.create', compact('estados', 'tipos_estudiantes'));
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'nombre' => 'required',
            'tipo_estudiante_id' => 'required',
            'estado_id' => 'required',
            'ciudad_id' => 'required',
            'colonia_id' => 'required',
            'calle' => 'required',
        ], [
            'nombre.required' => 'El campo  Nombre(s)  es obligatorio.',
            'tipo_estudiante_id.required' => 'El campo Tipo de Usuario es obligatorio.',
            'estado_id.required' => 'El campo Estado es obligatorio.',
            'ciudad_id.required' => 'El campo Ciudad es obligatorio.',
            'colonia_id.required' => 'El campo Colonia es obligatorio.',
            'calle.required' => 'El campo Calle es obligatorio.',

        ]);

        $cve_institucion = '61';

        DB::connection('sqlsrv_edcon')->beginTransaction();
        try {
            $record = Estudiante::latest()->first();

            if ($record == null or $record == "") {

                $fecha = Carbon::now();
                $año = substr($fecha->format("Y"), -2);
                $login = $cve_institucion . $año . '00001';
            } else {

                $record = Estudiante::latest()->first();
                $fecha_creacion = substr($record->fecha_creacion->format("Y"), -2);
                $fecha_actual =  Carbon::now();
                $año_actual = substr($fecha_actual->format("Y"), -2);
                if ($fecha_creacion != $año_actual) {
                    $consecutivo = substr($record->login, -5);
                    $login = $cve_institucion . $año_actual . $consecutivo;
                    $login = $login + 1;
                } else {

                    $login = $record->login + 1;
                }
            }

            // dd($record);

            $estudiante = new Estudiante([
                'login' => $login,
                'password' => Hash::make($login),
            ]);

            $estudiante->save();

            $estudiante->perfil()->create(request([
                'tipo_estudiante_id',
                'estado_id',
                'ciudad_id',
                'colonia_id',
                'nombre',
                'apellido_paterno',
                'apellido_materno',
                'calle',
                'num_exterior',
                'num_interior',
                'telefono',
                'mail',
            ]));

            DB::connection('sqlsrv_edcon')->commit();
            Alert::toast('Guardado correctamente!', 'success');
            // Alert::success('Exito', 'Guardado correctamente!');
            return redirect()->route('estudiantes.index');
        } catch (\Exception $e) {
            DB::connection('sqlsrv_edcon')->rollBack();
            // return $e->getMessage();
            Alert::error('Error', 'Verifica completar los campos requeridos!');
            return redirect()->back();
        }
    }

    public function ciudades_por_estado($id)
    {
        return DomicilioCiudad::where('cve_estado', $id)->orderBy('nombre', 'ASC')->get();
    }

    public function colonias_por_ciudad($id)
    {
        return DomicilioColonia::where('cve_ciudad', $id)->orderBy('nombre', 'ASC')->get();
    }
}
