@if ($Date === date('Y-m-d'))
<tr class="today history Hide">
   <td>Today :: {{ count($Today_COUNT) }}</td> 
</tr>
@elseif (
   $Date >= date('Y-m-d', strtotime('last Sunday')) AND
   !($Date > date('Y-m-d'))
)
<tr class="this-week history Hide">
   <td>This week :: {{ count($ThisWeek_COUNT) }}</td> 
</tr>
@elseif (
   $Date >= date('Y-m-d', strtotime('last week Monday')) AND
   $Date < date('Y-m-d', strtotime('last Sunday'))
)
<tr class="last-week history Hide">
   <td>Last week :: {{ count($LastWeek_COUNT) }}</td> 
</tr>
@elseif ($Date < date('Y-m-d', strtotime('last week Monday')))
<tr class="older history Hide">
   <td>Older :: {{ count($Older_COUNT) }}</td> 
</tr> 
@endif