// ------------INTERSECTION cities------------

function intersectionCities(cityTrigger, city){
    const ObsCallbacknext = function(entries) {
      const [entry] = entries
      if(entry.isIntersecting===true) {
      
        city.classList.add("active-city")
    
    
      }
      if(window.innerWidth<=800) {
      
        city.classList.add("active-city")
    
    
      }
      
     
     
     
    
    
    }
    const ObsOptionsNext = {
      root:null,
      threshold: 0,
      rootMargin: '-60px'
    }
    const observer = new IntersectionObserver(ObsCallbacknext, ObsOptionsNext)
    
    observer.observe(cityTrigger)
  }
  
  for (let i = 1; i <= 99; i++) {
    const city = document.querySelector(`.cities${i}`);
    const cityTrigger = document.querySelector(`.cities-trigger${i}`);
  
    if (city && cityTrigger) {
      intersectionCities(cityTrigger, city);
    }
  }
  
  
  