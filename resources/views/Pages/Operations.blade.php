@extends('Layouts.Layout-2')
@section('Title', 'Operations - SEA SERVICE TESTIMONIAL')

@section('Content')
@include('Components.Forms.Add.Testimonial')
<div class="operation-content table-1"> 
   <header>
      <div class="h-1">
         <h1>Operations</h1>
         <button class="CreateTestimonialButton">+ Add Testimonial</button>
      </div>
      <div class="h-2">
         <input type="text" placeholder="Search operations..">
         <span><img src="{{ asset('images/ship (1).png') }}" alt="">Vessels</span>
         <span><img src="{{ asset('images/engineering.png') }}" alt="">Operations</span>
         <span><img src="{{ asset('images/share.png') }}" alt="">Export</span>
      </div>
      <div class="h-3"> 
         <h2 class="{{ !(request()->has('FilterValue')) ? 'active' : 'inactive' }} operations-route">All operations</h2>
         <h2 class="{{ request()->input('FilterValue') == 'DEPASA' ? 'active' : 'inactive' }} filter-value-x">DEPASA</h2>
         <h2 class="{{ request()->input('FilterValue') == 'L.T.T' ? 'active' : 'inactive' }} filter-value-x">L.T.T</h2>
      </div>
   </header> 
   <div class="no-data">
      <center>
          <svg xmlns="http://www.w3.org/2000/svg" height="200" viewBox="0 -960 960 960" width="200"><path d="M479-418ZM158-200 82-468q-3-12 2.5-28t23.5-22l52-18v-184q0-33 23.5-56.5T240-800h120v-120h240v120h120q33 0 56.5 23.5T800-720v184l52 18q21 8 25 23.5t1 26.5l-76 268q-50 0-91-23.5T640-280q-30 33-71 56.5T480-200q-48 0-89-23.5T320-280q-30 33-71 56.5T158-200ZM80-40v-80h80q42 0 83-13t77-39q36 26 77 38t83 12q42 0 83-12t77-38q36 26 77 39t83 13h80v80h-80q-42 0-82-10t-78-30q-38 20-78.5 30T480-40q-41 0-81.5-10T320-80q-38 20-78 30t-82 10H80Zm160-522 240-78 240 78v-158H240v158Zm240 282q47 0 79.5-33t80.5-89q48 54 65 74t41 34l44-160-310-102-312 102 46 158q24-14 41-32t65-74q50 57 81.5 89.5T480-280Z"/></svg>
          <h1>No Opeartions</h1>
          <p>Make it easier to track monthly/quarterly reports by creating your saved project.</p>
          <button>+ Create a Testimonial</button>
      </center>
   </div>
   <div class="table">
      <table>
         <tr>
            <th>Date</th> 
            <th>Vessel</th>
            <th>Area of operation</th>
            <th>Nature of duties performed</th>
            <th>Working period/leave days</th>
            <th>#</th> 
         </tr>
         @unless (count($Operations) > 0)
         <tr>
            <td class="empty-list">System have not recorded any operations..</td>
         </tr>
         @endunless
         @foreach ($Operations as $Operation)
         <tr>
            <td class="data-x filter-value-x">{{ $Operation->DateIn }}</td>
            <td class="data-x filter-value-x">{{ $Operation->CurrentVessel }}</td>
            <td class="filter-value-x">{{ $Operation->AreaOfOperation }}</td>
            <td class="data-x filter-value-x">
               @switch($Operation->Template)
                   @case('Deck')
                        Navigational watch for not less than 12 hours out of every 24 hours whilst the vessel was engaged on operation. General maintenance of vessel.
                       @break
                   @case('Engine')
                        Regular watch on auxiliary machinery. Regular watch on main
                        propulsion machinery. Regular work in Ships processing centralized control room, full or partial Automation
                        facilty to operate machinery in the unmanned mode for a significant proportion of each 24 hour period.
                       @break
                     @case('Captain')
                        Navigational watch for not less than 12 hours out of every 24 hours
                        whilst the vessel was engaged in harbour towage activities and limited coastal voyages. As - TIM, he has
                        shown to be very experienced in ASD tug handling giving the highest guarantee & quality of tug assistance to
                        the Lagos Pilotage District.
                        He showed to have a high level of leadership skills & work ethics making him a role model for his crew.
                        @break
                   @default
                       
               @endswitch 
            </td>
            <td>
               <div class="operation-working-periods">
                  @php
                      $WorkingPeriods = \DB::table('working_periods')->where('Vessel', $Operation->CurrentVessel)->where('DateIn', $Operation->DateIn)->get();
                      $EmployeeName = \DB::table('testimonials')->select(['EmployeeName', 'Rank'])->where('EmployeeId', $Operation->EmployeeId)->where('DateIn', $Operation->DateIn)->where('TimeIn', $Operation->TimeIn)->first();
                      $TotalNumberOfDays_OPERATION_Arr = []; 
                      $LeaveDays_Arr = []; 
                      $LeaveDays_ARR_1 = []; 
                      $LeaveDays_ARR_2 = []; 
                      $LeaveDays_ARR_3 = []; 
                      $LeaveDays_ARR_4 = [];  
                      $TotalLeaveDays = [];
                  @endphp
                  @foreach ($WorkingPeriods as $Period)
                     @if (!empty($Period->StartDate_1) AND !empty($Period->EndDate_1))
                        <h2>Period 1</h2> 
                        From: {{ $Period->StartDate_1 }} <br> To: {{ $Period->EndDate_1 }} 
                        @php
                            $StartDate_1_ = \Carbon\Carbon::parse($Period->StartDate_1);
                            $EndDate_1_ = \Carbon\Carbon::parse($Period->EndDate_1);
                            array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_1_->diffInDays($EndDate_1_));
                            array_push($LeaveDays_ARR_1, $Period->EndDate_1);
                        @endphp
                        <br> ({{ $StartDate_1_->diffInDays($EndDate_1_) }} days) <br> <span></span>
                     @endif
                     @if (!empty($Period->StartDate_2) AND !empty($Period->EndDate_2))
                        <h2>Period 2</h2>
                        From: {{ $Period->StartDate_2 }} <br> To: {{ $Period->EndDate_2 }}  
                        @php
                            $StartDate_2_ = \Carbon\Carbon::parse($Period->StartDate_2);
                            $EndDate_2_ = \Carbon\Carbon::parse($Period->EndDate_2);
                            array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_2_->diffInDays($EndDate_2_));
                            array_push($LeaveDays_ARR_1, $Period->StartDate_2);
                            array_push($LeaveDays_ARR_2, $Period->EndDate_2);
                            array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_1[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_1[1])));
                        @endphp
                        <br> ({{ $StartDate_2_->diffInDays($EndDate_2_) }} days) <br> <span></span>
                     @endif
                     @if (!empty($Period->StartDate_3) AND !empty($Period->EndDate_3))
                        <h2>Period 3</h2>
                        From: {{ $Period->StartDate_3 }} <br> To: {{ $Period->EndDate_3 }}  
                        @php
                            $StartDate_3_ = \Carbon\Carbon::parse($Period->StartDate_3);
                            $EndDate_3_ = \Carbon\Carbon::parse($Period->EndDate_3);
                            array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_3_->diffInDays($EndDate_3_));
                            array_push($LeaveDays_ARR_2, $Period->StartDate_3);
                            array_push($LeaveDays_ARR_3, $Period->EndDate_3);
                            array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_2[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_2[1])));
                        @endphp
                        <br> ({{ $StartDate_3_->diffInDays($EndDate_3_) }} days) <br> <span></span>
                     @endif
                     @if (!empty($Period->StartDate_4) AND !empty($Period->EndDate_4))
                        <h2>Period 4</h2>
                        From: {{ $Period->StartDate_4 }} <br> To: {{ $Period->EndDate_4 }}  
                        @php
                            $StartDate_4_ = \Carbon\Carbon::parse($Period->StartDate_4);
                            $EndDate_4_ = \Carbon\Carbon::parse($Period->EndDate_4);
                            array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_4_->diffInDays($EndDate_4_));
                            array_push($LeaveDays_ARR_3, $Period->StartDate_4);
                            array_push($LeaveDays_ARR_4, $Period->EndDate_4);
                            array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_3[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_3[1])));
                        @endphp
                        <br> ({{ $StartDate_4_->diffInDays($EndDate_4_) }} days) <br> <span></span>
                     @endif
                     @if (!empty($Period->StartDate_5) AND !empty($Period->EndDate_5))
                        <h2>Period 5</h2>
                        From: {{ $Period->StartDate_5 }} <br> To: {{ $Period->EndDate_5 }}  
                        @php
                            $StartDate_5_ = \Carbon\Carbon::parse($Period->StartDate_5);
                            $EndDate_5_ = \Carbon\Carbon::parse($Period->EndDate_5);
                            array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_5_->diffInDays($EndDate_5_));
                            array_push($LeaveDays_ARR_4, $Period->StartDate_5);
                            array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_4[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_4[1])));
                        @endphp
                        <br> ({{ $StartDate_5_->diffInDays($EndDate_5_) }} days) <br> <span></span>
                     @endif   
                     @if (count($TotalLeaveDays) < 1)
                        {{ $EmployeeName->EmployeeName }} ({{ $EmployeeName->Rank }}) <br> worked for {{ collect($TotalNumberOfDays_OPERATION_Arr)->sum() }} days and did not go <br> on leave during these period.
                        @else
                        {{ $EmployeeName->EmployeeName }} ({{ $EmployeeName->Rank }}) <br> worked for {{ collect($TotalNumberOfDays_OPERATION_Arr)->sum() }} days and went on <br> leave for {{ collect($TotalLeaveDays)->sum() }} days.
                     @endif
                  @endforeach
               </div>
            </td>
            <td class="action"><img src="{{ asset('images/eye.png') }}" alt=""></td>
         </tr> 
         @endforeach 
      </table>
   </div>
   {{ $Operations->appends(request()->query())->links() }}
</div>
<script src="{{ asset('js/Components/Add/Testimonial.js') }}"></script>
@endsection