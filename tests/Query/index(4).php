<?php

select * into mynewtable from
(
select x,y,c from mytable1
union all --does not remove duplicates
select x,y,c from mytable2
) t1

?>