<div class="vessel-content list-component ranks"> 
    <button class="inactive AddRankButton">+</button>
    <div class="inner-x">
        <div class="close-button-ranks">
            <button>✖</button>
        </div>
        <h2><img src="{{ asset('images/logoo.png') }}" alt="">L.T.T Coastal Marine - Rank List</h2>
        @foreach ($Ranks as $Rank)  
        <div class="list vessel"> 
            <div class="inner -x">
                <span class="vessel Hide">{{ $Rank->id }}</span>
                <strong>
                    <span class="vessel-name-span">
                        {{ $Rank->Rank }}
                    </span>  
                </strong>  
                <div class="action">
                    <img class="EditRankButton" src="{{ asset('images/write.png') }}" alt="">
                    <img class="DeleteRankButton" src="{{ asset('images/delete.png') }}" alt="">
                    <span class="Hide">{{ $Rank->id }}</span>
                    <span class="Hide">{{ $Rank->Rank }}</span>
                </div>
                <div class="inner company">
                    
                </div>
            </div>
        </div>   
        @endforeach
    </div>   
</div>   