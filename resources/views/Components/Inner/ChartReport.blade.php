<div class="form-1 ChartReport">
    <div class="inner">
        <div class="close-button">
            <span>    </span>
            <button class="cancel-button-chart-report">✖</button>
        </div>
        <form action="" class="ChartReportForm"> 
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-chart-report error"></p> 
                    <section>
                        <div class="input">
                            <label for="">Status</label>
                            <select name="Status_ChartREPORT" id="">
                                <option value="DOCKING">DOCKING</option>
                                <option value="MAINTENANCE">MAINTENANCE</option> 
                                <option value="BREAKDOWN">BREAKDOWN</option> 
                                <option value="INSPECTION">INSPECTION</option> 
                                <option value="BUNKERY">BUNKERING</option> 
                                <option value="IDLE">READY</option> 
                            </select>
                        </div>  
                    </section>
                    <section>
                        <div class="input">
                            <label for="">Year</label>
                            <select name="Year_ChartREPORT" id="">
                                @for ($Year = 2023; $Year <= date('Y'); $Year++)
                                    <option value="{{ $Year }}">{{ $Year }}</option>
                                @endfor
                            </select>
                        </div>  
                    </section> 
                    <section>
                        <div class="input">
                            <label for="">Period</label>
                            <select name="Period_ChartREPORT" id="">
                                <option value="1ST QUARTER">1ST QUARTER</option>
                                <option value="2ND QUARTER">2ND QUARTER</option>
                                <option value="3RD QUARTER">3RD QUARTER</option>
                                <option value="4TH QUARTER">4TH QUARTER</option>
                                <option value="1/2">1/2</option>
                                <option value="1/3">1/3</option>
                                <option value="1/4">1/4</option>  
                                <option value="2/3">2/3</option>
                                <option value="2/4">2/4</option>  
                                <option value="3/4">3/4</option>  
                                <option value="*">(*) ALL</option>  
                            </select>
                        </div>  
                    </section>  
                    <section>
                        <div class="input">
                            <label for="">Month</label>
                            @php
                                $Months = [
                                    'January',
                                    'February',
                                    'March',
                                    'April',
                                    'May',
                                    'June',
                                    'July',
                                    'August',
                                    'September',
                                    'October',
                                    'November',
                                    'December',
                                ];
                            @endphp
                            <select name="Month_ChartREPORT">
                                <option value="NULL">NULL</option>
                                @foreach ($Months as $Month)
                                    <option value="{{ $loop->iteration }}">{{ $Month }}</option>
                                @endforeach
                            </select> 
                        </div>  
                    </section> 
                    <section>
                        <div class="input">
                            <label for="">Chart Type</label>
                            <select name="ChartType_ChartREPORT" id="">
                                <option value="BAR">BAR</option>
                                <option value="AREA">AREA</option>
                                <option value="LINE">LINE</option>
                            </select>
                        </div>  
                    </section>
                </div>
            </div>
        </form>
        <section class="">
            <div class="footer">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M440-120v-240h80v80h320v80H520v80h-80Zm-320-80v-80h240v80H120Zm160-160v-80H120v-80h160v-80h80v240h-80Zm160-80v-80h400v80H440Zm160-160v-240h80v80h160v80H680v80h-80Zm-480-80v-80h400v80H120Z"/></svg>
                    STATS
                </div>
                <button class="ChartREPORT_GoButton">Go →</button>
                <span class="Hide"></span>
            </div>
        </section>
    </div>
</div>