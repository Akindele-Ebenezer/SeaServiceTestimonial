<div class="form-1 EditTestimonial">
    <div class="inner">
        <div class="close-button-update">
            <span> </span>
            <button>✖</button>
        </div>
        <form action="" class="UpdateTestimonialForm">
            <div class="inner-1"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">Employee</label>
                            <input type="text" autocomplete="off" id="FILTER_Input3" onkeyup="filterFunction3()" name="EditEmployee">
                            <div class="filter-list-wrapper-3">
                                @foreach ($Employees as $Employee)
                                @php
                                    $PreviousVessel = \DB::table('testimonials')->select('CurrentVessel')->where('EmployeeId', $Employee->EmployeeId)
                                                            ->orderBy('DateIn', 'DESC')->orderBy('TimeIn', 'DESC')->first();
                                @endphp
                                <div class="filter-value-3">
                                    <span class="Hide">{{ $Employee->FullName }}</span>
                                    <span class="Hide">{{ $Employee->EmployeeId }}</span>
                                    <span class="Hide">{{ $Employee->DateOfBirth }}</span>
                                    <span class="Hide">{{ $Employee->DischargeBook }}</span>
                                    <span class="Hide">{{ $PreviousVessel->CurrentVessel ?? '-' }}</span>
                                    <span class="Hide">{{ $Employee->Rank }}</span>
                                    <span class="Hide">{{ $Employee->Company }}</span>
                                    <h1>{{ $Employee->FullName }}</h1>
                                    <div>
                                        <span>{{ $Employee->EmployeeId }} ({{ $Employee->Company }})</span>
                                        <span>{{ $Employee->Rank }}</span>
                                    </div>
                                </div>
                                @endforeach 
                                <div class="empty empty3">
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
                            <label for="">Staff number</label>
                            <input type="text" name="EditStaffNumber">
                        </div> 
                    </section>
                    <section class="-x">
                        <div> 
                            <div class="input">
                                <label for="">Date of birth</label>
                                <input type="date" name="EditDateOfBirth">
                            </div> 
                        </div>
                    </section>
                    <section> 
                        <div class="input">
                            <label for="">Area of operation</label>
                            <select name="EditAreaOfOperation" id="">
                                <option value="Sea Dredging">Sea Dredging</option>
                                <option value="N.C.V">N.C.V</option> 
                            </select> 
                        </div>  
                    </section>
                    <section class="-x2">
                        <div class="input">
                            <label for="">Discharge book</label>
                            <input type="number" name="EditDischargeBook">
                        </div>
                        <div class="input">
                            <label for="">Previous Vessel</label>
                            <input type="text" name="EditPreviousVessel" readonly>
                        </div>
                    </section>
                    <section class="-x3">
                        <div class="input">
                            <label for="">Rank</label>
                            <select name="EditRank" id="">
                                @foreach ($Ranks as $Rank)
                                <option value="{{ $Rank->Rank }}">{{ $Rank->Rank }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="input">
                            <label for="">Company</label>
                            <select name="EditCompany" id="">
                                <option value="L.T.T">L.T.T</option>
                                <option value="DEPASA">DEPASA</option> 
                            </select>
                        </div>
                    </section>
                </div>
            </div>
            <div class="inner-2">
                <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>Working Period</h1>
                <div class="working-period">
                    <table>
                        <tr>
                            <th>Start</th>
                            <th>End</th>
                            <th></th>
                        </tr>
                        <tr class="Show">
                            <td><input type="date" name="EditStartDate_1" id=""></td>
                            <td><input type="date" name="EditEndDate_1" id=""></td>
                            <td><span>+</span></td>
                        </tr>
                        <tr class="Hide">
                            <td><input type="date" name="EditStartDate_2" id=""></td>
                            <td><input type="date" name="EditEndDate_2" id=""></td>
                            <td><span>+</span></td>
                        </tr>
                        <tr class="Hide">
                            <td><input type="date" name="EditStartDate_3" id=""></td>
                            <td><input type="date" name="EditEndDate_3" id=""></td>
                            <td><span>+</span></td>
                        </tr>
                        <tr class="Hide">
                            <td><input type="date" name="EditStartDate_4" id=""></td>
                            <td><input type="date" name="EditEndDate_4" id=""></td>
                            <td><span>+</span></td>
                        </tr>
                        <tr class="Hide">
                            <td><input type="date" name="EditStartDate_5" id=""></td>
                            <td><input type="date" name="EditEndDate_5" id=""></td>
                            <td><span>+</span></td>
                        </tr>
                    </table>
                </div>
                <section class="t-f"> 
                    <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>Template Format</h1>
                    <p>
                        <strong>Preview:</strong>
                        <a href="{{ route('template_1_') }}" target="blank">Deck</a>
                        <a href="{{ route('template_2_') }}" target="blank">Engine</a>
                        {{-- <a href="{{ route('template_3') }}" target="blank">Captain</a>  --}}
                    </p>
                    <div class="input">
                        <label for="">Theme</label>
                        <select name="EditTemplateFormat" id="">
                            <option value="Deck">Deck</option>
                            <option value="Engine">Engine</option> 
                            <option value="Captain">Captain</option> 
                        </select>
                    </div>
                    <div class="input">
                        <div class="input">
                            <label for="">Current Vessel</label>  
                            <select name="EditCurrentVessel" id="">
                            @foreach ($Vessels as $Vessel)
                                <option value="{{ $Vessel->VesselName ?? '-' }}">{{ $Vessel->VesselName ?? '-' }}</option> 
                            @endforeach
                            </select>
                        </div>
                    </div>
                </section>
            </div>
        </form>
        <button class="UpdateTestimonialButton">Update →</button>
    </div>
</div>