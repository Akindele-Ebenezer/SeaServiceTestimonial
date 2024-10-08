<div class="form-1 FilterReportByDate">
    <div class="inner">
        <div class="close-button-report">
            <span>    </span>
            <button class="cancel-button-filter-report-by-date">✖</button>
        </div>
        <form action="" class="FilterReportByDateForm">  
            <div class="inner-1"> 
                <div class="fields">
                    <p class="error-filter-report-by-date error"></p> 
                    <section>
                        <div class="input">
                            <label for="">Vessel</label>
                            <select name="VesselName_REPORT_AllVessels" id="">
                                <option value="*">*</option>
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
                            <select name="Month_REPORT_AllVessels">
                                @foreach ($Months as $Month)
                                    <option value="{{ $loop->iteration }}">{{ $Month }}</option>
                                @endforeach
                            </select> 
                        </div>  
                    </section> 
                    <section>
                        <div class="input">
                            <label for="">Year</label>
                            <select name="Year_REPORT_AllVessels" id="">
                                @for ($Year = 2023; $Year <= date('Y'); $Year++)
                                    <option value="{{ $Year }}">{{ $Year }}</option>
                                @endfor
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
                    REPORT
                </div>
                <button class="FilterReportForAllVesselsByMonth_GoButton">Go →</button>
            </div>
        </section>
    </div>
</div>