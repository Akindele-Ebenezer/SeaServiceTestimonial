<div class="form-1 EditTestimonial">
    <div class="inner">
        <div class="close-button-update">
            <span> </span>
            <button>✖</button>
        </div>
        <form action="">
            <div class="inner-1"> 
                <div class="fields">
                    <section>
                        <div class="input">
                            <label for="">Employee</label>
                            <select name="Employees" id="">
                                <option value="28133">DISI SAMUEL</option>
                                <option value="28133">DISI SAMUEL</option>
                                <option value="28133">DISI SAMUEL</option>
                                <option value="28133">DISI SAMUEL</option>
                            </select>
                        </div>
                        <div class="input">
                            <label for="">Staff number</label>
                            <input type="number" name="StaffNumber" readonly>
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
                    <section> 
                        <div class="input">
                            <label for="">Area of operation</label>
                            <input type="text" name="AreaOfOperation">
                        </div> 
                        <div class="input">
                            <div class="input">
                                <label for="">Previous Vessel</label> 
                                <input type="text" name="PreviousVessel" readonly>
                            </div>
                        </div>
                    </section>
                    <section class="-x2">
                        <div class="input">
                            <label for="">Discharge book</label>
                            <input type="number" name="DischargeBook">
                        </div>
                        <div class="input">
                            <label for="">Vessel</label>
                            <select name="Vessel" id="">
                                <option value="ASAGA">ASAGA</option>
                                <option value="DAURA">DAURA</option> 
                            </select>
                        </div>
                    </section>
                    <section class="-x3">
                        <div class="input">
                            <label for="">Rank</label>
                            <select name="Rank" id="">
                                <option value="Engineer">Engineer</option>
                                <option value="Deck">Deck</option> 
                            </select>
                        </div>
                        <div class="input">
                            <label for="">Company</label>
                            <select name="Company" id="">
                                <option value="LTT">LTT</option>
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
                        <tr>
                            <td><input type="date" name="StartDate_1" id=""></td>
                            <td><input type="date" name="EndDate_1" id=""></td>
                            <td><span>+</span></td>
                        </tr>
                    </table>
                </div>
                <section class="t-f"> 
                    <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>Template Format</h1>
                    <p>
                        <strong>Preview:</strong>
                        <a href="{{ route('template_1') }}" target="blank">Deck</a>
                        <a href="{{ route('template_2') }}" target="blank">Engine</a>
                        <a href="{{ route('template_3') }}" target="blank">Captain</a> 
                    </p>
                    <div class="input">
                        <label for="">Theme</label>
                        <select name="TemplateFormat" id="">
                            <option value="T-1">T-1</option>
                            <option value="T-2">T-2</option> 
                        </select>
                    </div>
                    <div class="input">
                        <label for="">Signature</label>
                        <select name="Signature" id="">
                            <option value="LTT">LTT</option>
                            <option value="DEPASA">DEPASA</option> 
                        </select>
                    </div>
                    <div class="input">
                        <div class="input">
                            <label for="">Current Vessel</label> 
                            <input type="text" name="CurrentVessel">
                        </div>
                    </div>
                </section>
            </div>
        </form>
        <button>Update →</button>
    </div>
</div>