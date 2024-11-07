<div class="form-1 AddSmallBoats_Checklist">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="cancel-button-small-boats-checklist">✖</button>
        </div>
        <form action="" class="AddSmallBoats_ChecklistForm" enctype="multipart/form-data"> 
            @csrf
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-small-boats-checklist error"></p>
                    <h1>SMALL BOATS,  
                        CAPTAINS & ENGINEERS
                        HANDOVER STATEMENT
                        </h1>
                    <section>
                        <div class="input">
                            <label for="">Boat</label>
                            <input type="text" name="Boat">
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
                                <option value="Ken Carson">Ken Carson</option> 
                                <option value="Ken Carson">Ken Carson</option> 
                                <option value="Ken Carson">Ken Carson</option> 
                            </select>
                        </div> 
                        <div class="input">
                            <label for="">Incoming Capt/ Eng. Name</label>
                            <select name="IncomingCapt_EngName" id="">
                                <option value="Ken Carson">Ken Carson</option> 
                                <option value="Ken Carson">Ken Carson</option> 
                                <option value="Ken Carson">Ken Carson</option> 
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">VHF 2</label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Handheld</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">AIS</label>
                        <input type="checkbox" name="AIS">
                        <input type="checkbox" name="AIS">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Company orders to date</label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Logbooks to date</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Requisition book to date</label>
                        <input type="checkbox" name="AIS">
                        <input type="checkbox" name="AIS">
                        <input class="comment" type="text">
                    </div> 
                    <div class="input">
                        <label for="">Pending requisitions (Name)</label>
                        <input type="checkbox" name="AIS">
                        <input type="checkbox" name="AIS">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Emergency Steering</label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Navigational Lights</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Search Light</label>
                        <input type="checkbox" name="AIS">
                        <input type="checkbox" name="AIS">
                        <input class="comment" type="text">
                    </div> 
                    <div class="input">
                        <label for="">A and B Flags</label>
                        <input type="checkbox" name="AIS">
                        <input type="checkbox" name="AIS">
                        <input class="comment" type="text">
                    </div> 
                    <div class="input">
                        <label for="">Siren/ Horn</label>
                        <input type="checkbox" name="AIS">
                        <input type="checkbox" name="AIS">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Radar</label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Echo sounder</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">GPS</label>
                        <input type="checkbox" name="AIS">
                        <input type="checkbox" name="AIS">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Condition of ropes</label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Condition of windows</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Life rings</label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Life jackets and work vest</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Lube oil (ROB)</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Fresh water (ROB)</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
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
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Lube oil cons/hour/engine</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of gear box(es)</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of gen set(s)</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Condition of Bilge Pump</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of Bilge system</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Condition of Battery(es)</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>     
                    <div class="input">
                        <label for="">Shore connection cables</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                </section> 
                <br><br>
                <section class="t-f">
                    <h1>The service on the Vessel has been taken over in accordance with<br> the above findings and comments  </h1>
                    <div class="input">
                        <label for="">Outgoing Captain /Engineer <br> comments (If any): </label>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div> 
                    <div class="input">
                        <label for="">Incoming Captain/Engineer <br> comments (If any):</label>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>  
                </section>  
            </div>
        </form>
        <div class="button">
            <button class="AddSmallBoats_ChecklistButton">Handover →</button>
        </div>
    </div>
</div>