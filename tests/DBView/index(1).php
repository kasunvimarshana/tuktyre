<?php

/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }

    private function createView()
    {
        return <<<SQL
CREATE VIEW `user_last_logins` AS
SELECT
    users.id as id,
    users.id AS user_id,
    max(logins.id) AS login_id
FROM
    logins,
    users
WHERE
    logins.user_id = users.id
GROUP BY
    user_id;
SQL;
    }

    private function dropView()
    {
        return <<<SQL
DROP VIEW IF EXISTS `user_last_login`;
SQL;
    }


//////////////////////////////////////////////////////////////////////////



public function lastLogin()
{    
    return $this->hasOneThrough(
        'App\User', // related model
        'App\LastLogin', // intermediate model
        'user_id', // match on LastLogin (foreign key)
        'id', // User local key
        'id', // Login local key
        'login_id' // foreign key on LastLogin
    );
}



/////////////////////////////////////////////////////////



public function scopeUsingDevice($query, $device)
{
    return $query->whereHas('lastLogin', function ($query) use ($device) {
        $query->whereLatest('device_type', $device);
    });
}

/////////////////////////////////////////////////////////////////////////



SELECT 
    unit_id
    , user_id
    , DATE_FORMAT(`date`, '%Y-%m-%d') AS day
    , COUNT(CASE WHEN type = 'electricity' THEN type END) 
        AS `electricity`
    , COUNT(CASE WHEN type = 'water' THEN type END) 
        AS `water`
    , COUNT(CASE WHEN type = 'gas' THEN type END) 
        AS `gas`
    
FROM 
    meter_readings
    
GROUP BY
    unit_id
    , user_id
    , day
;

?>