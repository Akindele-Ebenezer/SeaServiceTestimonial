<div class="form-1 UpdateAvailability">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="close-button-update-availability">✖</button>
        </div>
        <form action="" class="UpdateAvailabilityForm"> 
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-availability error"></p>
                    <section>
                        <div class="input">
                            <label for="">Vessel</label>
                            <input type="text" name="EditVessel">
                        </div> 
                        <div class="input">
                            <label for="">Status</label>
                            <select name="EditStatus" id="">
                                <option value="DOCKING">DOCKING</option>
                                <option value="OPERATION">OPERATION</option> 
                                <option value="MAINTENANCE">MAINTENANCE</option> 
                                <option value="BREAKDOWN">BREAKDOWN</option> 
                                <option value="INSPECTION">INSPECTION</option> 
                                <option value="BUNKERY">BUNKERY</option> 
                                <option value="IDLE">IDLE</option> 
                            </select>
                        </div> 
                        <div class="input">
                            <label for="">Done By</label>
                            <input type="text" name="EditDoneBy">
                        </div> 
                        <div class="input">
                            <label for="">Attachment</label>
                            <input type="file" name="EditAttachment">
                        </div> 
                    </section> 
                </div>
            </div>
            <div class="inner-2"> 
                <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>Time Period/Total Hours</h1>
                <div class="working-period">
                    <table>
                        <tr>
                            <th>Start</th>
                            <th>End</th> 
                        </tr>
                        <tr class="Show">
                            <td><input type="time" name="EditStartTime" id=""></td>
                            <td><input type="time" name="EditEndTime" id=""></td> 
                        </tr> 
                    </table>
                </div>
            </div>
        </form>
        <button class="UpdateAvailabilityButton">Update →</button>
    </div>
</div>