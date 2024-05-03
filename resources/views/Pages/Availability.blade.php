@extends('Layouts.Layout-2')
@section('Title', 'Availability - SEA SERVICE TESTIMONIAL')

@section('Content')
@include('Components.Forms.Add.Testimonial')
<div class="availability-content table-1">   
   <div class="table">
      <table>
         <tr>
            <th>VESSEL AVAILABILITY</th>
            <th class="period">
               <div class="th time-title">START TIME</div>
               <div class="th time-title">FINISH TIME</div>
               <div class="th">INTERVAL</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">6AM - 9AM</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">9AM - 12PM</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">12PM - 3PM</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">3PM - 6PM</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">6PM - 9PM</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">9PM - 12AM</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">12AM - 3AM</div>
            </th>
            <th class="period">
               <div class="th">06:30AM</div>
               <div class="th">08:00AM</div>
               <div class="th">3AM - 6AM</div>
            </th>
         </tr> 
         <tr>
            <td class="data-x">
               <div class="vessel-x">
                  <p>ASAGA</p>
                  <p>9252709</p>
                </div>
            </td>
            <td> 
               
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="status-inner"></div> 
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div>
                  <div class="operation status-inner"></div> 
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div>
                  <div class="operation status-inner"></div>
                  <div class="breakdown status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="maintenance status-inner"></div> 
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div>
                  <div class="operation status-inner"></div> 
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div> 
                  <div class="inspection status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div> 
                  <div class="breakdown status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div>
                  <div class="operation status-inner"></div>
                  <div class="breakdown status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div>
                  <div class="operation status-inner"></div> 
               </div>
            </td>
         </tr>
         <tr>
            <td class="data-x">
               <div class="vessel-x">
                  <p>EMEKUKU</p>
                  <p>3244373</p>
                </div>
            </td>
            <td> 
               
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="operation status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="bunkery status-inner"></div> 
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="breakdown status-inner"></div>
                  <div class="operation status-inner"></div>
                  <div class="bunkery status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="bunkery status-inner"></div>
                  <div class="operation status-inner"></div>
                  <div class="breakdown status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="status-inner"></div>
                  <div class="operation status-inner"></div>
                  <div class="bunkery status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="docking status-inner"></div>
                  <div class="operation status-inner"></div>
                  <div class="breakdown status-inner"></div>
               </div>
            </td>
            <td class="status">
               <div class="status-inner-x">
                  <div class="status-inner"></div>
                  <div class="status-inner"></div>
                  <div class="status-inner"></div>
               </div>
            </td>
         </tr>
      </table>
   </div>
</div>
<script src="{{ asset('js/Components/Add/Testimonial.js') }}"></script>
@endsection