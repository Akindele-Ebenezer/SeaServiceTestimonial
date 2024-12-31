<div class="form-1 AddAvailability">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="cancel-button-availability">✖</button>
        </div>
        <form action="" class="AddAvailabilityForm" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-availability error"></p>
                    <section>
                        <div class="input">
                            <label for="">Vessel</label> 
                            <input type="text" autocomplete="off" id="FILTER_Input4" onkeyup="filterFunction4()" name="Vessel">
                            <div class="filter-list-wrapper-4 wrap-x">
                                @foreach ($Vessels as $Vessel) 
                                <div class="filter-value-4"> 
                                    <h1>{{ $Vessel->VesselName }}</h1>
                                    <div> 
                                        <span>{{ $Vessel->CallSign }}</span> 
                                        <span>({{ $Vessel->ImoNumber }})</span> 
                                    </div>
                                </div>
                                @endforeach 
                                <div class="empty empty4">
                                    <center>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                                        <h1>No data available</h1>
                                        <p>Looks like the search value you entered isn't in the list.</p>
                                        <br>
                                        <p>Please try again!</p>
                                    </center>
                                </div>
                            </div>
                        </div> 
                        <div class="input">
                            <label for="">Status</label>
                            <select name="Status" id="">
                                <option value="DOCKING">DOCKING</option>
                                {{-- <option value="OPERATION">OPERATION</option>  --}}
                                <option value="MAINTENANCE">MAINTENANCE</option> 
                                <option value="BREAKDOWN">BREAKDOWN</option> 
                                <option value="INSPECTION">INSPECTION</option> 
                                <option value="BUNKERY">BUNKERING</option> 
                                <option value="IDLE">READY TO GO</option> 
                            </select>
                        </div> 
                        <div class="input">
                            <label for="">Done By</label>
                            <input type="text" name="DoneBy">
                        </div> 
                        <div class="input Hide">
                            <label for="">Attachment</label>
                            <input type="file" name="Attachment">
                        </div> 
                        <div class="input">
                            <label for="">Comment</label>
                            <input type="text" name="Comment">
                        </div>   
                    </section> 
                </div>
                <br>
                <section class="t-f">
                    <h1>Attachment</h1>
                    <div class="input">
                        <label for="">Report</label>
                        <input type="file" name="Report">
                    </div>   
                    <div class="input">
                        <label for="">Picture</label>
                        <input type="file" name="Picture">
                    </div>   
                </section> 
                <br><br>
                <section class="t-f">
                    <h1>Dredging/Working area</h1>
                    <div class="input">
                        <label for="">Location</label>
                        <input type="text" name="Location" placeholder="Latitude, Longitude.." readonly>
                    </div>   
                </section> 
            </div>
            <div class="inner-2"> 
                <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>Time Period/Total Hours</h1>
                <div class="input">
                    <label for="">Start time</label>
                    <input type="text" name="StartTime" maxlength="8">
                </div>  
                <div class="input">
                    <label for="">End time</label>
                    <input type="text" name="EndTime" maxlength="8">
                </div>  
                <section class="t-f">
                    <h1>Date</h1>
                    <div class="input">
                        <label for="">Start date</label>
                        <input type="date" name="StartDate">
                    </div>  
                    <div class="input">
                        <label for="">End date</label>
                        <input type="date" name="EndDate">
                    </div>  
                </section>
                <section class="t-f"> 
                    <div class="input">
                        <label for="">Till date</label>
                        <select name="TillNow" id=""> 
                            <option value="NO">NO</option> 
                            <option value="YES">YES</option> 
                        </select>
                    </div>   
                </section>
                <br><br>
            </div>
        </form>
        <button class="AddAvailabilityButton">Create →</button>
    </div>
</div>