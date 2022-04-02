<?php
namespace App\Repositories\Prospecto;
// Models
use App\Models\Prospecto;
// Otros
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\Prospecto\ProspectoCacheInterface as ProspectoCacheInterface ;

class ProspectoCacheRepositories implements ProspectoCacheInterface {
  public function getFindOrFailCache($id) {
    $prospecto = Cache::rememberForever('prospecto-'.$id, function() use($id){
      return Prospecto::findOrFail($id);
    });
    return $prospecto;
  }
}
