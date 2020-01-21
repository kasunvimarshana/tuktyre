<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Customer extends Model
{
    //
    //protected $table = "table";
    //protected $primaryKey = array('id');
    protected $primaryKey = "id";
    //protected $keyType = 'int';
    //public $incrementing = true;
    //protected $connection = "mysql";
    //$this->setConnection("mysql");
    //protected $guard = 'guard';//the authentication guard
    //protected $perPage = 25;
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';
    //public $timestamps = false;
    
    //protected $dates = array('created_at', 'updated_at', 'deleted_at');
    //protected $appends = array('field1', 'field2');
    //protected $attributes = array();
    //protected $guarded = array();
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('id', 'is_visible', 'is_active', 'user_id', 'status_id', 'company_id', 'strategic_business_unit_id', 'date_time_create');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array();

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = array();
    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    //protected $touches = ['table_name'];
    /**
    * The relations to eager load on every query.
    *
    * @var array
    */
    //protected $with = [];
    /*
    protected $supportedRelations = [];
    public function scopeWithAll($query){
        return $query->with($this->supportedRelations);
    }
    */
    
    /**
    * Set the keys for a save update query.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    protected function setKeysForSaveQuery(Builder $query){
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }
        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }
        return $query;
    }
    
    /**
    * Get the primary key value for a save query.
    *
    * @param mixed $keyName
    * @return mixed
    */
    protected function getKeyForSaveQuery($keyName = null){
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }
        if (isset($this->original[$keyName])){
            return $this->original[$keyName];
        }
        return $this->getAttribute($keyName);
    }
    
    protected static function boot(){
        parent::boot();
        
        static::creating(function( $model ){ /**/ });
        
        static::saving(function( $model ){ /**/ });
    }
    
    //one to many (inverse)
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    /*
    //one to many (polymorphic)
    public function userAttachments(){
        return $this->morphMany('App\Attachable', 'attachable', 'attachable_type', 'attachable_id', 'id');
    }
    */
}
