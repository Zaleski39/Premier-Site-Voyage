document.getElementById('e').value = new Date().toISOString().substring(0, 10);


/* Effet apparition défilement de la page */
        const ratio = 0.3
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: ratio
        }  
        const handleIntersect = function (entries, observer) {
        entries.forEach(function (entry) {
            if(entry.intersectionRatio > ratio){
                entry.target.classList.add('reveal-visible')
                observer.unobserve(entry.target)
            }
            })    
        }
          

        const observer = new IntersectionObserver(handleIntersect, options)
        document.querySelectorAll('[class*="reveal-"]').forEach(function (r) {
        observer.observe(r)
        })

