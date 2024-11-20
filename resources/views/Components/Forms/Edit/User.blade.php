<div class="form-1 EditUser">
    <div class="inner">
        <div class="close-button-update">
            <button>✖</button>
        </div>
        <form action="" class="UpdateUserForm" method="POST">
            @csrf
            <div class="inner-1">
                <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>Edit User</h1>
                <div class="fields">
                    <section> 
                        <div class="input">
                            <label for="">Full name</label>
                            <input type="text" name="FullName">
                        </div>
                        <div class="input">
                            <label for="">Email</label>
                            <input type="email" name="Email" placeholder="example@lttcoastalmarine.com">
                        </div>
                        <div class="input">
                            <label for="">Password</label>
                            <input type="text" name="Password" id=""> 
                        </div> 
                        <div class="input">
                            <label for="">Role</label>
                            <select name="Role" id="">
                                <option value="Super Admin">Super Admin</option>
                                <option value="HR Admin">HR Admin</option>
                                <option value="HR Users/Operators">HR Users/Operators</option>
                                <option value="MOC Admin">MOC Admin</option>
                                <option value="MOC Operators">MOC Operators</option>
                            </select>
                        </div> 
                    </section> 
                    <section class="-x2">
                        <div class="input">
                            <label for="">Department</label>
                            <input type="text" name="Department">
                        </div> 
                    </section>
                    <section class="-x3">
                        <div class="input">
                            <label for="">Position</label>
                            <input type="text" name="Position" id=""> 
                        </div> 
                    </section>
                </div> 
            </div> 
            <div class="inner-2 permissions">
                <h1>User Permissions</h1>
                <div class="list vessel header"> 
                    <div class="inner -x">
                        <span class="vessel Hide"></span>
                        <strong>
                            <span class=" ">
                                Group
                            </span>  
                        </strong>   
                        <strong>
                            <span class=" ">
                                 Restriction
                            </span>  
                        </strong>  
                        <strong>
                            <span class=" ">
                                Testimonial
                            </span>  
                        </strong>  
                        <strong>
                            <span class=" ">
                                Employee
                            </span>  
                        </strong> 
                        <strong>
                            <span class=" ">
                                User
                            </span>  
                        </strong> 
                        <strong>
                            <span class=" ">
                                Rank
                            </span>  
                        </strong>  
                        <strong>
                            <span class=" ">
                                Vessel
                            </span>  
                        </strong>  
                    </div>
                </div>   
                <div class="vessel-content list-component users">  
                    <div class="inner-x">
                        <div class="list vessel"> 
                            <div class="inner -x"> 
                                <strong>
                                    <span class="vessel-name-span group-name">
                                        Super admin
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-add">
                                        Add
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-update">
                                        Update
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="action-x-readonly">
                                        Readonly
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>  
                            <div class="inner -x delete-row"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-delete">
                                        Delete
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            {{--  --}}
                            <div class="inner -x"> 
                                <strong>
                                    <span class="vessel-name-span group-name">
                                        HR Admin
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-add">
                                        Add
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-update">
                                        Update
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="action-x-readonly">
                                        Readonly
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x delete-row"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-delete">
                                        Delete
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            {{--  --}}
                            <div class="inner -x"> 
                                <strong>
                                    <span class="vessel-name-span group-name">
                                        HR Users <br>/Operators
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-add">
                                        Add
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-update">
                                        Update
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="action-x-readonly">
                                        Readonly
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>  
                            <div class="inner -x delete-row"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-delete">
                                        Delete
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>  
                            {{--  --}}
                            <div class="inner -x"> 
                                <strong>
                                    <span class="vessel-name-span group-name">
                                        MOC Admin
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-add">
                                        Add
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-update">
                                        Update
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>   
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="action-x-readonly">
                                        Readonly
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>  
                            <div class="inner -x delete-row"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-delete">
                                        Delete
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            {{--  --}}
                            <div class="inner -x"> 
                                <strong>
                                    <span class="vessel-name-span group-name">
                                        MOC Operators
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-add">
                                        Add
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-update">
                                        Update
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                            <div class="inner -x"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="action-x-readonly">
                                        Readonly
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"></path></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="add" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>  
                            <div class="inner -x delete-row"> 
                                <strong>
                                    <span class=" ">
                                         
                                    </span>  
                                </strong> 
                                <strong>
                                    <span class="vessel-name-span action-x-delete">
                                        Delete
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>   
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>    
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                                <strong>
                                    <span class=" ">
                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    </span>  
                                </strong>  
                            </div>
                        </div>   
                    </div>   
                </div>
            </div>
        </form>
        <button class="UpdateUserButton button-2">Update →</button>
    </div>
</div>