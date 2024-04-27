@extends('Layouts.Layout-2')
@section('Title', 'Users - SEA SERVICE TESTIMONIAL')

@section('Content')
@include('Components.Forms.Add.User')
@include('Components.Forms.Edit.User')
@include('Components.Forms.Delete.User')
<div class="users-content table-1"> 
   <header>
      <div class="h-1">
         <h1>Users</h1>
         <button class="AddUserButton
            {{ 
               (session()->get('Role') == 'HR Admin') ||
               (session()->get('Role') == 'HR Users/Operators') 
               ? 'add-user-privilege-denied' : ' ' 
               }}
         ">+ Add User</button>
      </div>
      <div class="h-2">
         <input type="text" placeholder="Search sst users..">
         <span><img src="{{ asset('images/ship (1).png') }}" alt="">Vessels</span>
         <span><img src="{{ asset('images/engineering.png') }}" alt="">Operations</span>
         <span><img src="{{ asset('images/share.png') }}" alt="">Export</span>
      </div>
      <div class="h-3">
         <h2 class="active users-route">All users</h2> 
      </div>
   </header> 
   <div class="no-data">
      <center>
          <svg xmlns="http://www.w3.org/2000/svg" height="200" viewBox="0 -960 960 960" width="200"><path d="M479-418ZM158-200 82-468q-3-12 2.5-28t23.5-22l52-18v-184q0-33 23.5-56.5T240-800h120v-120h240v120h120q33 0 56.5 23.5T800-720v184l52 18q21 8 25 23.5t1 26.5l-76 268q-50 0-91-23.5T640-280q-30 33-71 56.5T480-200q-48 0-89-23.5T320-280q-30 33-71 56.5T158-200ZM80-40v-80h80q42 0 83-13t77-39q36 26 77 38t83 12q42 0 83-12t77-38q36 26 77 39t83 13h80v80h-80q-42 0-82-10t-78-30q-38 20-78.5 30T480-40q-41 0-81.5-10T320-80q-38 20-78 30t-82 10H80Zm160-522 240-78 240 78v-158H240v158Zm240 282q47 0 79.5-33t80.5-89q48 54 65 74t41 34l44-160-310-102-312 102 46 158q24-14 41-32t65-74q50 57 81.5 89.5T480-280Z"/></svg>
          <h1>No User</h1>
          <p>Make it easier to track monthly/quarterly reports by creating your saved project.</p>
          <button>+ Add user</button>
      </center>
   </div>
   <div class="table">
      <table>
         <tr>
            <th> </th> 
            <th>Name</th> 
            <th>Email</th>
            <th>Department</th>
            <th>Position</th>
            <th>Role</th>
            <th>Last login</th> 
            <th>Last logout</th> 
            <th> </th> 
         </tr> 
         @foreach ($Users as $User)
         <tr>
            <td>{{ $User->id }}</td>
            <td class="filter-value-x">{{ $User->FullName }}</td>
            <td class="filter-value-x">{{ $User->Email }}</td> 
            <td class="filter-value-x">{{ $User->Department }}</td>
            <td class="filter-value-x">{{ $User->Position }}</td>
            <td class="filter-value-x">{{ $User->Role }}</td>
            <td class="filter-value-x">{{ $User->LastLogin }}</td>
            <td class="filter-value-x">{{ $User->LastLogout }}</td>
            <td class="action">
               {{-- <img src="{{ asset('images/pdf.png') }}" alt=""><img src="{{ asset('images/statistic.png') }}" alt=""> --}}
               <img class="EditUserButton
                  {{ 
                     (session()->get('Role') == 'HR Admin')  ||
                     (session()->get('Role') == 'HR Users/Operators') 
                     ? 'update-user-privilege-denied' : ' ' 
                  }}
               " src="{{ asset('images/write.png') }}" alt="">
               <span class="Hide">{{ $User->id }}</span>
               <span class="Hide">{{ $User->FullName }}</span>
               <span class="Hide">{{ $User->Email }}</span>
               <span class="Hide">{{ $User->Password }}</span>
               <span class="Hide">{{ $User->Department }}</span>
               <span class="Hide">{{ $User->Position }}</span>
               <span class="Hide">{{ $User->Role }}</span>
               <img class="DeleteUserButton
                  {{ 
                     (session()->get('Role') == 'HR Admin') ||
                     (session()->get('Role') == 'HR Users/Operators') 
                     ? 'delete-user-privilege-denied' : ' ' 
                  }}
               " src="{{ asset('images/delete.png') }}" alt="">
               <span class="Hide">{{ $User->id }}</span>
               <span class="Hide">{{ $User->FullName }}</span>
            </td>
         </tr> 
         @endforeach 
      </table>
   </div>
   {{ $Users->appends(request()->query())->links() }}
</div>
<script src="{{ asset('js/Components/Add/User.js') }}"></script>
<script src="{{ asset('js/Components/Edit/User.js') }}"></script>
<script src="{{ asset('js/Components/Delete/User.js') }}"></script>
@endsection