@extends('user.layoutuser')
@section('content')
<div class="container-fluid" style="background-image: url('{{asset('img/this.jpg')}}');  background-repeat: no-repeat;">
    <div class="row search d flex" >
     <div class="col-6 travel">
       <div class="col-10">
         <h1 class="travel__heading">Search your next <span
                 class="text-under-line text-under-line--pink">Holiday</span>
         </h1>
         <h6 class="travel__sub-heading">CHECK OUR BEST PROMOTIONS</h6>
 
         <div class="travel__select">
             <form class="travel__form">
                 <select class="travel__select-input">
                     <option value="0" class="travel__option">Choose your Destination ...</option>
                     <option value="1" class="travel__option">Europe</option>
                     <option value="2" class="travel__option">&nbsp;&nbsp; - Italy</option>
                     <option value="3" class="travel__option">&nbsp;&nbsp; - Netherlands</option>
                     <option value="4" class="travel__option">Asia</option>
                     <option value="5" class="travel__option">&nbsp;&nbsp; - Thailandia</option>
                     <option value="6" class="travel__option">United States</option>
                     <option value="7" class="travel__option">Oceania</option>
                 </select>
                 <button class="travel__btn-submit">
                     <i class="travel__btn-icon ri-search-line"></i>
                 </button>
             </form>
         </div>
 
         <div class="travel__section row">
             <div class="col l-3 m-12  c-12">
                 <div class="travel__card ">
                     <img src="{{ asset('img/relax__icon.png') }}" class="travel__card-img">
                     <p class="travel__card-desc">RELAX</p>
                 </div>
             </div>
             <div class="col l-3 m-12 c-12">
                 <div class="travel__card">
                     <img src="{{ asset('img/cultural__icon.png' ) }}" alt="" class="travel__card-img">
                     <p class="travel__card-desc">Cultural</p>
                 </div>
             </div>
             <div class="col l-3 m-12 c-12">
                 <div class="travel__card">
                     <img src="{{ asset('img/sport__icon.png' ) }}"  alt="" class="travel__card-img">
                     <p class="travel__card-desc">Sport</p>
                 </div>
             </div>
             <div class="col l-3 m-12 c-12">
                 <div class="travel__card">
                     <img src="{{ asset('img/history__icon.png' ) }}"  alt="" class="travel__card-img">
                     <p class="travel__card-desc">history</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="col-4 ">
     <div class="images">
         <div class="image wide" style="background-image: url('{{asset('img/pic1.jpg')}}');"></div>
         <div class="image" style="background-image: url('{{asset('img/pic2.jpg')}}');"></div>
         <div class="image tall" style="background-image: url('{{asset('img/pic3.jpg')}}');"></div>
         <div class="image" style="background-image: url('{{asset('img/pic4.jpg')}}');"></div>
         <div class="image" style="background-image: url('{{asset('img/pic5.jpg')}}');"></div>
         <div class="image wide" style="background-image: url('{{asset('img/pic6.jpg')}}');"></div>
       </div>
     </div>
 </div>
</div>
        
<!-- Aside --> 
<div class="row" style="pt-1">
  <div class="col-4">
  <aside class="d-none d-lg-block col-lg-2 scroll4 text-white">
     <div class="trendingWrapper">
         <h3 class="trendingTitle" data-aos="fade-up" data-aos-duration="2000">Discover<span class="buttonHighlight">Trending Attractions</span> </h3>
           <div class="menu-wrapper">
             <div class="menu">
               <div class="item">
                 <div class="item-content">
                   <div class="item-image" style=" background: url(https://images.unsplash.com/photo-1612862862126-865765df2ded?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80);background-position: center; background-size: cover; background-repeat: no-repeat;">
                     <div class="location">
                       <img src="https://www.svgrepo.com/show/133442/location.svg" />
                       <p class="place">The top of Sigiriya rock</p>
                     </div>
                   </div>
                   <div class="placeTitle">Sigiriya <span></span></div>
                   <div class="placeDescription">
                     Sigiriya or Sinhagiri is an ancient rock fortress located in
                     the northern Matale District near the town of Dambulla in the
                     Central Province, Sri Lanka. The name refers to a site of
                     historical and archaeological significance that is dominated
                     by a massive column of rock around 180 metres high.
                   </div>
                 </div>
               </div>
   
               <div class="item">
                 <div class="item-content">
                   <div class="item-image" style="background: url(https://images.unsplash.com/photo-1542542540-6da0f4dd4b51?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80); background-position: center; background-size: 100%; background-repeat: no-repeat;">
                     <div class="location">
                       <img src="https://www.svgrepo.com/show/133442/location.svg" />
                       <p class="place">Tokyo Tower</p>
                     </div>
                   </div>
                   <div class="placeTitle">Tokyo <span></span></div>
                   <div class="placeDescription">
                     Tokyo, Japan’s busy capital, mixes the ultramodern and the
                     traditional, from neon-lit skyscrapers to historic temples.
                     The opulent Meiji Shinto Shrine is known for its towering gate
                     and surrounding woods.
                   </div>
                 </div>
               </div>
   
               <div class="item">
                 <div class="item-content">
                   <div class="item-image" style=" background: url(https://images.unsplash.com/photo-1524726240783-939bfdd633e2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80); background-position: center; background-size: 100%; background-repeat: no-repeat;">
                     <div class="location">
                       <img src="https://www.svgrepo.com/show/133442/location.svg"/>
                       <p class="place">Ella waterfall</p>
                     </div>
                   </div>
                   <div class="placeTitle">Ella <span></span></div>
                   <div class="placeDescription">
                     Ella is a small town in the Badulla District of Uva Province,
                     Sri Lanka governed by an Urban Council. It is approximately
                     200 kilometres east of Colombo and is situated at an elevation
                     of 1,041 metres above sea level.
                   </div>
                 </div>
               </div>
               <div class="item">
                 <div class="item-content">
                   <div class="item-image" style=" background: url(https://images.unsplash.com/photo-1501594907352-04cda38ebc29?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80);background-position: center; background-size: 100%; background-repeat: no-repeat;">
                       <div class="location">
                         <img src="https://www.svgrepo.com/show/133442/location.svg" />
                         <p class="place">San Francisco</p>
                       </div>
                    </div>
                 </div>
                 <div class="placeTitle">Golden Gate Bridge <span></span></div>
                 <div class="placeDescription">
                   The Golden Gate Bridge is a suspension bridge spanning the
                   Golden Gate, the one-mile-wide strait connecting San Francisco
                   Bay and the Pacific Ocean. A marvel of modern engineering, the
                   Golden Gate Bridge is 1.7 miles long and 90 feet wide.
                 </div>
               </div>
             </div>
           </div>
        </div>
      </aside>

    </div>
  <div class="col-8">
      <h1 class="blogsTitle" data-aos="fade-up" data-aos-duration="3000">
        our <span class="buttonHighlight">accommodations</span>
      </h1>
    
    <div class="blogsContainer">
      <div class="blogsContent">
        <div class="blog">
          <img src="{{ asset('img/villas.jpg') }}"/>
          <h3 class="blogTitle"> spend your time in the best paradise</h3>
          <a href="{{ Route('user.villaslist') }}"><button class="readBlog">villas</button></a>
        </div>

        <div class="blog">
          <img src="{{ asset('img/hotels.jpg') }}"/>
          <h3 class="blogTitle">
            discover our service ,and own,best hotels in the world
          </h3>
          <a href="{{ Route('user.hotelslist') }}"><button class="readBlog">hotels</button></a>
        </div>

        <div class="blog">
          <img src="{{ asset('img/appartement.jpg') }}"/>
          <h3 class="blogTitle">
            let's be here with your family and enjoy
          </h3>
          <a href="#" ><button class="readBlog">the apartments</button></a>
        </div>
       </div>
      <a href=""><button data-aos="fade-up" data-aos-duration="2000" class="allBlogs">discover agency </button></a>
    </div>

    <div class="funFact" data-aos="fade-up" data-aos-duration="2000">
      <div class="factContent">
        <h1 class="funFactTitle">
          <span class="highlightText">Fun Fact</span><span class="text-light"> Of travel agency </span> 
        </h1>
        <p class="text-light">
          Discover New Destinations. See breath-taking places and experience
        them from your device online,to enjoy and 
      learning about the historical
        and political context of a destination to finding some really great
        hikes, each new place has something to discover.
        </p>

        <p class="text-light" >
          We have a passion for storytelling, a knack for putting itineraries together and a strong desire to have fun. 
          <span class="highlightTextSec">Here are all our adventures, our travel tips and our guides.</span>so let's make your  holidays!
        </p>
       </div>
      </div>
    </div>

   
  </div>
 </div> 
@stop