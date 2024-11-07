<div class="form-1 EditSpeedBoats_Checklist">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="cancel-button-speed-boats-checklist">✖</button>
        </div>
        <form action="" class="EditSpeedBoats_ChecklistForm" enctype="multipart/form-data"> 
            @csrf
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-speed-boats-checklist error"></p>
                    <h1>EDIT SPEED BOAT TECHNICAL CHECKLIST</h1>
                    <section>
                        <div class="input">
                            <label for="">Boat</label>
                            <input type="text" name="Boat">
                        </div> 
                        <div class="input">
                            <label for="">Month</label>
                            <input type="text" name="Port_PlaceOfHandover">
                        </div> 
                        <div class="input">
                            <label for="">Week</label>
                            <input type="number" name="Date">
                        </div>  
                    </section> 
                </div>
                <br>
                <section class="t-f">
                    <h1>ENGINE AND FUEL SYSTEM</h1>
                    <div class="input">
                        <label class="th-1 x" for=""></label>
                        <span class="th-2 x">OK</span>
                        <span class="th-3 x">BAD</span>
                        <span class="th-4 x">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Throttle cable and steering condition  </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Trim of engine condition </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Fuel and water lines connection for leaks </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Test engine kickstart  </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Transmission Lubricant level </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Cooling system (Water intake and discharge) </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Engine, transom and Centre drain plugs </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Fuel filters </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Oil Pressure  </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Bilge pumps </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Shifting Linkage </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Guage system </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Propeller condition </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Hydraulic system </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Engine spark plug </label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                </section> 
            </div>
            <div class="inner-2"> 
                <section class="t-f">
                    <h1>ELECTRICAL SYSTEM</h1>
                    <div class="input">
                        <label class="th-1 x" for=""></label>
                        <span class="th-2 x">OK</span>
                        <span class="th-3 x">BAD</span>
                        <span class="th-4 x">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">All electronics working (Lights, depth finder, chart plotter, GPS)</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Wired terminals and connection </label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Circuit breakers and fuses</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Navigation and anchor Light</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Flood and cabin light</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Battery head connection</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Horn</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                </section>   
                <br><br>
                <section class="t-f">
                    <h1>BOAT HULL, ANCHOR AND OTHERS</h1>
                    <div class="input">
                        <label class="th-1 x" for=""></label>
                        <span class="th-2 x">OK</span>
                        <span class="th-3 x">BAD</span>
                        <span class="th-4 x">Comments</span>
                    </div>   
                    <div class="input">
                        <label for="">Anchor properly stowed and in good condition</label>
                        <input type="checkbox" name="VHF_1">
                        <input type="checkbox" name="VHF_1">
                        <input class="comment" type="text">
                    </div>    
                    <div class="input">
                        <label for="">Bits and upholstery </label>
                        <input type="checkbox" name="VHF_2">
                        <input type="checkbox" name="VHF_2">
                        <input class="comment" type="text">
                    </div>      
                    <div class="input">
                        <label for="">Mooring lines and fender condition</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Fire extinguishers and fire blanket</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Hull condition</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Tool kits status</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Boat Hook and Paddle</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Life jacket condition</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                    <div class="input">
                        <label for="">Ladder</label>
                        <input type="checkbox" name="Handheld">
                        <input type="checkbox" name="Handheld">
                        <input class="comment" type="text">
                    </div>   
                </section> 
                <br><br>
                <section class="t-f">
                    <h1>CHECKED BY:  </h1>
                    <div class="input">
                        <label for="">TECHNICAL: </label>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div> 
                    <div class="input">
                        <label for="">BOAT SKIPPER: </label>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>  
                </section>  
            </div>
        </form>
        <div class="button">
            <button class="EditSpeedBoats_ChecklistButton">Update →</button>
        </div>
    </div>
</div>