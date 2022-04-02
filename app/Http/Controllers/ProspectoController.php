<?php

namespace App\Http\Controllers;
use App\Models\Prospecto;
use App\Models\Documento;
use Illuminate\Http\Request;
use File;
use App\Repositories\Prospecto\ProspectoRepositories;
use App\Http\Request\Prospecto\UpdateProspectoRequest; 
use Illuminate\Support\Facades\DB;

class ProspectoController extends Controller
{

    protected $prospecto;
    public function __construct(ProspectoRepositories $prospectoRepositories) {
       $this->prosRepo = $prospectoRepositories;
    }
//Listar Prospectos
    public function index()
    {
        $users = DB::table('prospecto')
        ->select('id','nom','apell_p','apell_m','status')
        ->whereNull('deleted_at')
        ->get();
        return response()->json( $users);
    }

   //Controlador para registrar Prospectos
    public function store(Request $request)
    {
   
            $prospecto = new Prospecto();
            $prospecto->nom= $request->input('nom');
            $prospecto->apell_p= $request->input('apell_p');
            $prospecto->apell_m= $request->input('apell_m');
            $prospecto->calle_= $request->input('calle_');
            $prospecto->numero= $request->input('numero');
            $prospecto->colonia= $request->input('colonia');
            $prospecto->cp= $request->input('cp');
            $prospecto->telefono= $request->input('telefono');
            $prospecto->RFC= $request->input('RFC');
            $prospecto->doc= 'doc';
            $prospecto->status = 'enviado';
         		  
            $prospecto->save();		
			
            return response()->json(['status'=>'success']);  


    }

    //Mostrar Prospectos
    public function show($id)
    {
        $prospecto = DB::table('prospecto')
        ->select('id','nom','apell_p','apell_m','calle_','numero','colonia','cp','telefono','RFC','status','observacion')
        ->where('id','=', $id)
        ->first();
		$documento = DB::table('document')
        ->select('id','nombre_document','ruta_document','url_document','status')
        ->where('id_prospecto','=', $id)
        ->get();
		return response()->json(
            array('success'=>true,
            'prospecto'=>$prospecto,
            'documento'=>$documento),200
            );

     
    }
//Traer todos los registros de prospectos
    public function get($id){
        $prospectos = DB::table('prospecto')
          ->where('id', '=', $id)
          ->first();
          return response()->json($prospectos);
      }
//Actualizar Prospectos por id
    public function update(Request $request, $id) {

        $prospecto = $this->prosRepo->update($request, $id);
        return response()->json(['id'=>$prospecto->id],200);

      }
//Traer archivos de cada prospecto
	public function uploadFiles(Request $request)
    {
			$users = Prospecto::select('id')->orderBy('id', 'desc')->first();
			$documento = new Documento();
			$documento->id_prospecto= $users->id;
			$image = $request->file('file');
			if ($image) {
				foreach($request->file('file') as $file)
				{
					$name=$file->getClientOriginalName();
					$documento->nombre_document =$name;
					$documento->ruta_document = $file->move(public_path().'/files/', $name);
					$documento->url_document = $request->root().'/files/'.$name;
					$data[] = $name;  
				}
			}
			$file= new File();
			$documento->status = '1';
            $documento->save();

			
    }
}
