{{-- NCLEX TEMPLATE --}}
@if($courseinfo_id == 1)
 from NCLEX

 {{-- OSCE TEMPLATE --}}
@elseif($courseinfo_id == 2)
from OSCE

 {{-- OBA TEMPLATE --}}
@elseif($courseinfo_id == 4)
from OBA


@else

@endif