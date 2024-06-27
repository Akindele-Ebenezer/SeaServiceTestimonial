<div class="form-1 EditVessel">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="cancel-button-update-vessel">✖</button>
        </div>
        <form class="EditVesselForm VesselForm" action="">
            <div class="inner-1"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">VESSEL NAME</label>
                            <input type="text" name="EditVesselName" readonly>
                        </div>
                        <div class="input">
                            <label for="">VESSEL TYPE</label>
                            <select name="EditVesselType"> 
                                <option value="DREDGER">DREDGER</option>
                                <option value="TUG BOAT">TUG BOAT</option>
                                <option value="PILOT CUTTERS">PILOT CUTTERS</option>
                                <option value="MOORING">MOORING</option>
                                <option value="MULTICAT">MULTICAT</option>
                                <option value="SPEED BOAT">SPEED BOAT</option>
                                <option value="PLOUGHING">PLOUGHING</option>
                                <option value="SPEED BOAT">SPEED BOAT</option>
                            </select>  
                        </div>
                        <div class="input">
                            <label for="">IMO No.</label>
                            <input type="number" name="EditImoNumber" readonly>
                        </div> 
                        <div class="input">
                            @php
                                $Companies = \DB::table('companies')->select('Company')->get();
                            @endphp
                            <label for="">COMPANY</label>
                            <select name="EditCompany"> 
                                @foreach ($Companies as $Company)
                                <option value="{{ $Company->Company }}">{{ $Company->Company }}</option>
                                @endforeach
                            </select>   
                        </div> 
                        <div class="input">
                            <label for="">CALL SIGN</label>
                            <input type="text" name="EditCallSign">
                        </div>
                        <div class="input">
                            <label for="">FLAG</label>
                            <input type="text" name="EditFlag">
                        </div> 
                        <div class="input">
                            <label for="">PORT OF REGISTRY</label>
                            <input type="text" name="EditPortOfRegistry">
                        </div>
                        <div class="input">
                            <label for="">REGISTRATION (OFFICIAL) No.</label>
                            <input type="text" name="EditRegistrationNumber">
                        </div> 
                        <div class="input">
                            <label for="">LOA</label>
                            <input type="text" name="EditLoa">
                        </div>
                        <div class="input">
                            <label for="">BOA</label>
                            <input type="text" name="EditBoa">
                        </div> 
                        <div class="input">
                            <label for="">DEPTH MOULED</label>
                            <input type="text" name="EditDepthMoulded">
                        </div> 
                    </section> 
                </div>
            </div>
            <div class="inner-2"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">SUMMER LOAD DRAUGHT</label>
                            <input type="text" name="EditSummerLoadDraught">
                        </div>
                        <div class="input">
                            <label for="">LPP</label>
                            <input type="text" name="EditLpp">
                        </div> 
                        <div class="input">
                            <label for="">OWNER</label>
                            <input type="text" name="EditOwner">
                        </div>
                        <div class="input">
                            <label for="">BUILDER</label>
                            <input type="text" name="EditBuilder">
                        </div> 
                        <div class="input">
                            <label for="">DATE KEEL LAID</label>
                            <input type="text" name="EditDateKeelLaid">
                        </div>
                        <div class="input">
                            <label for="">DATE OF BUILD</label>
                            <input type="text" name="EditDateOfBuild">
                        </div> 
                        <div class="input">
                            <label for="">PLACE OF BUILD</label>
                            <input type="text" name="EditPlaceOfBuild">
                        </div>
                        <div class="input">
                            <label for="">MATERIAL</label>
                            <input type="text" name="EditMaterial">
                        </div> 
                        <div class="input">
                            <label for="">YARD No.</label>
                            <input type="text" name="EditYardNumber">
                        </div> 
                    </section> 
                </div>
            </div>
            <div class="inner-1"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">TYPES OF ENGINES</label>
                            <input type="text" name="EditTypesOfEngines">
                        </div>
                        <div class="input">
                            <label for="">NUMBER OF ENGINES</label>
                            <input type="text" name="EditNumberOfEngines">
                        </div> 
                        <div class="input">
                            <label for="">NUMBER OF CYLINDERS</label>
                            <input type="text" name="EditNumberOfCyliners">
                        </div>
                        <div class="input">
                            <label for="">ENGINE OUTPUT(kW)</label>
                            <input type="text" name="EditEngineOutput">
                        </div> 
                        <div class="input">
                            <label for="">ENGINE MAKERS</label>
                            <input type="text" name="EditEngineMakers">
                        </div>
                        <div class="input">
                            <label for="">YEAR OF ENGINE BUILT</label>
                            <input type="text" name="EditYearOfEngineBuilt">
                        </div> 
                        <div class="input">
                            <label for="">PLACE ENGINES BUILT</label>
                            <input type="text" name="EditPlaceEnginesBuilt">
                        </div>
                        <div class="input">
                            <label for="">DIAMETER (mm)</label>
                            <input type="text" name="EditDiametermm">
                        </div> 
                        <div class="input">
                            <label for="">LENGTH OF STROKE (mm)</label>
                            <input type="text" name="EditLengthOfStrokemm">
                        </div> 
                    </section> 
                </div>
            </div>
            <div class="inner-2"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">GROSS TONNAGE</label>
                            <input type="text" name="EditGrossTonnage">
                        </div>
                        <div class="input">
                            <label for="">NET TONNAGE</label>
                            <input type="text" name="EditNetTonnage">
                        </div>  
                    </section> 
                </div>
            </div>
        </form>
        <button class="UpdateVesselButton">Update →</button>
    </div>
</div>