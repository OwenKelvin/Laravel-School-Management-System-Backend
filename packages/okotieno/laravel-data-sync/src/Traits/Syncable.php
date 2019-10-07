<?php

namespace Okotieno\DataSync\Traits;

use GuzzleHttp;
use DB;
use Okotieno\DataSync\Models\SyncModel;

trait Syncable
{
    public $updated_at;
    public $sync_columns = [];
    public $token_type = '';
    public $access_token = '';

    public function hasEverBeenSynced()
    {
        return !$this->sync() == null;
    }

    public function isSynced()
    {
        if ($this->hasEverBeenSynced()) {
            // return $this->sync()->last_synced >= $this->updated_time;
            return $this->synced;
        }
        return false;
    }

    public function getUpdatedTimeAttribute()
    {
        return $this->updated_at;
    }

    public function markAsSynced()
    {
        $sync = $this->findOrCreateSync();
        // $sync->last_synced = $this->updated_time;
        // $sync->updated_at = $this->updated_time;
        $sync->synced = true;
        $sync->save();
    }

    public function sync()
    {
        return SyncModel::withClassName(self::class)
            ->syncs()->where('model_id', $this->id)->first();
    }

    public function findOrCreateSync()
    {

        $yncClass = SyncModel::withClassName(self::class);
        if (($sync = $yncClass->syncs()->where('model_id', $this->id)->first()) == null) {
            $sync = $yncClass->syncs()->create([
                'model_id' => $this->id
            ]);
        }
        return $sync;
    }

    public function setSyncColumns($columns = [])
    {

        $sync_columns = [];
        foreach ($columns as $sync_column) {
            if (gettype($sync_column) == 'string') {
                $sync_columns[] = ['from' => $sync_column, 'to' => $sync_column];

            } else {
                $sync_columns[] = [
                    'from' => $sync_column['from'],
                    'to' => $sync_column['to']
                ];
            }
        }
        $this->sync_columns = $sync_columns;
    }

    public function syncData()
    {
        $client = new GuzzleHttp\Client(['base_uri' => env('COUNTY_SYNC_LINK')]);
        $columns = [];
        foreach ($this->sync_columns as $column) {
            $columns[$column['to']] = $this[$column['from']];
        }

        try {
            $res = $client->request('POST', '/api/students', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => $this->token_type . ' ' . $this->access_token
                ],
                'form_params' => [$columns]
            ]);
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            return $e;
        }
        return $res;
    }

    public function setToken($token)
    {
        $this->token_type = $token['token_type'];
        $this->access_token = $token['access_token'];
    }

    public function getToken($request)
    {
        $http = new GuzzleHttp\Client;

        try {
            $response = $http->post(env('COUNTY_SYNC_LINK') . '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '4',
                    'client_secret' => '1YVtHo2QSBAzZ91oPM1tl1rQoZ6OXnO4aak02igG',
                    'username' => $request['email'],
                    'password' => $request['password'],
                    'scope' => '',
                ],
            ]);
        } catch (\Exception $e) {

            if (str_contains('invalid_credentials', json_encode($e))) {
                return response()->json([
                    'error' => 'Invalid Credentials'
                ]);
            } else {
                return $e;
            }
        }
        $this->setToken(json_decode($response->getBody(), true));
    }
}
