<div class="form-1 AddEmployee">
    <div class="inner">
        <div class="close-button">
            <button>✖</button>
        </div>
        <form action="" class="AddEmployeeForm" method="POST">
            @csrf
            <div class="inner-1">
                <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>Add Employee</h1>
                <div class="fields">
                    <p class="error-employee error"></p>
                    <section> 
                        <div class="input">
                            <label for="">Staff number</label>
                            <input type="text" name="StaffNumber">
                        </div>
                        <div class="input">
                            <label for="">Full name</label>
                            <input type="text" name="FullName">
                        </div>
                    </section>
                    <section class="-x">
                        <div>
                            <div class="input">
                                <label for="">Date of birth</label>
                                <input type="date" name="DateOfBirth">
                            </div> 
                        </div>
                    </section>
                    <section class="-x2">
                        <div class="input">
                            <label for="">Discharge book</label>
                            <input type="number" name="DischargeBook">
                        </div>
                        <div class="input">
                            <label for="">Location</label> 
                            <select name="Location" id="">
                            @foreach ($Vessels as $Vessel)
                                <option value="{{ $Vessel->VesselName ?? '-' }}">{{ $Vessel->VesselName ?? '-' }}</option> 
                            @endforeach
                            </select>
                        </div>
                    </section>
                    <section class="-x3">
                        <div class="input">
                            <label for="">Rank</label>
                            <select name="Rank" id="">
                                @foreach ($Ranks as $Rank)
                                <option value="{{ $Rank->Rank }}">{{ $Rank->Rank }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="input">
                            <label for="">Company</label>
                            <select name="Company" id="">
                                @foreach ($Companies as $Company)
                                <option value="{{ $Company->Company }}">{{ $Company->Company }}</option>
                                @endforeach
                            </select>
                        </div>
                    </section>
                </div>
            </div> 
        </form>
        <button class="AddEmployeeButtonX">Add →</button>
    </div>
</div>