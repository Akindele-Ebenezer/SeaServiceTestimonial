<div class="form-1 AddVessel">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="cancel-button-add-vessel">✖</button>
        </div>
        <form class="VesselForm" action="">
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-vessel error"></p>
                    <section>
                        <div class="input">
                            <label for="">VESSEL NAME</label>
                            <input type="text" name="VesselName" maxlength="25">
                        </div>
                        <div class="input">
                            <label for="">VESSEL TYPE</label>
                            <select name="VesselType">
                                <option value="DREDGER">DREDGER</option>
                                <option value="PILOT CUTTERS">PILOT CUTTERS</option>
                                <option value="MOORING">MOORING</option>
                                <option value="MULTICAT">MULTICAT</option>
                                <option value="SPEED BOAT">SPEED BOAT</option>
                                <option value="PLOUGHING">PLOUGHING</option>
                                <option value="SURVEY">SURVEY</option>
                                <option value="OTHERS">OTHERS</option>
                            </select> 
                        </div>
                        <div class="input">
                            <label for="">IMO No.</label>
                            <input type="text" name="ImoNumber">
                        </div> 
                        <div class="input">
                            @php
                                $Companies = \DB::table('companies')->select('Company')->get();
                            @endphp
                            <label for="">COMPANY</label>
                            <select name="Company"> 
                                @foreach ($Companies as $Company)
                                <option value="{{ $Company->Company }}">{{ $Company->Company }}</option>
                                @endforeach
                            </select>    
                        </div> 
                        <div class="input">
                            <label for="">CALL SIGN</label>
                            <input type="text" name="CallSign">
                        </div>
                        <div class="input">
                            <label for="">FLAG</label>
                            <input type="text" name="Flag">
                        </div> 
                        <div class="input">
                            <label for="">PORT OF REGISTRY</label>
                            <input type="text" name="PortOfRegistry">
                        </div>
                        <div class="input">
                            <label for="">REGISTRATION (OFFICIAL) No.</label>
                            <input type="text" name="RegistrationNumber">
                        </div> 
                        <div class="input">
                            <label for="">LOA</label>
                            <input type="text" name="Loa">
                        </div>
                        <div class="input">
                            <label for="">BOA</label>
                            <input type="text" name="Boa">
                        </div> 
                        <div class="input">
                            <label for="">DEPTH MOULED</label>
                            <input type="text" name="DepthMoulded">
                        </div> 
                    </section> 
                </div>
            </div>
            <div class="inner-2"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">SUMMER LOAD DRAUGHT</label>
                            <input type="text" name="SummerLoadDraught">
                        </div>
                        <div class="input">
                            <label for="">LPP</label>
                            <input type="text" name="Lpp">
                        </div> 
                        <div class="input">
                            <label for="">OWNER</label>
                            <input type="text" name="Owner">
                        </div>
                        <div class="input">
                            <label for="">BUILDER</label>
                            <input type="text" name="Builder">
                        </div> 
                        <div class="input">
                            <label for="">DATE KEEL LAID</label>
                            <input type="text" name="DateKeelLaid">
                        </div>
                        <div class="input">
                            <label for="">DATE OF BUILD</label>
                            <input type="text" name="DateOfBuild">
                        </div> 
                        <div class="input">
                            <label for="">PLACE OF BUILD</label>
                            <input type="text" name="PlaceOfBuild">
                        </div>
                        <div class="input">
                            <label for="">MATERIAL</label>
                            <input type="text" name="Material">
                        </div> 
                        <div class="input">
                            <label for="">YARD No.</label>
                            <input type="text" name="YardNumber">
                        </div> 
                    </section> 
                </div>
            </div>
            <div class="inner-1"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">TYPES OF ENGINES</label>
                            <input type="text" name="TypesOfEngines">
                        </div>
                        <div class="input">
                            <label for="">NUMBER OF ENGINES</label>
                            <input type="text" name="NumberOfEngines">
                        </div> 
                        <div class="input">
                            <label for="">NUMBER OF CYLINDERS</label>
                            <input type="text" name="NumberOfCyliners">
                        </div>
                        <div class="input">
                            <label for="">ENGINE OUTPUT(kW)</label>
                            <input type="text" name="EngineOutput">
                        </div> 
                        <div class="input">
                            <label for="">ENGINE MAKERS</label>
                            <input type="text" name="EngineMakers">
                        </div>
                        <div class="input">
                            <label for="">YEAR OF ENGINE BUILT</label>
                            <input type="text" name="YearOfEngineBuilt">
                        </div> 
                        <div class="input">
                            <label for="">PLACE ENGINES BUILT</label>
                            <input type="text" name="PlaceEnginesBuilt">
                        </div>
                        <div class="input">
                            <label for="">DIAMETER (mm)</label>
                            <input type="text" name="Diametermm">
                        </div> 
                        <div class="input">
                            <label for="">LENGTH OF STROKE (mm)</label>
                            <input type="text" name="LengthOfStrokemm">
                        </div> 
                    </section> 
                </div>
            </div>
            <div class="inner-2"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">GROSS TONNAGE</label>
                            <input type="text" name="GrossTonnage">
                        </div>
                        <div class="input">
                            <label for="">NET TONNAGE</label>
                            <input type="text" name="NetTonnage">
                        </div>  
                    </section> 
                </div>
            </div>
        </form>
        <button class="CreateVesselButton">Create →</button>
    </div>
</div>