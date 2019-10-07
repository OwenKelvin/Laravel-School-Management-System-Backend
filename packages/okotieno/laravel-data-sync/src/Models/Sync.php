<?php

namespace Okotieno\DataSync\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Sync extends Model
{
    protected $fillable = ['model_id', 'synced', 'last_synced', 'sync_model_id'];

    public function syncModel()
    {
        return $this->belongsTo(SyncModel::class);
    }

    public static function allUnSynced()
    {
        $response = [];
        foreach (SyncModel::all() as $model) {

            $model_new = str_replace(' ', '', $model->model_class);
            $model_new = new $model_new;
            $table_name = $model_new->getTable();
            $records = DB::table($table_name)
                ->leftJoin('syncs', 'syncs.model_id', '=', $table_name . ".id")
                ->where("syncs.sync_model_id", $model->id)
                ->where("syncs.synced", false)
                ->orWhereNull("syncs.id")
                ->select(["{$table_name}.id", "{$table_name}.updated_at", "syncs.last_synced"])
                ->get()
                ->pluck('id');
//                $records = DB::table($table_name)
//                ->leftJoin('syncs', 'syncs.model_id', '=', $table_name . ".id")
//                ->where("syncs.sync_model_id", $model->id)
//                ->orWhereNull("syncs.id")
//                ->select(["{$table_name}.id", "{$table_name}.updated_at", "syncs.last_synced"])
//                ->get()
//                ->filter(function ($item) {
//                    if ($item->updated_at == NULL || $item->last_synced == NULL){
//                        return true;
//                    }
//                    return
//                        Carbon::createFromFormat("Y-m-d H:i:s", $item->updated_at) !=
//                        Carbon::createFromFormat("Y-m-d H:i:s", $item->last_synced);
//
//                })
//                ->pluck('id');

            $response[] = [
                'table_name' => $model->name,
                'class' => $model->model_class,
                'records' => $records
            ];
        }
        return $response;
    }
}
