@extends('Layouts.Layout-2')
@section('Title', 'Availability - SEA SERVICE TESTIMONIAL')

@section('Content')
<div class="vessel-content notifications"> 
    <h2><img src="{{ asset('images/logoo.png') }}" alt="">L.T.T COASTAL MARINE - Status</h2>
    {{-- @unless (count(DB::table('notifications')->get()) > 0)
        <p class="empty-data">There's no recent activities in the system..</p>
    @endunless --}}
    @foreach (DB::table('notifications')->orderBy('id', 'DESC')->get() as $Notification)
    <div class="list">
        <div class="inner -x">
            <strong class="notification-wrapper"> 
                <span class="">{{ $Notification->Vessel }}</span> <br>
                <span class="imo">{{ $Notification->DateIn }}, {{ $Notification->TimeIn }}</span> <br>
                <span class="imo availability-status status-1">MAINTENANCE</span>
            </strong>  
        </div>
    </div> 
    @endforeach
</div>
<div class="content-data dashboard"> 
    <div class="dashboard-inner"> 
        <h1 class="dashboard-heading"><svg class="-x" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg>VESSEL AVAILABILITY</h1>
        <div class="board-1">
            <div class="div">
                <h1>
                    Vessels <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M192 32c0-17.7 14.3-32 32-32H352c17.7 0 32 14.3 32 32V64h48c26.5 0 48 21.5 48 48V240l44.4 14.8c23.1 7.7 29.5 37.5 11.5 53.9l-101 92.6c-16.2 9.4-34.7 15.1-50.9 15.1c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-16.2 0-34.7-5.7-50.9-15.1l-101-92.6c-18-16.5-11.6-46.2 11.5-53.9L96 240V112c0-26.5 21.5-48 48-48h48V32zM160 218.7l107.8-35.9c13.1-4.4 27.3-4.4 40.5 0L416 218.7V128H160v90.7zM306.5 421.9C329 437.4 356.5 448 384 448c26.9 0 55.4-10.8 77.4-26.1l0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 501.7 417 512 384 512c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7l0 0C136.7 437.2 165.1 448 192 448c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z"></path></svg>
                </h1>
                <h2 class="sub-heading">Tugs/Pilot Boats</h2>
                <strong>29</strong> 
                <table>
                    <tr>
                        <th>Idle</th>
                        <th>Bunkery</th>
                        <th>Inspection</th>
                    </tr>
                    <tr>
                        <td>34</td>
                        <td>23</td>
                        <td>6</td>
                    </tr>
                </table>
                <br>
                <h2>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg> L.T.T 
                    </span> 
                    <span>DEPASA MARINE</span>
                </h2>
            </div> 
            <div class="div">
                <h1>
                    Maintenance <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M192 32c0-17.7 14.3-32 32-32H352c17.7 0 32 14.3 32 32V64h48c26.5 0 48 21.5 48 48V240l44.4 14.8c23.1 7.7 29.5 37.5 11.5 53.9l-101 92.6c-16.2 9.4-34.7 15.1-50.9 15.1c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-16.2 0-34.7-5.7-50.9-15.1l-101-92.6c-18-16.5-11.6-46.2 11.5-53.9L96 240V112c0-26.5 21.5-48 48-48h48V32zM160 218.7l107.8-35.9c13.1-4.4 27.3-4.4 40.5 0L416 218.7V128H160v90.7zM306.5 421.9C329 437.4 356.5 448 384 448c26.9 0 55.4-10.8 77.4-26.1l0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 501.7 417 512 384 512c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7l0 0C136.7 437.2 165.1 448 192 448c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z"></path></svg>
                </h1>
                <h2 class="sub-heading">Dredgers/Tugs</h2>
                <strong>41</strong>
                <table>
                    <tr>
                        <th>Docking</th>
                        <th>Breakdown</th> 
                    </tr>
                    <tr> 
                        <td>23</td>
                        <td>6</td>
                    </tr>
                </table> <br>
                <h2>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg> L.T.T 
                    </span> 
                    <span>TODAY</span>
                </h2>
            </div> 
            <div class="div">
                <h1>
                    Operation <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M352 124.5l-51.9-13c-6.5-1.6-11.3-7.1-12-13.8s2.8-13.1 8.7-16.1l40.8-20.4L294.4 28.8c-5.5-4.1-7.8-11.3-5.6-17.9S297.1 0 304 0H416h32 16c30.2 0 58.7 14.2 76.8 38.4l57.6 76.8c6.2 8.3 9.6 18.4 9.6 28.8c0 26.5-21.5 48-48 48H538.5c-17 0-33.3-6.7-45.3-18.7L480 160H448v21.5c0 24.8 12.8 47.9 33.8 61.1l106.6 66.6c32.1 20.1 51.6 55.2 51.6 93.1C640 462.9 590.9 512 530.2 512H496 432 32.3c-3.3 0-6.6-.4-9.6-1.4C13.5 507.8 6 501 2.4 492.1C1 488.7 .2 485.2 0 481.4c-.2-3.7 .3-7.3 1.3-10.7c2.8-9.2 9.6-16.7 18.6-20.4c3-1.2 6.2-2 9.5-2.2L433.3 412c8.3-.7 14.7-7.7 14.7-16.1c0-4.3-1.7-8.4-4.7-11.4l-44.4-44.4c-30-30-46.9-70.7-46.9-113.1V181.5v-57zM512 72.3c0-.1 0-.2 0-.3s0-.2 0-.3v.6zm-1.3 7.4L464.3 68.1c-.2 1.3-.3 2.6-.3 3.9c0 13.3 10.7 24 24 24c10.6 0 19.5-6.8 22.7-16.3zM130.9 116.5c16.3-14.5 40.4-16.2 58.5-4.1l130.6 87V227c0 32.8 8.4 64.8 24 93H112c-6.7 0-12.7-4.2-15-10.4s-.5-13.3 4.6-17.7L171 232.3 18.4 255.8c-7 1.1-13.9-2.6-16.9-9s-1.5-14.1 3.8-18.8L130.9 116.5z"></path></svg>
                </h1>
                <h2 class="sub-heading">Activities</h2>
                <strong>14</strong> <br>
                <h2>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/></svg> N.C.V 
                    </span> 
                    <span>Since 12:00AM</span>
                </h2>
            </div>  
        </div>  
        <div class="board-1">
            <div class="div">
                <h1>
                    Indicators <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M352 124.5l-51.9-13c-6.5-1.6-11.3-7.1-12-13.8s2.8-13.1 8.7-16.1l40.8-20.4L294.4 28.8c-5.5-4.1-7.8-11.3-5.6-17.9S297.1 0 304 0H416h32 16c30.2 0 58.7 14.2 76.8 38.4l57.6 76.8c6.2 8.3 9.6 18.4 9.6 28.8c0 26.5-21.5 48-48 48H538.5c-17 0-33.3-6.7-45.3-18.7L480 160H448v21.5c0 24.8 12.8 47.9 33.8 61.1l106.6 66.6c32.1 20.1 51.6 55.2 51.6 93.1C640 462.9 590.9 512 530.2 512H496 432 32.3c-3.3 0-6.6-.4-9.6-1.4C13.5 507.8 6 501 2.4 492.1C1 488.7 .2 485.2 0 481.4c-.2-3.7 .3-7.3 1.3-10.7c2.8-9.2 9.6-16.7 18.6-20.4c3-1.2 6.2-2 9.5-2.2L433.3 412c8.3-.7 14.7-7.7 14.7-16.1c0-4.3-1.7-8.4-4.7-11.4l-44.4-44.4c-30-30-46.9-70.7-46.9-113.1V181.5v-57zM512 72.3c0-.1 0-.2 0-.3s0-.2 0-.3v.6zm-1.3 7.4L464.3 68.1c-.2 1.3-.3 2.6-.3 3.9c0 13.3 10.7 24 24 24c10.6 0 19.5-6.8 22.7-16.3zM130.9 116.5c16.3-14.5 40.4-16.2 58.5-4.1l130.6 87V227c0 32.8 8.4 64.8 24 93H112c-6.7 0-12.7-4.2-15-10.4s-.5-13.3 4.6-17.7L171 232.3 18.4 255.8c-7 1.1-13.9-2.6-16.9-9s-1.5-14.1 3.8-18.8L130.9 116.5z"></path></svg>
                </h1> 
                <div class="indicators-wrapper">
                    <div class="indicators-inner">
                        <div class="indicators-inner-x">
                            <span></span> 
                            <span>IDLE</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span></span> 
                            <span>BUNKERY</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span></span> 
                            <span>INSPECTION</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span></span> 
                            <span>MAINTENANCE</span>
                        </div>
                    </div>
                    <div class="indicators-inner">
                        <div class="indicators-inner-x">
                            <span></span> 
                            <span>DOCKING</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span></span> 
                            <span>BREAKDOWN</span>
                        </div>
                        <div class="indicators-inner-x">
                            <span></span> 
                            <span>OPERATION</span>
                        </div> 
                    </div>
                </div>
            </div> 
            <div class="div tracking">
                <h1>
                    Tracking (Status)  
                </h1>  
                <table>
                    <tr>
                        <th>VESSEL</th>
                        <th>6AM - 9AM</th>
                        <th>9AM - 12PM</th>
                        <th>12PM - 3PM</th>
                        <th>3PM - 6PM</th>
                        <th>6PM - 9PM</th>
                        <th>9PM - 12AM</th>
                        <th>12AM - 3AM</th>
                        <th>3AM - 6AM</th>
                    </tr>
                    <tr>
                        <td>ASAGA</td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="operation status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="docking status"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>ASAGA</td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="operation status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="bunkery status"></div>
                        </td>
                        <td>
                            <div class="docking status"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>ASAGA</td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="operation status"></div>
                        </td>
                        <td>
                            <div class="bunkery status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="docking status"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>ASAGA</td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="operation status"></div>
                        </td>
                        <td>
                            <div class="bunkery status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="docking status"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>ASAGA</td>
                        <td>
                            <div class="bunkery status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="operation status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="breakdown status"></div>
                        </td>
                        <td>
                            <div class="maintenance status"></div>
                        </td>
                        <td>
                            <div class="docking status"></div>
                        </td>
                    </tr>
                </table>
            </div>  
        </div>  
        <div class="board-2">
            <div class="div recent-workflow" style="width: 100%">
                <h1>Recent Workflow</h1>  
                <div class="canvas"> 
                    <div class="inner-x">
                        <span>Last month {{ round(53) }}%</span><span style="height: 1em; width: {{ round(23) }}%; background: rgb(138, 18, 18)"></span>
                    </div>
                    <div class="inner-x">
                        <span>2 months {{ round(53) }}%</span><span style="height: 1em; width: {{ round(42) }}%; background: rgb(71, 125, 58)"></span>
                    </div>
                    <div class="inner-x">
                        <span>3 months {{ round(round(42)) }}%</span><span style="height: 1em; width: {{ round(42) }}%; background: rgb(75, 54, 121)"></span>
                    </div>
                    <div class="inner-x">
                        <span>4 months {{ round(round(42)) }}%</span><span style="height: 1em; width: {{ round(42) }}%; background: rgb(51, 117, 137)"></span>
                    </div>
                </div>
            </div> 
        </div>
        <div class="board-3">
            <div class="div">
                <h1>Document</h1>
                <table>
                    <tr>
                        <th>Vessel</th>
                        <th>Employee</th>
                        <th>Rank</th>
                        <th>Company</th>
                        <th>Date</th>
                    </tr>
                    {{-- @foreach ($Testimonials as $Testimonial) --}}
                    <tr> 
                        <td>{{ '$Testimonial->CurrentVessel' }}</td>
                        <td>{{ '$Testimonial->EmployeeName' }}</td>
                        <td>{{ '$Testimonial->Rank' }}</td>
                        <td>{{ '$Testimonial->Company' }}</td>
                        <td>{{ '$Testimonial->DateIn' }}</td>
                    </tr>
                    {{-- @endforeach --}}
                </table>
            </div> 
        </div>
    </div>
</div>   
@endsection