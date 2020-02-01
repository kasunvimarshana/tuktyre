<?php

// signature
function belongsToMany(
    $related,
    $table = null,
    $foreignKey = null,
    $otherKey = null,
    $foreignTableKey = null,
    $otherTableKey = null
)
    
// generic example
$this->belongsToMany(
    'Model2',
    'model1s_model2s',
    'model1_nonprimary_id',
    'model2_nonprimary_id',
    'nonprimary_id',
    'nonprimary_id'
)

?>