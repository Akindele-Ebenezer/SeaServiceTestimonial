<div class="form-1 diagram {{ (isset($_GET['FilterValue']) || isset($_GET['page']) || isset($_GET['Vessel_FILTER'])) ? 'Hide' : '' }}" style="display: {{ isset($_GET['Chart4']) ? 'flex !important' : '' }}; display: flex">
    <div class="-wrapper"> 
        <div class="Properties-Wrapper">
            <div class="Title">General</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Clean & Tidy</h1>
            </div>
            <div class="Title">Communication (General)</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>VHF 1</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>VHF 2</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Handheld</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>AIS</h1>
            </div>
            <div class="Title">Corresponding/ Filling</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>SOP to date</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper">
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Company orders to date</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Logbooks to date</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Requisition book to date</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Pending requisitions (Name)</h1>
            </div>
            <div class="Title">Navigation & Electronic Equipment</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Magnetic compass</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Radar</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Echo sounder</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>GPS</h1>
            </div>
            <div class="Title">Deck Equipment</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Bits and Bollards</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper"> 
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Condition of ropes</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of windows</h1>
            </div>
            <div class="Title">Hull (Dents and damages)</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Deck maintenance condition</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Accommodation Maint. Condition</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Pilot Handrails condition</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Tyre fender condition</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Hull fenders condition</h1>
            </div>
            <div class="Title">Environmental</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Garbage collecting</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Garbage depositing</h1>
            </div> 
        </div>
        <div class="image">
            <img src="{{ asset('Images/small-boat.png') }}" alt="">
        </div>
        <div class="Properties-Wrapper">
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Engine smoking</h1>
            </div>
            <div class="Title">Fire Equipment</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Extinguishers (exp. date)</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Fire hoses (no condition)</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Nozzles (No condition)</h1>
            </div>
            <div class="Title">Safety Equipment (Condition)</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Life rafts and cradles</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Life rings</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Life jackets and work vest</h1>
            </div>
            <div class="Title">Crew Presence on board</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>All crew on board</h1>
            </div>
            <div class="Title">Liquids on board</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Fuel oil (ROB)</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper"> 
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Lube oil (ROB)</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Fresh water (ROB)</h1>
            </div>
            <div class="Title">Engine Maintenance </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Condition of main engine(s)</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Lube oil cons/hour/engine</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Condition of gear box(es)</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Condition of gen set(s)</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Condition of Bilge Pump</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Condition of Bilge system</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Condition of Battery(es)</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper"> 
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Shore connection cables</h1>
            </div>
            <div class="Title">Safety of Navigation</div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Steering System</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Emergency Steering</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Navigational Lights</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>A and B Flags</h1>
            </div>
            <div class="Inner">
                <div><img src="{{ asset('Images/yes.png') }}" alt=""></div>
                <h1>Siren/ Horn</h1>
            </div> 
        </div>
    </div>
</div>