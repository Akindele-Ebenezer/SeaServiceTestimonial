@extends('Layouts.Layout-2')
@section('Title', 'Employees - ' . session()->get('APP_NAME'))

@section('Content')
@include('Components.Forms.Add.Employee')
@include('Components.Forms.Edit.Employee')
@include('Components.Forms.Delete.Employee')
@include('Components.Forms.Add.Rank')
@include('Components.Inner.Rank')
@include('Components.Forms.Edit.Rank')
@include('Components.Forms.Delete.Rank')
@include('Components.Forms.Add.Company')
@include('Components.Inner.Company')
@include('Components.Forms.Edit.Company')
@include('Components.Forms.Delete.Company')
<div class="employees-content table-1"> 
   <header>
      <div class="h-1">
         <h1>Employees</h1>
         <button class="AddEmployeeButton">+ Add Employee</button>
      </div>
      <div class="h-2">
         <input type="text" placeholder="Search employees..">
         <span><img src="{{ asset('images/ship (1).png') }}" alt="">Vessels</span>
         <span><img src="{{ asset('images/engineering.png') }}" alt="">Employees</span>
         <span><img src="{{ asset('images/share.png') }}" alt="">Export</span>
      </div>
      <div class="h-3"> 
         <h2 class="{{ !(request()->has('FilterValue')) ? 'active' : 'inactive' }} employees-route">All employees</h2>
         <h2 class="{{ request()->input('FilterValue') == 'DEPASA' ? 'active' : 'inactive' }} filter-value-x">DEPASA</h2>
         <h2 class="{{ request()->input('FilterValue') == 'L.T.T' ? 'active' : 'inactive' }} filter-value-x">L.T.T</h2>
         <h2 class="inactive ShowRanks"> Ranks</h2> 
         <h2 class="inactive ShowCompanies">Companies</h2>
      </div>
   </header> 
   <div class="no-data">
      <center>
          <svg xmlns="http://www.w3.org/2000/svg" height="200" viewBox="0 -960 960 960" width="200"><path d="M479-418ZM158-200 82-468q-3-12 2.5-28t23.5-22l52-18v-184q0-33 23.5-56.5T240-800h120v-120h240v120h120q33 0 56.5 23.5T800-720v184l52 18q21 8 25 23.5t1 26.5l-76 268q-50 0-91-23.5T640-280q-30 33-71 56.5T480-200q-48 0-89-23.5T320-280q-30 33-71 56.5T158-200ZM80-40v-80h80q42 0 83-13t77-39q36 26 77 38t83 12q42 0 83-12t77-38q36 26 77 39t83 13h80v80h-80q-42 0-82-10t-78-30q-38 20-78.5 30T480-40q-41 0-81.5-10T320-80q-38 20-78 30t-82 10H80Zm160-522 240-78 240 78v-158H240v158Zm240 282q47 0 79.5-33t80.5-89q48 54 65 74t41 34l44-160-310-102-312 102 46 158q24-14 41-32t65-74q50 57 81.5 89.5T480-280Z"/></svg>
          <h1>No Employee</h1>
          <p>Make it easier to track monthly/quarterly reports by creating your saved project.</p>
          <button>+ Add employee</button>
      </center>
   </div>
   <div class="table">
      <table>
         <tr>
            <th>EMP ID</th> 
            <th>Name</th>
            <th>D.O.B</th>
            <th>Location</th>
            <th>Rank</th>
            <th>Discharge book</th> 
            <th>Company</th> 
            <th>#</th> 
         </tr>
         @unless (count($Employees) > 0)
         <tr>
            <td class="empty-list">System don't have employees..</td>
         </tr>
         @endunless
         @foreach ($Employees as $Employee)
         <tr>
            <td>{{ $Employee->EmployeeId }}</td>
            <td class="data-x filter-value-x">{{ $Employee->FullName }}</td>
            <td class="filter-value-x">{{ $Employee->DateOfBirth }}</td>
            <td class="filter-value-x">{{ $Employee->Location }}</td>
            <td class="filter-value-x">{{ $Employee->Rank }}</td>
            <td class="filter-value-x">{{ $Employee->DischargeBook }}</td>
            <td class="filter-value-x">{{ $Employee->Company }}</td>
            <td class="action">
               {{-- <img src="{{ asset('images/pdf.png') }}" alt="">
               <img src="{{ asset('images/statistic.png') }}" alt=""> --}}
               <img class="EditEmployeeButton" src="{{ asset('images/write.png') }}" alt="">
               <span class="Hide">{{ $Employee->EmployeeId }}</span>
               <span class="Hide">{{ $Employee->FullName }}</span>
               <span class="Hide">{{ $Employee->DateOfBirth }}</span>
               <span class="Hide">{{ $Employee->DischargeBook }}</span>
               <span class="Hide">{{ $Employee->Location }}</span>
               <span class="Hide">{{ $Employee->Rank }}</span>
               <span class="Hide">{{ $Employee->Company }}</span>
               <img class="DeleteEmployeeButton" src="{{ asset('images/delete.png') }}" alt="">
               <span class="Hide">{{ $Employee->FullName }}</span>
               <span class="Hide">{{ $Employee->EmployeeId }}</span>
            </td>
         </tr>     
         @endforeach
      </table>
   </div>
   {{ $Employees->appends(request()->query())->links() }}
</div>
<script src="{{ asset('js/Components/Add/Employee.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Employee.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Employee.js') }}"></script>
<script src="{{ asset('js/Components/Add/Rank.js') }}"></script>
<script src="{{ asset('js/Components/Inner/Rank.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Rank.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Rank.js') }}"></script>
<script src="{{ asset('js/Components/Add/Company.js') }}"></script>
<script src="{{ asset('js/Components/Inner/Company.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Company.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Company.js') }}"></script>
@endsection