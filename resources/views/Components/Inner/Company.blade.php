<div class="vessel-content list-component companies"> 
    <button class="inactive AddCompanyButton">+</button>
    <div class="inner-x">
        <div class="close-button-companies">
            <button>✖</button>
        </div>
        <h2><img src="{{ asset('images/logoo.png') }}" alt=""> Company List</h2>
        @foreach ($Companies as $Company)  
        <div class="company-list list vessel"> 
            <div class="inner -x">
                <span class="vessel Hide">{{ $Company->id }}</span>
                <strong>
                    <span class="vessel-name-span">
                        {{ $Company->Company }}
                    </span>  
                </strong>  
                <div class="action">
                    <img class="EditCompanyButton" src="{{ asset('images/write.png') }}" alt="">
                    <img class="DeleteCompanyButton" src="{{ asset('images/delete.png') }}" alt="">
                    <span class="Hide">{{ $Company->id }}</span>
                    <span class="Hide">{{ $Company->Company }}</span>
                </div>
                <div class="inner company">
                    
                </div>
            </div>
        </div>   
        @endforeach
    </div>   
</div>   