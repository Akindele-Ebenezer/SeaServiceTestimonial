@extends('Layouts.Layout-2')
@section('Title', 'Testimonials - SEA SERVICE TESTIMONIAL')
@include('Components.Forms.Add.Testimonial') 
@include('Components.Forms.Edit.Testimonial')
@include('Components.Forms.Delete.Testimonial')
@include('Components.Inner.Testimonial')

@section('Content')
<div class="table-1"> 
   <header>
      <div class="h-1">
         <h1>Testimonials</h1>
         <button class="CreateTestimonialButton">+ Add Testimonial</button>
      </div>
      <div class="h-2">
         <input type="text" placeholder="Search testimonials..">
         <span><img src="{{ asset('images/ship (1).png') }}" alt="">Vessels</span>
         <span><img src="{{ asset('images/engineering.png') }}" alt="">Operations</span>
         <span><img src="{{ asset('images/share.png') }}" alt="">Export</span>
      </div>
      <div class="h-3">
         <h2 class="{{ !(request()->has('FilterValue')) ? 'active' : 'inactive' }} testimonials-route">All testimonials</h2>
         <h2 class="{{ request()->input('FilterValue') == 'DEPASA' ? 'active' : 'inactive' }} filter-value-x">DEPASA</h2>
         <h2 class="{{ request()->input('FilterValue') == 'L.T.T' ? 'active' : 'inactive' }} filter-value-x">L.T.T</h2>
      </div>
   </header> 
   <div class="no-data">
      <center>
          <svg xmlns="http://www.w3.org/2000/svg" height="200" viewBox="0 -960 960 960" width="200"><path d="M479-418ZM158-200 82-468q-3-12 2.5-28t23.5-22l52-18v-184q0-33 23.5-56.5T240-800h120v-120h240v120h120q33 0 56.5 23.5T800-720v184l52 18q21 8 25 23.5t1 26.5l-76 268q-50 0-91-23.5T640-280q-30 33-71 56.5T480-200q-48 0-89-23.5T320-280q-30 33-71 56.5T158-200ZM80-40v-80h80q42 0 83-13t77-39q36 26 77 38t83 12q42 0 83-12t77-38q36 26 77 39t83 13h80v80h-80q-42 0-82-10t-78-30q-38 20-78.5 30T480-40q-41 0-81.5-10T320-80q-38 20-78 30t-82 10H80Zm160-522 240-78 240 78v-158H240v158Zm240 282q47 0 79.5-33t80.5-89q48 54 65 74t41 34l44-160-310-102-312 102 46 158q24-14 41-32t65-74q50 57 81.5 89.5T480-280Z"/></svg>
          <h1>No Testimonials</h1>
          <p>Make it easier to track monthly/quarterly reports by creating your saved project.</p>
          <button>+ Create a Testimonial</button>
      </center>
   </div>
   <div class="table">
      <table>
         <tr>
            <th> </th> 
            <th>Employee</th> 
            <th>Vessel</th>
            <th>Staff number</th>
            <th>Discharge book</th>
            <th>Position</th> 
            <th>#</th> 
         </tr>
         @unless (count($Testimonials) > 0)
         <tr>
            <td class="empty-list">System don't have any testimonials..</td>
         </tr>
         @endunless
         @foreach ($Testimonials as $Testimonial)
         <tr>
            <td class="action">
               <span class="Hide">{{ $Testimonial->EmployeeName }}</span>
               <img class="info-button" src="{{ asset('images/testimonial.png') }}" alt="">
               <span class="Hide">{{ $Testimonial->DateIn }}</span>
               <span class="Hide">{{ $Testimonial->CurrentVessel }}</span>
               <span class="Hide">{{ $Testimonial->Rank }}</span>
               <span class="Hide">{{ $Testimonial->DateOfBirth }}</span>
               <span class="Hide">{{ $Testimonial->EmployeeId }}</span>
               <span class="Hide">{{ $Testimonial->Company }}</span>
               @php
               $WorkingPeriods = \DB::table('working_periods')->where('Vessel', $Testimonial->CurrentVessel)->where('DateIn', $Testimonial->DateIn)->get();
               $WorkingPeriod = \DB::table('working_periods')
                                ->select([
                                   'StartDate_1', 'EndDate_1', 
                                   'StartDate_2', 'EndDate_2',
                                   'StartDate_3', 'EndDate_3',
                                   'StartDate_4', 'EndDate_4',
                                   'StartDate_5', 'EndDate_5', 
                                   ])
                                ->where('DateIn', $Testimonial->DateIn)
                                ->where('TimeIn', $Testimonial->TimeIn)
                                ->where('Vessel', $Testimonial->CurrentVessel) 
                                ->first();
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
                        @php
                           $StartDate_1_ = \Carbon\Carbon::parse($Period->StartDate_1);
                           $EndDate_1_ = \Carbon\Carbon::parse($Period->EndDate_1);
                           array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_1_->diffInDays($EndDate_1_));
                           array_push($LeaveDays_ARR_1, $Period->EndDate_1);
                        @endphp
                     @endif
                     @if (!empty($Period->StartDate_2) AND !empty($Period->EndDate_2))
                        @php
                           $StartDate_2_ = \Carbon\Carbon::parse($Period->StartDate_2);
                           $EndDate_2_ = \Carbon\Carbon::parse($Period->EndDate_2);
                           array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_2_->diffInDays($EndDate_2_));
                           array_push($LeaveDays_ARR_1, $Period->StartDate_2);
                           array_push($LeaveDays_ARR_2, $Period->EndDate_2);
                           array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_1[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_1[1])));
                        @endphp
                     @endif
                     @if (!empty($Period->StartDate_3) AND !empty($Period->EndDate_3))
                        @php
                           $StartDate_3_ = \Carbon\Carbon::parse($Period->StartDate_3);
                           $EndDate_3_ = \Carbon\Carbon::parse($Period->EndDate_3);
                           array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_3_->diffInDays($EndDate_3_));
                           array_push($LeaveDays_ARR_2, $Period->StartDate_3);
                           array_push($LeaveDays_ARR_3, $Period->EndDate_3);
                           array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_2[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_2[1])));
                        @endphp
                     @endif
                     @if (!empty($Period->StartDate_4) AND !empty($Period->EndDate_4))
                        @php
                           $StartDate_4_ = \Carbon\Carbon::parse($Period->StartDate_4);
                           $EndDate_4_ = \Carbon\Carbon::parse($Period->EndDate_4);
                           array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_4_->diffInDays($EndDate_4_));
                           array_push($LeaveDays_ARR_3, $Period->StartDate_4);
                           array_push($LeaveDays_ARR_4, $Period->EndDate_4);
                           array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_3[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_3[1])));
                        @endphp
                     @endif
                     @if (!empty($Period->StartDate_5) AND !empty($Period->EndDate_5))
                        @php
                           $StartDate_5_ = \Carbon\Carbon::parse($Period->StartDate_5);
                           $EndDate_5_ = \Carbon\Carbon::parse($Period->EndDate_5);
                           array_push($TotalNumberOfDays_OPERATION_Arr, $StartDate_5_->diffInDays($EndDate_5_));
                           array_push($LeaveDays_ARR_4, $Period->StartDate_5);
                           array_push($TotalLeaveDays, \Carbon\Carbon::parse($LeaveDays_ARR_4[0])->diffInDays(\Carbon\Carbon::parse($LeaveDays_ARR_4[1])));
                        @endphp
                     @endif
                     <span class="Hide">{{ collect($TotalLeaveDays)->sum() == 0 ? 'no leave' : collect($TotalLeaveDays)->sum() }} days</span> 
                     <span class="Hide">{{ collect($TotalNumberOfDays_OPERATION_Arr)->sum() }} days</span> 
                  @endforeach
            </td>
            <td class="data-x filter-value-x">{{ $Testimonial->EmployeeName }}</td>
            <td class="data-x filter-value-x">{{ $Testimonial->CurrentVessel }}</td>
            <td class="data-x filter-value-x">{{ $Testimonial->EmployeeId }}</td>
            <td class="filter-value-x">{{ $Testimonial->DischargeBook }}</td>
            <td class="data-x filter-value-x">{{ $Testimonial->Rank }}</td>
            <td class="action">
               <img class="TestimonialPdf" src="{{ asset('images/pdf.png') }}" alt="">
               {{-- 0 --}}
               <span class="Hide">{{ $Testimonial->id }}</span>
               <span class="Hide">{{ $Testimonial->Template }}</span>
               <img src="{{ asset('images/statistic.png') }}" alt="">
               <img class="EditTestimonialButton" src="{{ asset('images/write.png') }}" alt="">
               <span class="Hide">{{ $Testimonial->id }}</span>
               <span class="Hide">{{ $Testimonial->EmployeeName }}</span>
               <span class="Hide">{{ $Testimonial->EmployeeId }}</span>
               <span class="Hide">{{ $Testimonial->DateOfBirth }}</span>
               <span class="Hide">{{ $Testimonial->AreaOfOperation }}</span>
               <span class="Hide">{{ $Testimonial->DischargeBook }}</span> 
               <span class="Hide">{{ $Testimonial->Rank }}</span>
               <span class="Hide">{{ $Testimonial->Company }}</span>
               {{-- 8 --}}
               <span class="Hide">{{ $WorkingPeriod->StartDate_1 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->EndDate_1 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->StartDate_2 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->EndDate_2 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->StartDate_3 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->EndDate_3 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->StartDate_4 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->EndDate_4 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->StartDate_5 ?? '' }}</span>
               <span class="Hide">{{ $WorkingPeriod->EndDate_5 ?? '' }}</span>
               {{-- 18 --}}
               <span class="Hide">{{ $Testimonial->Template }}</span>
               <span class="Hide">{{ $Testimonial->CurrentVessel }}</span>
               <img class="DeleteTestimonialButton" src="{{ asset('images/delete.png') }}" alt="">
               <span class="Hide">{{ $Testimonial->id }}</span>
               <span class="Hide">{{ $Testimonial->CurrentVessel }}</span>
               <span class="Hide">{{ $Testimonial->DateIn }}</span>
            </td> 
         </tr>  
         @endforeach
      </table>
   </div>
   {{ $Testimonials->appends(request()->query())->links() }}
</div>
<script src="{{ asset('js/Components/Add/Testimonial.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Testimonial.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Testimonial.js') }}"></script>
<script src="{{ asset('js/Pages/Testimonial.js') }}"></script>
@endsection