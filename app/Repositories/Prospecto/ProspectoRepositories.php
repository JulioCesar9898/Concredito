<?php
namespace App\Repositories\Prospecto;
use App\Models\Prospecto;
use Illuminate\Support\Facades\DB;
use App\Events\layouts\ActividadesRegistradas;
use App\Repositories\Prospecto\ProspectoCacheRepositories;
class ProspectoRepositories implements ProspectoInterface{


protected $prospectoCacheRepo;
public function __construct(ProspectoCacheRepositories $prospectoCacheRepositories) {
  $this->prospectoCacheRepo = $prospectoCacheRepositories;
}  
//Actualizar
public function update($request, $id) {
    $prospecto = $this->prospectoCacheRepo->getFindOrFailCache($id);
   $prospecto->nom     = $request->nom;
    $prospecto->apell_p    = $request->apell_p;
    $prospecto->apell_m  = $request->apell_m;
    $prospecto->calle_  = $request->calle;
    $prospecto->numero = $request->numero;
    $prospecto->colonia=$request->colonia;
     $prospecto->cp=$request->cp;
    $prospecto->telefono=$request->telefono;
    $prospecto->RFC=$request->RFC;
    $prospecto->status=$request->status;
    $prospecto->observacion=$request->observacion;
 
    //$prospecto->user_id=$request->cliente; 
  
    if($prospecto->isDirty()) {
      $info = (object) [
        'modulo'=>'Prospecto', 'modelo'=>'App\Models\Prospecto', 'ruta'=>'Edit ´Prospecto', 'permisos'=>'prospecto.show,prospecto.edit', 'request'=>$prospecto,
        'campos'  => [
                        ['nom','Nomrbre'],
                        ['apell_p','Primer Apellido'],
                        ['apell_m','Segundo Apellido'],
                        ['calle_','Calle'],
                        ['numero','Numero'],
                        ['colonia','Colonia'],
                        ['cp','Cp'],
                        ['telefono','Telefono'],
                        ['RFC','RFC'],
                        ['status','Status'],
                        ['observacion','Observacion'],
                      
                      ]];
      //Dispara el evento registrado en App\Providers\EventServiceProvider.php  
      ActividadesRegistradas::dispatch($info); 
    }
    $prospecto->save();
    return $prospecto;
  }

}