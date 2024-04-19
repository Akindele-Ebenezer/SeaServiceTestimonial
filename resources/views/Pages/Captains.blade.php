@extends('Layouts.Layout-2')
@section('Title', 'Captains/QM - SEA SERVICE TESTIMONIAL')

@section('Content')
@include('Components.Forms.Add.Testimonial')
<div class="operation-content table-1"> 
   <header>
      <div class="h-1">
         <h1>Captains/QM</h1>
         <button class="CreateTestimonialButton">+ Add Testimonial</button>
      </div>
      <div class="h-2">
         <input type="text" placeholder="Search captains & masters..">
         <span><img src="{{ asset('images/ship (1).png') }}" alt="">Vessels</span>
         <span><img src="{{ asset('images/Captain_QMing.png') }}" alt="">Captain_QMs rating</span>
         <span><img src="{{ asset('images/share.png') }}" alt="">Export</span>
      </div>
      <div class="h-3"> 
         <h2 class="{{ !(request()->has('FilterValue')) ? 'active' : 'inactive' }} captains-route">All captains/QM</h2>
         <h2 class="{{ request()->input('FilterValue') == 'DEPASA' ? 'active' : 'inactive' }} filter-value-x">DEPASA</h2>
         <h2 class="{{ request()->input('FilterValue') == 'L.T.T' ? 'active' : 'inactive' }} filter-value-x">L.T.T</h2>
      </div>
   </header> 
   <div class="no-data">
      <center>
          <svg xmlns="http://www.w3.org/2000/svg" height="200" viewBox="0 -960 960 960" width="200"><path d="M479-418ZM158-200 82-468q-3-12 2.5-28t23.5-22l52-18v-184q0-33 23.5-56.5T240-800h120v-120h240v120h120q33 0 56.5 23.5T800-720v184l52 18q21 8 25 23.5t1 26.5l-76 268q-50 0-91-23.5T640-280q-30 33-71 56.5T480-200q-48 0-89-23.5T320-280q-30 33-71 56.5T158-200ZM80-40v-80h80q42 0 83-13t77-39q36 26 77 38t83 12q42 0 83-12t77-38q36 26 77 39t83 13h80v80h-80q-42 0-82-10t-78-30q-38 20-78.5 30T480-40q-41 0-81.5-10T320-80q-38 20-78 30t-82 10H80Zm160-522 240-78 240 78v-158H240v158Zm240 282q47 0 79.5-33t80.5-89q48 54 65 74t41 34l44-160-310-102-312 102 46 158q24-14 41-32t65-74q50 57 81.5 89.5T480-280Z"/></svg>
          <h1>No Captains/QM</h1>
          <p>Make it easier to track monthly/quarterly reports by creating your saved project.</p>
          <button>+ Create a Testimonial</button>
      </center>
   </div>
   <div class="table">
      <table>
         <tr>
            <th>Captains/QM</th>   
            <th>Rank</th>
            <th>Company</th> 
            <th>#</th> 
         </tr>
         @unless (count($Employees) > 0)
         <tr>
            <td class="empty-list">System don't have any captain/quarter master's information..</td>
         </tr>
         @endunless
         @foreach ($Employees as $Captain_QM)
         <tr> 
            <td class="data-x filter-value-x">
               {{ $Captain_QM->FullName }}
               <br>
               <div class="sub-x">
                  <span class="-1 filter-value-x">{{ $Captain_QM->Location }}</span>
                  <span class="-2 filter-value-x">{{ $Captain_QM->EmployeeId }}</span>
               </div>
            </td> 
            <td class="filter-value-x">{{ $Captain_QM->Rank }}</td>
            <td class="filter-value-x">{{ $Captain_QM->Company }}</td>
            <td class="action"><img src="{{ asset('images/eye.png') }}" alt=""></td>
         </tr>   
         @endforeach 
      </table>
   </div>
</div>
<script src="{{ asset('js/Components/Add/Testimonial.js') }}"></script>
@endsection