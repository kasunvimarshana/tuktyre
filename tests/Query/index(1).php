<?php

$num = $mystuff->groupBy('dateDay')->map(function ($row){
    return $row->sum('n');
});

?>

<?php

$data = DB::table('users')
    ->select(DB::raw('SUM(users_address.id) AS total_address'))
    ->leftjoin('users_address', 'users_address.user_id', '=', 'users.id')
    ->groupBy('users.id')
    ->get();

?>

<?php

$users = DB::table('users')
    ->select(DB::raw('COUNT(*) AS user_count', 'status'))
    ->where('status', '<>', 1)
    ->groupBy('status')
    ->get();

?>

<?php

$query = DB::table('users')->select('name');
$query = $query->addSelect('age')->get('name');

?>

<?php

$orders = DB::table('oders')
    ->selectRaw('price * ? AS price_with_tax', [1.0825])
    ->get();

?>

<?php

$orders = DB::table('oders')
    ->select('department', DB::raw('SUM(price) AS total_sales'))
    ->groupBy('department')
    ->havingRaw('SUM(price) > ?', [2500])
    ->get();

?>

<?php

$orders = DB::table('users')
    ->join('contacts', 'users.id', '=', 'contacts.user_id')
    ->join('orders', 'users.id', '=', 'orders.user_id')
    ->select('users.*', 'contacts.phone', 'orders.price')
    ->get();
?>