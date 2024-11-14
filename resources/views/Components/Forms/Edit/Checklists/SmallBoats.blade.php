<div class="form-1 EditSmallBoats_Checklist">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="cancel-button-small-boats-checklist">✖</button>
        </div>
        <form action="" class="EditSmallBoats_ChecklistForm" enctype="multipart/form-data"> 
            @csrf
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-small-boats-checklist error"></p>
                    <h1>EDIT SMALL BOATS,  
                        CAPTAINS & ENGINEERS
                        HANDOVER STATEMENT
                        </h1>
                    <section>
                        @php
                            $Boats = \DB::table('vessels_vessel_information')->select('VesselName')->get();
                            $Captains_Engineers = \DB::table('employees')->select('FullName')->where('Rank', ['CAPTAIN', 'ENGINEER'])->get();
                        @endphp
                        <div class="input">
                            <label for="">Boat</label> 
                            <select name="Boat" id="">
                                @foreach ($Boats as $Boat)
                                <option value="{{ $Boat->VesselName }}">{{ $Boat->VesselName }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="input">
                            <label for="">Port/Place of Handover</label>
                            <input type="text" name="Port_PlaceOfHandover">
                        </div> 
                        <div class="input">
                            <label for="">Date</label>
                            <input type="date" name="Date">
                        </div> 
                        <div class="input">
                            <label for="">Outgoing Capt/ Eng. Name</label>
                            <select name="OutgoingCapt_EngName" id="">
                                @foreach ($Captains_Engineers as $Captain_Engineer)
                                <option value="{{ $Captain_Engineer->FullName }}">{{ $Captain_Engineer->FullName }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="input">
                            <label for="">Incoming Capt/ Eng. Name</label>
                            <select name="IncomingCapt_EngName" id="">
                                @foreach ($Captains_Engineers as $Captain_Engineer)
                                <option value="{{ $Captain_Engineer->FullName }}">{{ $Captain_Engineer->FullName }}</option>
                                @endforeach
                            </select>
                        </div>   
                    </section> 
                </div>
                <br>
                <section class="t-f">
                    <h1>General</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>     
                    <div class="input">
                        <label for="">Clean & Tidy</label>
                        <input type="radio" name="Clean_Tidy" value="Good">
                        <input type="radio" name="Clean_Tidy" value="NotGood">
                        <input class="comment" name="Clean_Tidy_Comment" type="text">
                    </div>    
                </section>
                <br>
                <section class="t-f">
                    <h1>Communication (General)</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">VHF 1</label>
                        <input type="radio" name="VHF_1" value="Good">
                        <input type="radio" name="VHF_1" value="NotGood">
                        <input class="comment" name="VHF_1_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">VHF 2</label>
                        <input type="radio" name="VHF_2" value="Good">
                        <input type="radio" name="VHF_2" value="NotGood">
                        <input class="comment" name="VHF_2_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Handheld</label>
                        <input type="radio" name="Handheld" value="Good">
                        <input type="radio" name="Handheld" value="NotGood">
                        <input class="comment" name="Handheld_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">AIS</label>
                        <input type="radio" name="AIS" value="Good">
                        <input type="radio" name="AIS" value="NotGood">
                        <input class="comment" name="AIS_Comment" type="text">
                    </div> 
                </section>  
                <br><br>
                <section class="t-f">
                    <h1>Corresponding/ Filling</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">SOP to date</label>
                        <input type="radio" name="SOPToDate" value="Good">
                        <input type="radio" name="SOPToDate" value="NotGood">
                        <input class="comment" name="SOPToDate_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Company orders to date</label>
                        <input type="radio" name="CompanyOrdersToDate" value="Good">
                        <input type="radio" name="CompanyOrdersToDate" value="NotGood">
                        <input class="comment" name="CompanyOrdersToDate_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Logbooks to date</label>
                        <input type="radio" name="LogbooksToDate" value="Good">
                        <input type="radio" name="LogbooksToDate" value="NotGood">
                        <input class="comment" name="LogbooksToDate_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Requisition book to date</label>
                        <input type="radio" name="RequisitionBookToDate" value="Good">
                        <input type="radio" name="RequisitionBookToDate" value="NotGood">
                        <input class="comment" name="RequisitionBookToDate_Comment" type="text">
                    </div> 
                    <div class="input">
                        <label for="">Pending requisitions (Name)</label>
                        <input type="radio" name="PendingRequisutions_Name" value="Good">
                        <input type="radio" name="PendingRequisutions_Name" value="NotGood">
                        <input class="comment" name="PendingRequisutions_Name_Comment" type="text">
                    </div> 
                </section>  
                <br><br>
                <section class="t-f">
                    <h1>Safety of Navigation</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Steering System</label>
                        <input type="radio" name="SteeringSytem" value="Good">
                        <input type="radio" name="SteeringSytem" value="NotGood">
                        <input class="comment" name="SteeringSytem_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Emergency Steering</label>
                        <input type="radio" name="EmergencySteering" value="Good">
                        <input type="radio" name="EmergencySteering" value="NotGood">
                        <input class="comment" name="EmergencySteering_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Navigational Lights</label>
                        <input type="radio" name="NavigationalLights" value="Good">
                        <input type="radio" name="NavigationalLights" value="NotGood">
                        <input class="comment" name="NavigationalLights_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Search Light</label>
                        <input type="radio" name="SearchLight" value="Good">
                        <input type="radio" name="SearchLight" value="NotGood">
                        <input class="comment" name="SearchLight_Comment" type="text">
                    </div> 
                    <div class="input">
                        <label for="">A and B Flags</label>
                        <input type="radio" name="A_B_Flags" value="Good">
                        <input type="radio" name="A_B_Flags" value="NotGood">
                        <input class="comment" name="A_B_Flags_Comment" type="text">
                    </div> 
                    <div class="input">
                        <label for="">Siren/ Horn</label>
                        <input type="radio" name="Siren_Horn" value="Good">
                        <input type="radio" name="Siren_Horn" value="NotGood">
                        <input class="comment" name="Siren_Horn_Comment" type="text">
                    </div> 
                </section> 
                <br><br>
                <section class="t-f">
                    <h1>Navigation & Electronic Equipment</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Magnetic compass</label>
                        <input type="radio" name="MagneticCompass" value="Good">
                        <input type="radio" name="MagneticCompass" value="NotGood">
                        <input class="comment" name="MagneticCompass_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Radar</label>
                        <input type="radio" name="Radar" value="Good">
                        <input type="radio" name="Radar" value="NotGood">
                        <input class="comment" name="Radar_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Echo sounder</label>
                        <input type="radio" name="EchoSounder" value="Good">
                        <input type="radio" name="EchoSounder" value="NotGood">
                        <input class="comment" name="EchoSounder_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">GPS</label>
                        <input type="radio" name="GPS" value="Good">
                        <input type="radio" name="GPS" value="NotGood">
                        <input class="comment" name="GPS_Comment" type="text">
                    </div>  
                </section>   
            </div>
            <div class="inner-2"> 
                <section class="t-f">
                    <h1>Deck Equipment</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Bits and Bollards</label>
                        <input type="radio" name="BitsAndBollards" value="Good">
                        <input type="radio" name="BitsAndBollards" value="NotGood">
                        <input class="comment" name="BitsAndBollards_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Condition of ropes</label>
                        <input type="radio" name="ConditionOfRopes" value="Good">
                        <input type="radio" name="ConditionOfRopes" value="NotGood">
                        <input class="comment" name="ConditionOfRopes_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Condition of windows</label>
                        <input type="radio" name="ConditionOfWindows" value="Good">
                        <input type="radio" name="ConditionOfWindows" value="NotGood">
                        <input class="comment" name="ConditionOfWindows_Comment" type="text">
                    </div>   
                </section>   
                <br><br>
                <section class="t-f">
                    <h1>Safety Equipment (Condition)</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Life rafts and cradles</label>
                        <input type="radio" name="LifeRaftsAndCradles" value="Good">
                        <input type="radio" name="LifeRaftsAndCradles" value="NotGood">
                        <input class="comment" name="LifeRaftsAndCradles_Comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Life rings</label>
                        <input type="radio" name="LifeRings" value="Good">
                        <input type="radio" name="LifeRings" value="NotGood">
                        <input class="comment" name="LifeRings_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Life jackets and work vest</label>
                        <input type="radio" name="LifeJacketsAndWorkVest" value="Good">
                        <input type="radio" name="LifeJacketsAndWorkVest" value="NotGood">
                        <input class="comment" name="LifeJacketsAndWorkVest_Comment" type="text">
                    </div>    
                </section>   
                <br><br>
                <section class="t-f">
                    <h1>Crew Presence on board</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">All crew on board</label>
                        <input type="radio" name="AllCrewOnBoard" value="Good">
                        <input type="radio" name="AllCrewOnBoard" value="NotGood">
                        <input class="comment" name="AllCrewOnBoard_Comment" type="text">
                    </div>     
                </section>   
                <br><br>
                <section class="t-f">
                    <h1>Liquids on board</h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Fuel oil (ROB)</label>
                        <input type="radio" name="FuelOil" value="Good">
                        <input type="radio" name="FuelOil" value="NotGood">
                        <input class="comment" name="FuelOil_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Lube oil (ROB)</label>
                        <input type="radio" name="LubeOil" value="Good">
                        <input type="radio" name="LubeOil" value="NotGood">
                        <input class="comment" name="LubeOil_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Fresh water (ROB)</label>
                        <input type="radio" name="FreshWater" value="Good">
                        <input type="radio" name="FreshWater" value="NotGood">
                        <input class="comment" name="FreshWater_Comment" type="text">
                    </div>     
                </section>   
                <br><br>
                <section class="t-f">
                    <h1>Engine Maintenance </h1>
                    <div class="input">
                        <label class="th-1" for=""></label>
                        <span class="th-2">Good</span>
                        <span class="th-3">Not Good</span>
                        <span class="th-4">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Condition of main engine(s)</label>
                        <input type="radio" name="ConditionOfMainEngine" value="Good">
                        <input type="radio" name="ConditionOfMainEngine" value="NotGood">
                        <input class="comment" name="ConditionOfMainEngine_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Lube oil cons/hour/engine</label>
                        <input type="radio" name="LubeOil_Cons_hour_Engine" value="Good">
                        <input type="radio" name="LubeOil_Cons_hour_Engine" value="NotGood">
                        <input class="comment" name="LubeOil_Cons_hour_Engine_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of gear box(es)</label>
                        <input type="radio" name="ConditionOfGearBox" value="Good">
                        <input type="radio" name="ConditionOfGearBox" value="NotGood">
                        <input class="comment" name="ConditionOfGearBox_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of gen set(s)</label>
                        <input type="radio" name="ConditionOfGenSet" value="Good">
                        <input type="radio" name="ConditionOfGenSet" value="NotGood">
                        <input class="comment" name="ConditionOfGenSet_Comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Condition of Bilge Pump</label>
                        <input type="radio" name="ConditionOfBilgePump" value="Good">
                        <input type="radio" name="ConditionOfBilgePump" value="NotGood">
                        <input class="comment" name="ConditionOfBilgePump_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of Bilge system</label>
                        <input type="radio" name="ConditionOfBilgeSystem" value="Good">
                        <input type="radio" name="ConditionOfBilgeSystem" value="NotGood">
                        <input class="comment" name="ConditionOfBilgeSystem_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of Battery(es)</label>
                        <input type="radio" name="ConditionOfBattery" value="Good">
                        <input type="radio" name="ConditionOfBattery" value="NotGood">
                        <input class="comment" name="ConditionOfBattery_Comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Shore connection cables</label>
                        <input type="radio" name="ShoreConnectionCables" value="Good">
                        <input type="radio" name="ShoreConnectionCables" value="NotGood">
                        <input class="comment" name="ShoreConnectionCables_Comment" type="text">
                    </div>    
                </section>
                <br><br>
                <section class="t-f">
                    <h1>The service on the Vessel has been taken over in accordance with<br> the above findings and comments  </h1>
                    <div class="input">
                        <label for="">Outgoing Captain /Engineer <br> comments (If any): </label>
                        <textarea name="Outgoing_Captain_Engineer" id="" cols="30" rows="10"></textarea>
                    </div> 
                    <div class="input">
                        <label for="">Incoming Captain/Engineer <br> comments (If any):</label>
                        <textarea name="Incoming_Captain_Engineer" id="" cols="30" rows="10"></textarea>
                    </div>  
                </section>  
            </div>
        </form>
        <div class="button">
            <button class="EditSmallBoats_ChecklistButton">Update →</button>
            <div class="Hide"></div>
        </div>
    </div>
</div>