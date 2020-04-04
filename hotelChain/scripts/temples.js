const templeList = 'json/temple.json';

fetch(templeList)
    .then(result => {
            return result.json();
    })
    .then(temples => {
            const templesList = temples.temples;
            console.log(temples);
            templesList.forEach(oneTemple => {
                let closureDates = "";
                if(oneTemple.name === "Barranquilla Columbia"){
                        closureDates = document.getElementById("barraquillaColumbiaClosure"); 
                }   
        
                else if(oneTemple.name === "Logan Utah"){
                        closureDates = document.getElementById("loganClosure"); 
                } 

                else if(oneTemple.name === "Laie Hawaii"){
                        closureDates = document.getElementById("hawaiiClosure");
                }
                    oneTemple.templeClosure.forEach(date =>{
                            let newItem = `<li>${date}</li>`
                            closureDates.innerHTML += newItem;
                    });
            });
    });