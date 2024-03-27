@extends('Layouts.Layout-2')
@section('Title', 'Testimonials - SEA SERVICE TESTIMONIAL')
@include('Components.Forms.Add.Testimonial') 
@include('Components.Forms.Edit.Testimonial')
@include('Components.Forms.Delete.Testimonial')

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
         <h2 class="active">All testimonials</h2>
         <h2 class="inactive">DEPASA</h2>
         <h2 class="inactive">LTT</h2>
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
            <td class="action"><img src="{{ asset('images/testimonial.png') }}" alt=""></td>
            <td>{{ $Testimonial->EmployeeName }}</td>
            <td class="data-x">{{ $Testimonial->CurrentVessel }}</td>
            <td>{{ $Testimonial->EmployeeId }}</td>
            <td>{{ $Testimonial->DischargeBook }}</td>
            <td>{{ $Testimonial->Rank }}</td>
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
               @php
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
               @endphp
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
            <div class="testimonial-info Hide">
               <div>
                  <span> Date</span><span> 02-12-2023</span>
               </div>
               <div>   
                  <span>Rank</span><span>Captain</span>
               </div>
               <div>   
                  <span>D.O.B</span><span>23/01/1990</span>
               </div>
               <div>   
                  <span>Staff number</span><span>36515</span>
               </div>
               <div>   
                  <span>Working period</span><span>Less than 1 month</span>
               </div>
               <div>   
                  <span>Leave</span><span>Start Date: 02-04-2024 <br> End Date: 20-04-2024 <br>(18 days) </span>
               </div>
               <div>   
                  <span>Company</span><span>DEPASA</span>
               </div>
            </div>  
         </tr>  
         @endforeach
      </table>
   </div>
   {{ $Testimonials->links() }}
</div>
<script src="{{ asset('js/Components/Add/Testimonial.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Testimonial.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Testimonial.js') }}"></script>
<script src="{{ asset('js/Pages/Testimonial.js') }}"></script>
@endsection