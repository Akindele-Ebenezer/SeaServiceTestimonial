@extends('Layouts.Layout-2')
@section('Title', 'Vessels - SEA SERVICE TESTIMONIAL')
@include('Components.Forms.Add.Vessel')
@include('Components.Forms.Edit.Vessel')
@include('Components.Forms.Delete.Vessel')

@section('Content')
<div class="vessel-content"> 
    <h2><img src="{{ asset('images/logoo.png') }}" alt="">L.T.T COASTAL MARINE - Vessel List</h2>
    @unless (count($Vessels) > 0)
    <div class="empty-data">
        No vessel in the system..
    </div>
    @endunless
    @foreach ($Vessels as $Vessel)
    @php
        // $Vessels_EMPLOYEE = \DB::table('employees') 
        $Vessels_GeneralOthers = \DB::table('vessels_general_others')->where('ImoNumber', $Vessel->ImoNumber)->first();
        $Vessels_Section3 = \DB::table('vessels_section_3')->where('ImoNumber', $Vessel->ImoNumber)->first();
        $Vessels_Section4 = \DB::table('vessels_section_4')->where('ImoNumber', $Vessel->ImoNumber)->first();
    @endphp
    <div class="list vessel">
        <span class="Hide">{{ $Vessel->VesselName ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->ImoNumber ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->CallSign ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->Flag ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->PortOfRegistry ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->RegistrationOfficialNumber ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->Loa ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->Boa ?? '-' }}</span>
        <span class="Hide">{{ $Vessel->DepthMouled ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->SummerLoadDraught ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->Lpp ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->Owner ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->Builder ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->DateKeelLaid ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->DateOfBuild ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->PlaceOfBuild ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->Material ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_GeneralOthers->YardNumber ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->TypesOfEngines ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->NumberOfEngines ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->NumberOfCylinder ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->EngineOutputKw ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->EngineMakers ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->YearOfEngineBuilt ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->PlaceEnginesBuilt ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->Diametermm ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section3->LengthOfStrokemm ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section4->GrossTonnage ?? '-' }}</span>
        <span class="Hide">{{ $Vessels_Section4->NetTonnage ?? '-' }}</span>
        <div class="inner -x">
            <span class="vessel Hide">{{ $Vessel->VesselName }}</span><strong>{{ $Vessel->VesselName }}<br> <span class="imo">{{ $Vessel->ImoNumber ?? '-' }}</span></strong>  
            <div class="action">
                <img class="EditVesselButton" src="{{ asset('images/write.png') }}" alt="">
                <img class="DeleteVesselButton" src="{{ asset('images/delete.png') }}" alt="">
            </div>
            <div class="inner">
                tug
            </div>
        </div>
    </div> 
    @endforeach
</div>
<div class="content-data">
    <div class="AddVesselButton">
        <button class="AddVesselButton">+ Add Vessel</button>
    </div>
    <center class="add-testimonial-wrapper">
        @include('Components.Forms.Add.Testimonial') 
    </center>
    <div class="no-data-selected">
        <center>
            <svg xmlns="http://www.w3.org/2000/svg" height="200" viewBox="0 -960 960 960" width="200"><path d="M479-418ZM158-200 82-468q-3-12 2.5-28t23.5-22l52-18v-184q0-33 23.5-56.5T240-800h120v-120h240v120h120q33 0 56.5 23.5T800-720v184l52 18q21 8 25 23.5t1 26.5l-76 268q-50 0-91-23.5T640-280q-30 33-71 56.5T480-200q-48 0-89-23.5T320-280q-30 33-71 56.5T158-200ZM80-40v-80h80q42 0 83-13t77-39q36 26 77 38t83 12q42 0 83-12t77-38q36 26 77 39t83 13h80v80h-80q-42 0-82-10t-78-30q-38 20-78.5 30T480-40q-41 0-81.5-10T320-80q-38 20-78 30t-82 10H80Zm160-522 240-78 240 78v-158H240v158Zm240 282q47 0 79.5-33t80.5-89q48 54 65 74t41 34l44-160-310-102-312 102 46 158q24-14 41-32t65-74q50 57 81.5 89.5T480-280Z"/></svg>
            <h1>No Vessel Selected</h1>
            <p>Make it easier to track monthly/quarterly reports by creating your saved project.</p>
            <button class="CreateTestimonialButton">+ Create a Testimonial</button>
        </center>
    </div>
    <div class="inner vessel-information">
        <h1><img src="{{ asset('images/cruise-ship.png') }}" alt=""> <span class="vessel-name-x"></span> ID: &nbsp; <span class="id">#<span class="imo-number-x"></span></span><button class="cancel-vessel-information-button">✖</button></h1>
        <div class="inner-x">
            <div class="data data-1">
                <h2>Vessel Information</h2>
                <ul>
                    <li>
                        <span>VESSEL NAME</span><span class="vessel-name"><strong></strong></span>
                    </li>
                    <li>
                        <span>IMO No.</span><span class="imo-number"><strong></strong></span>
                    </li>
                    <li>
                        <span>CALL SIGN</span><span class="call-sign"><strong></strong></span>
                    </li>
                    <li>
                        <span>FLAG</span><span class="flag"><strong></strong></span>
                    </li>
                    <li>
                        <span>PORT OF REGISTRY</span><span class="port-of-registry"><strong></strong></span>
                    </li>
                    <li>
                        <span>REGISTRATION (OFFICIAL) No.</span><span class="registration-official-number"><strong></strong></span>
                    </li>
                    <li>
                        <span>LOA</span><span class="loa"><strong></strong></span>
                    </li>
                    <li>
                        <span>BOA</span><span class="boa"><strong></strong></span>
                    </li>
                    <li>
                        <span>DEPTH MOULED</span><span class="depth-mouled"><strong></strong></span>
                    </li>
                </ul>
            </div>
            <div class="data data-2">
                <h2>General (others)</h2>
                <ul>
                    <li>
                        <span>SUMMER LOAD DRAUGHT</span><span class="summer-load-draught"><strong></strong></span>
                    </li>
                    <li>
                        <span>LPP</span><span class="lpp"><strong></strong></span>
                    </li>
                    <li>
                        <span>OWNER</span><span class="owner"><strong></strong></span>
                    </li>
                    <li>
                        <span>BUILDER</span><span class="builder"><strong></strong></span>
                    </li>
                    <li>
                        <span>DATE KEEL LAID</span><span class="date-keel-laid"><strong></strong></span>
                    </li>
                    <li>
                        <span>DATE OF BUILD</span><span class="date-of-build"><strong></strong></span>
                    </li>
                    <li>
                        <span>PLACE OF BUILD</span><span class="place-of-build"><strong></strong></span>
                    </li>
                    <li>
                        <span>MATERIAL</span><span class="material"><strong></strong></span>
                    </li>
                    <li>
                        <span>YARD No.</span><span class="yard-number"><strong></strong></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="inner-x">
            <div class="data data-1">
                <h2>Section 3</h2>
                <ul>
                    <li>
                        <span>TYPES OF ENGINES</span><span class="types-of-engines"><strong></strong></span>
                    </li>
                    <li>
                        <span>NUMBER OF ENGINES</span><span class="number-of-engines"><strong></strong></span>
                    </li>
                    <li>
                        <span>NUMBER OF CYLINDERS</span><span class="number-of-cylinders"><strong></strong></span>
                    </li>
                    <li>
                        <span>ENGINE OUTPUT(kW)</span><span class="engine-output-kw"><strong></strong></span>
                    </li>
                    <li>
                        <span>ENGINE MAKERS</span><span class="engine-makers"><strong></strong></span>
                    </li>
                    <li>
                        <span>YEAR OF ENGINE BUILT</span><span class="year-of-engine-built"><strong></strong></span>
                    </li>
                    <li>
                        <span>PLACE ENGINES BUILT</span><span class="place-engines-built"><strong></strong></span>
                    </li>
                    <li>
                        <span>DIAMETER (mm)</span><span class="diameter-mm"><strong></strong></span>
                    </li>
                    <li>
                        <span>LENGTH OF STROKE (mm)</span><span class="length-of-stroke-mm"><strong></strong></span>
                    </li>
                </ul>
            </div>
            <div class="data data-2">
                <h2>Section 4</h2>
                <ul>
                    <li>
                        <span>GROSS TONNAGE</span><span class="gross-tonnage"><strong></strong></span>
                    </li>
                    <li>
                        <span>NET TONNAGE</span><span class="net-tonnage"><strong></strong></span>
                    </li> 
                </ul>
            </div>
        </div>
    </div>
</div>  
<script>
    let CreateTestimonialButton = document.querySelector('.CreateTestimonialButton');
    let AddTestimonialModal = document.querySelector('.AddTestimonial');
    let AddTestimonialWrapper = document.querySelector('.add-testimonial-wrapper');
    let CancelButton = document.querySelector('.cancel-button');
    let NoDataSelectedModal = document.querySelector('.no-data-selected');
    let ContentData = document.querySelector('.content-data');
    
    CreateTestimonialButton.addEventListener('click', () => {
        AddTestimonialWrapper.style.height = '100%';
        AddTestimonialWrapper.style.display = 'flex';
        AddTestimonialModal.style.display = 'flex';
        NoDataSelectedModal.style.display = 'none';
        ContentData.style.backgroundColor = '#eee';
        
        CancelButton.addEventListener('click', () => {
            AddTestimonialModal.style.display = 'none';
            NoDataSelectedModal.style.display = 'flex';
            AddTestimonialWrapper.style.height = 'unset';
            ContentData.style.backgroundColor = '#fff';
        })
    });

    let Vessels = document.querySelectorAll('.vessel');
    let VesselInformation = document.querySelector('.vessel-information');
    let AddVesselButton = document.querySelector('.AddVesselButton');
    let CancelVesselInformationButton = document.querySelector('.cancel-vessel-information-button');

    Vessels.forEach(Vessel => {
        Vessel.addEventListener('click', () => {
            NoDataSelectedModal.style.display = 'none';
            AddVesselButton.style.display = 'none';
            AddTestimonialWrapper.style.display = 'none';
            ContentData.style.backgroundColor = '#eee';
            VesselInformation.style.display = 'block';

            document.querySelector('.vessel-name-x').textContent = Vessel.firstElementChild.textContent;
            document.querySelector('.imo-number-x').textContent = Vessel.firstElementChild.nextElementSibling.textContent;
            document.querySelector('.vessel-name').firstElementChild.textContent = Vessel.firstElementChild.textContent;
            document.querySelector('.imo-number').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.textContent;
            document.querySelector('.call-sign').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.flag').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.port-of-registry').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.registration-official-number').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.loa').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.boa').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.depth-mouled').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.summer-load-draught').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.lpp').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.owner').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.builder').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.date-keel-laid').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.date-of-build').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.place-of-build').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.material').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.yard-number').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.types-of-engines').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.number-of-engines').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.number-of-cylinders').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.engine-output-kw').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.engine-makers').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.year-of-engine-built').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.place-engines-built').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.diameter-mm').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.length-of-stroke-mm').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.gross-tonnage').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
            document.querySelector('.net-tonnage').firstElementChild.textContent = Vessel.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

            CancelVesselInformationButton.addEventListener('click', () => {
                NoDataSelectedModal.style.display = 'flex';
                AddVesselButton.style.display = 'flex';
                AddTestimonialWrapper.style.display = 'none'; 
                ContentData.style.backgroundColor = '#fff'; 
                VesselInformation.style.display = 'none';
            })
        })

        Vessel.addEventListener('mouseover', () => {
            Vessel.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.style.display = 'flex';
        })
        Vessel.addEventListener('mouseout', () => {
            Vessel.lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.style.display = 'none';
        })
    }); 
    
    let WorkingPeriod_AddButton = document.querySelectorAll('.form-1 form .inner-2 .working-period table tr td span');

    WorkingPeriod_AddButton.forEach(Button => {
        Button.addEventListener('click', () => {
            console.log(Button.parentElement)
            Button.parentElement.parentElement.nextElementSibling.classList.toggle('Show');
        })
    });

    let AddTestimonialButton = document.querySelector('.AddTestimonialButton');
    let AddTestimonialForm = document.querySelector('.AddTestimonialForm');

    let EmployeeInput = document.querySelector('.input[name=Employee]');
    let CurrentVesselInput = document.querySelector('.select[name=CurrentVessel]');

    AddTestimonialButton.addEventListener('click', () => {
        switch (CurrentVesselInput) {
            case 'Deck':
                window.open('/Testimonials/Template/1?Testimonial_Id=' + TestimonialId);
                break;
            case 'Engine':
                window.open('/Testimonials/Template/2?Testimonial_Id=' + TestimonialId);
                break;
            case 'Captain':
                window.open('/Testimonials/Template/3?Testimonial_Id=' + TestimonialId);
                break;
            default:
                break;
        } 
        AddTestimonialButton.style.backgroundColor = '#1fb95e';
        AddTestimonialButton.textContent = '+ Processing..';
        AddTestimonialForm.submit();
    })
</script> 
<script src="{{ asset('js/Components/Add/Vessel.js') }}"></script>
<script src="{{ asset('js/Components/Edit/Vessel.js') }}"></script>
<script src="{{ asset('js/Components/Delete/Vessel.js') }}"></script>
<script src="{{ asset('js/Components/Add/Testimonial.js') }}"></script>
@endsection