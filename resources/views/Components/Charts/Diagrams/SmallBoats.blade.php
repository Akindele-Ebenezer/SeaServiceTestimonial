<div class="form-1 diagram Diagram1 {{ (isset($_GET['FilterValue']) || isset($_GET['page']) || isset($_GET['Vessel_FILTER'])) ? 'Hide' : '' }}" style="display: {{ isset($_GET['Chart4']) ? 'flex !important' : '' }}">
    <p class="Close">✖</p>
    <div class="VesselName">
        <h1 class="indicator">
            <span class="status-x"></span>
        </h1>
        <h2>SEA FOX</h2>
        <h3>
        </h3>
        <h3>
            <img class="EditChecklist1_Icon" src="{{ asset('Images/write.png') }}" alt="">
        </h3>
        <h3>
            <img class="Checklist1_PdfIcon" src="{{ asset('Images/pdf.png') }}" alt="">
            <div class="Hide"></div>
        </h3>
    </div>
    @include('Components.Charts.Chart6') 
    <div class="-wrapper"> 
        <div class="Properties-Wrapper">
            <div class="Title">General</div>
            <div class="Inner">
                <div><img class="Clean_Tidy_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Clean & Tidy</h1>
            </div>
            <div class="Title">Communication (General)</div>
            <div class="Inner">
                <div><img class="VHF_1_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>VHF 1</h1>
            </div>
            <div class="Inner">
                <div><img class="VHF_2_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>VHF 2</h1>
            </div>
            <div class="Inner">
                <div><img class="Handheld_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Handheld</h1>
            </div>
            <div class="Inner">
                <div><img class="AIS_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>AIS</h1>
            </div>
            <div class="Title">Corresponding/ Filling</div>
            <div class="Inner">
                <div><img class="SOPToDate_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>SOP to date</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper">
            <div class="Inner">
                <div><img class="CompanyOrdersToDate_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Company orders to date</h1>
            </div>
            <div class="Inner">
                <div><img class="LogbooksToDate_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Logbooks to date</h1>
            </div>
            <div class="Inner">
                <div><img class="RequisitionBookToDate_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Requisition book to date</h1>
            </div>
            <div class="Inner">
                <div><img class="PendingRequisutions_Name_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Pending requisitions (Name)</h1>
            </div>
            <div class="Title">Navigation & Electronic Equipment</div>
            <div class="Inner">
                <div><img class="MagneticCompass_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Magnetic compass</h1>
            </div>
            <div class="Inner">
                <div><img class="Radar_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Radar</h1>
            </div>
            <div class="Inner">
                <div><img class="EchoSounder_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Echo sounder</h1>
            </div>
            <div class="Inner">
                <div><img class="GPS_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>GPS</h1>
            </div>
            <div class="Title">Deck Equipment</div>
            <div class="Inner">
                <div><img class="BitsAndBollards_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Bits and Bollards</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper"> 
            <div class="Inner">
                <div><img class="ConditionOfRopes_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of ropes</h1>
            </div>
            <div class="Inner">
                <div><img class="ConditionOfWindows_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of windows</h1>
            </div>
            <div class="Title">Hull (Dents and damages)</div>
            <div class="Inner">
                <div><img class="DeckMaintenanceCondition_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Deck maintenance condition</h1>
            </div>
            <div class="Inner">
                <div><img class="AccommodationMaintenanceCondition_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Accommodation Maint. Condition</h1>
            </div>
            <div class="Inner">
                <div><img class="PilotHandrailsCondition_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Pilot Handrails condition</h1>
            </div>
            <div class="Inner">
                <div><img class="TyreFenderCondition_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Tyre fender condition</h1>
            </div>
            <div class="Inner">
                <div><img class="HullFendersCondition_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Hull fenders condition</h1>
            </div>
            <div class="Title">Environmental</div>
            <div class="Inner">
                <div><img class="GarbageCollecting_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Garbage collecting</h1>
            </div>
            <div class="Inner">
                <div><img class="GarbageDepositing_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Garbage depositing</h1>
            </div> 
        </div>
        <div class="image">
            <img src="{{ asset('Images/small-boat-x.png') }}" alt="">
        </div>
        <div class="Properties-Wrapper">
            <div class="Inner">
                <div><img class="EngineSmoking_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Engine smoking</h1>
            </div>
            <div class="Title">Fire Equipment</div>
            <div class="Inner">
                <div><img class="Extinguishers_Exp_Date_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Extinguishers (exp. date)</h1>
            </div>
            <div class="Inner">
                <div><img class="FireHosesCondition_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Fire hoses (no condition)</h1>
            </div>
            <div class="Inner">
                <div><img class="Nozzles_NoCondition_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Nozzles (No condition)</h1>
            </div>
            <div class="Title">Safety Equipment (Condition)</div>
            <div class="Inner">
                <div><img class="LifeRaftsAndCradles_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Life rafts and cradles</h1>
            </div>
            <div class="Inner">
                <div><img class="LifeRings_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Life rings</h1>
            </div>
            <div class="Inner">
                <div><img class="LifeJacketsAndWorkVest_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Life jackets and work vest</h1>
            </div>
            <div class="Title">Crew Presence on board</div>
            <div class="Inner">
                <div><img class="AllCrewOnBoard_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>All crew on board</h1>
            </div>
            <div class="Title">Liquids on board</div>
            <div class="Inner">
                <div><img class="FuelOil_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Fuel oil (ROB)</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper"> 
            <div class="Inner">
                <div><img class="LubeOil_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Lube oil (ROB)</h1>
            </div>
            <div class="Inner">
                <div><img class="FreshWater_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Fresh water (ROB)</h1>
            </div>
            <div class="Title">Engine Maintenance </div>
            <div class="Inner">
                <div><img class="ConditionOfMainEngine_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of main engine(s)</h1>
            </div>
            <div class="Inner">
                <div><img class="LubeOil_Cons_hour_Engine_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Lube oil cons/hour/engine</h1>
            </div>
            <div class="Inner">
                <div><img class="ConditionOfGearBox_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of gear box(es)</h1>
            </div>
            <div class="Inner">
                <div><img class="ConditionOfGenSet_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of gen set(s)</h1>
            </div>
            <div class="Inner">
                <div><img class="ConditionOfBilgePump_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of Bilge Pump</h1>
            </div>
            <div class="Inner">
                <div><img class="ConditionOfBilgeSystem_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of Bilge system</h1>
            </div>
            <div class="Inner">
                <div><img class="ConditionOfBattery_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Condition of Battery(es)</h1>
            </div> 
        </div>
        <div class="Properties-Wrapper"> 
            <div class="Inner">
                <div><img class="ShoreConnectionCables_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Shore connection cables</h1>
            </div>
            <div class="Title">Safety of Navigation</div>
            <div class="Inner">
                <div><img class="SteeringSytem_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Steering System</h1>
            </div>
            <div class="Inner">
                <div><img class="EmergencySteering_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Emergency Steering</h1>
            </div>
            <div class="Inner">
                <div><img class="NavigationalLights_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Navigational Lights</h1>
            </div>
            <div class="Inner">
                <div><img class="SearchLight_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Search Lights</h1>
            </div>
            <div class="Inner">
                <div><img class="A_B_Flags_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>A and B Flags</h1>
            </div>
            <div class="Inner">
                <div><img class="Siren_Horn_Indicator" src="{{ asset('Images/no.png') }}" alt=""></div>
                <h1>Siren/ Horn</h1>
            </div> 
        </div>
    </div>
</div>